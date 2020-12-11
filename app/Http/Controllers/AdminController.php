<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\kegiatan;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class AdminController extends Controller
{
    // Construct
    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }

    // 
    // ADMIN
    // 

    // view admin home
    public function index()
    {
        return view('admin.index');
    }

    // view admin profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }

    // view edit data admin
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.edit', compact('user'));
    }

    // view ubah password
    public function password(Request $request)
    {
        return view('admin.password');
    }

    // api admin update
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $validator = $this->validateUpdateUser($request);

        if ($validator->fails()) {
            return redirect()->route('admin.edit')->withErrors($validator)->withInput($request->all());
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->kodepos = $request->kodepos;

        if ($user->save()) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('error','Data gagal diperbarui');
        }

        return view('admin.profile', compact('user'));
    }

    // api admin update password
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validator = $this->validateUpdatePassword($request);

        if ($validator->fails()) {
            return redirect()->route('admin.password')->withErrors($validator)->withInput($request->all());
        }

        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->password);
        } else {
            Session::flash('password','Password saat ini salah');
            return redirect()->route('admin.password')->withErrors($validator)->withInput($request->all());
        }
        
        if ($user->save()) {
            Session::flash('success','Password berhasil diperbarui');
        } else {
            Session::flash('error','Password gagal diperbarui');
        }

        return view('admin.profile', compact('user'));
    }

    // validasi update user
    private function validateUpdateUser($request)
    {
        return Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ], [
            'nama_lengkap.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email sudah terdaftar',
        ]);
    }

    // validasi update password
    private function validateUpdatePassword($request)
    {
        return Validator::make($request->all(), [
            'currentPassword' => 'required|min:8',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ], [
            'currentPassword.required' => 'Password saat ini harus di isi',
            'currentPassword.min' => 'Password minimal berisi 8 karakter',
            'password.required' => 'Password baru harus di isi',
            'password.min' => 'Password minimal berisi 8 karakter',
            'password_confirmation.required' => 'Konfirmasi password harus di isi',
            'password_confirmation.min' => 'Password minimal berisi 8 karakter',
            'password_confirmation.same' => 'Password konfirmasi tidak sama dengan password',
        ]);
    }

    // 
    // NARASUMBER
    // 

    // view table semua narasumber
    public function narasumber_index()
    {
        $narasumbers = User::where('role','narasumber')->paginate(10);
        return view('admin.narasumber.index', compact('narasumbers'));
    }

    // view buat akun narasumber
    public function narasumber_create()
    {
        return view('admin.narasumber.create');
    }

    // api narasumber save
    public function narasumber_store(Request $request)
    {
        $validator = $this->validateCreatenarasumber($request);
        if ($validator->fails()) {
            return redirect()->route('admin.narasumber.create')->withErrors($validator)->withInput($request->except('password_confirmation'));
        }

        if ($this->attemptCreatenarasumber($request)) {
            Session::flash('success', 'Data narasumber berhasil dibuat');
            return redirect()->route('admin.narasumber');
        } else {
            return redirect()->route('admin.narasumber.create');
        }
    }

    // view satu akun narasumber
    public function narasumber_show($id)
    {
        $narasumber = User::find($id);
        if ($narasumber->role != 'narasumber') {
            return redirect()->route('admin.narasumber');
        }
        return view('admin.narasumber.show', compact('narasumber'));
    }

    // view edit akun narasumber
    public function narasumber_edit($id)
    {
        $narasumber = User::find($id);
        if ($narasumber->role != 'narasumber') {
            return redirect()->route('admin.narasumber');
        }
        return view('admin.narasumber.edit', compact('narasumber'));
    }

    // api narasumber update
    public function narasumber_update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->role != 'narasumber') {
            return redirect()->route('admin.narasumber');
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->kodepos = $request->kodepos;

        if ($user->save()) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('error','Data gagal diperbarui');
        }

        return redirect()->route('admin.narasumber.show',['id' => $user->id]);
    }

    // validasi buat akun narasumber
    private function validateCreatenarasumber($request)
    {
        return Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ], [
            'nama_lengkap.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus di isi',
            'password_confirmation.required' => 'Konfirmasi password harus di isi',
            'password_confirmation.same' => 'Password konfirmasi tidak sama dengan password',
        ]);
    }

    // simpan akun narasumber
    private function attemptCreatenarasumber($request)
    {
        return User::create([
            'name' => ucwords(strtolower($request->name)),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'birthDate' => $request->birthDate,
            'gender' => strtolower($request->gender),
            'phone' => strtolower($request->phone),
            'address' => $request->address,
            'role' => strtolower('narasumber')
        ])->save();
    }

    // 
    // PENYELENGGARA
    // 

    // view table semua penyelenggara
    public function penyelenggara_index()
    {
        $penyelenggaras = User::where('role','penyelenggara')->paginate(10);
        return view('admin.penyelenggara.index', compact('penyelenggaras'));
    }

    // view buat akun penyelenggara
    public function penyelenggara_create()
    {
        return view('admin.penyelenggara.create');
    }

    // api penyelenggara save
    public function penyelenggara_store(Request $request)
    {
        $validator = $this->validateCreatepenyelenggara($request);
        if ($validator->fails()) {
            return redirect()->route('admin.penyelenggara.create')->withErrors($validator)->withInput($request->except('password_confirmation'));
        }

        if ($this->attemptCreatepenyelenggara($request)) {
            Session::flash('success', 'Data penyelenggara berhasil dibuat');
            return redirect()->route('admin.penyelenggara');
        } else {
            return redirect()->route('admin.penyelenggara.create');
        }
    }

    // view satu akun penyelenggara
    public function penyelenggara_show($id)
    {
        $penyelenggara = User::find($id);
        if ($penyelenggara->role != 'penyelenggara') {
            return redirect()->route('admin.penyelenggara');
        }
        return view('admin.penyelenggara.show', compact('penyelenggara'));
    }

    // view edit akun penyelenggara
    public function penyelenggara_edit($id)
    {
        $penyelenggara = User::find($id);
        if ($penyelenggara->role != 'penyelenggara') {
            return redirect()->route('admin.penyelenggara');
        }
        return view('admin.penyelenggara.edit', compact('penyelenggara'));
    }

    // api penyelenggara update
    public function penyelenggara_update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user->role != 'penyelenggara') {
            return redirect()->route('admin.penyelenggara');
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->kodepos = $request->kodepos;

        if ($user->save()) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('error','Data gagal diperbarui');
        }

        return redirect()->route('admin.penyelenggara.show',['id' => $user->id]);
    }

    // validasi buat akun penyelenggara
    private function validateCreatepenyelenggara($request)
    {
        return Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ], [
            'nama_lengkap.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus di isi',
            'password_confirmation.required' => 'Konfirmasi password harus di isi',
            'password_confirmation.same' => 'Password konfirmasi tidak sama dengan password',
        ]);
    }

    // simpan akun penyelenggara
    private function attemptCreatepenyelenggara($request)
    {
        return User::create([
            'name' => ucwords(strtolower($request->name)),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'birthDate' => $request->birthDate,
            'gender' => strtolower($request->gender),
            'phone' => strtolower($request->phone),
            'address' => $request->address,
            'role' => strtolower('penyelenggara')
        ])->save();
    }

    // *-----------------------------------------------------------------------
    // *     KEGIATAN
    // *-----------------------------------------------------------------------

    // ? GET
    // VIEW :: admin.kegiatan.index
    // halaman data siaran
    public function kegiatan_index()
    {
        return view('admin.kegiatan.index', ['kegiatans' => kegiatan::latest()->paginate(10)]);
    }

    // ? GET
    // VIEW :: admin.kegiatan.create
    // halaman form tambah data siaran
    public function kegiatan_create()
    {
        return view('admin.kegiatan.create');
    }

    // ? POST
    // ENDPOINT :: kegiatan store
    // api untuk menyimpan data siaran
    public function kegiatan_store(Request $request)
    {
        $validator = $this->validateCreateUpdatekegiatan($request);
        if ($validator->fails()) return redirect()->route('admin.kegiatan.create')->withErrors($validator)->withInput($request->all());

        if ($this->attemptCreatekegiatan($request)) {
            Session::flash('success', 'Data success');
        } else {
            Session::flash('failure', 'Data failure');
        }

        return redirect()->route('admin.kegiatan');
    }

    // ? GET
    // VIEW :: admin.kegiatan.show
    // halaman detail siaran
    public function kegiatan_show($id)
    {
        return view('admin.kegiatan.show', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    // ? GET
    // VIEW :: admin.kegiatan.edit
    // halaman form ubah data siaran
    public function kegiatan_edit($id)
    {
        return view('admin.kegiatan.edit', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    // ? PUT
    // ENDPOINT :: kegiatan update
    // api untuk update data siaran
    public function kegiatan_update(Request $request, $id)
    {
        $kegiatan = kegiatan::findOrFail($id);

        $validator = $this->validateCreateUpdatekegiatan($request);
        if ($validator->fails()) return redirect()->route('admin.kegiatan.edit', ['id' => $id])->withErrors($validator)->withInput($request->all());

        if ($this->attemptUpdatekegiatan($request, $kegiatan)) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('failure','Data gagal diperbarui');
        }

        return redirect()->route('admin.kegiatan.show', ['id' => $kegiatan->id]);
    }

    public function kegiatan_decline(Request $request, $id)
    {
        $kegiatan = kegiatan::findOrFail($id);
        
        if ($this->declinekegiatan(['declined' => 0])) {
            return redirect()->route('admin.kegiatan')->with(['success' => 'Verifikasi Berhasil']);
        }
        return redirect()->route('admin.kegiatan')->with(['failure' => 'Verifikasi gagal']);
    }

    public function kegiatan_approve(Request $request, $id)
    {
        $kegiatan = kegiatan::findOrFail($id);

        if ($this->approvekegiatan($request, $kegiatan)) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('failure','Data gagal diperbarui');
        }

        return redirect()->route('admin.kegiatan');
    }

    // // ? DELETE
    // // ENDPOINT :: kegiatan delete
    // // api untuk menghapus siaran (hapus hanya untuk petani)
    // public function kegiatan_softDelete($id)
    // {
    //     // $kegiatan = kegiatan::findOrFail($id);
    //     // $kegiatan->deleted = true;
    //     // $kegiatan->save();

    //     return view('admin.kegiatan.index');
    // }

    // ? SELF
    // VALIDATE ? kegiatan
    // function validasi data siaran
    private function validateCreateUpdatekegiatan($request)
    {
        return self::ext_ValidateCreateUpdatekegiatan($request);
    }

    // ? SELF
    // SAVE ? kegiatan
    // function tambah data siaran ke database
    private function attemptCreatekegiatan($request)
    {
        return self::ext_AttemptCreatekegiatan($request);
    }

    // ? SELF
    // SAVE ? kegiatan
    // function update data siaran ke database
    private function attemptUpdatekegiatan($request, $kegiatan)
    {
        return self::ext_AttemptUpdatekegiatan($request, $kegiatan);
    }
    
    // private function declinekegiatan($request, $kegiatan)
    // {
    //     return self::ext_declinekegiatan($request, $kegiatan);
    // }

    // private function approvekegiatan($request, $kegiatan)
    // {
    //     return self::ext_approvekegiatan($request, $kegiatan);
    // }

    // protected static function ext_declinekegiatan($request, $kegiatan)
    // {
    //     $kegiatan->status = 'Di Tolak';
    //     return $kegiatan->save();
    // }

    // protected static function ext_approvekegiatan($request, $kegiatan)
    // {
    //     $kegiatan->status = 'Di Terima';
    //     return $kegiatan->save();
    // }
}
