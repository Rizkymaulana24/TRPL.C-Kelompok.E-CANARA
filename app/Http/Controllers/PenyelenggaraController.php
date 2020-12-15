<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\kegiatan;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class PenyelenggaraController extends Controller
{
    // Construct
    public function __construct()
    {
        $this->middleware(['auth','role:penyelenggara']);
    }

    // 
    // Penyelenggara
    // 

    // view penyelenggara home
    public function index()
    {
        return view('penyelenggara.index');
    }

    // view penyelenggara profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('penyelenggara.profile', compact('user'));
    }

    // view edit data penyelenggara
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('penyelenggara.edit', compact('user'));
    }

    // view ubah password
    public function password(Request $request)
    {
        return view('penyelenggara.password');
    }

    // api penyelenggara update
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $validator = $this->validateUpdateUser($request);

        if ($validator->fails()) {
            return redirect()->route('penyelenggara.edit')->withErrors($validator)->withInput($request->all());
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->kodepos = $request->kodepos;

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/foto/', $filename);
            $user->foto = $filename;
        } else {
            return $request;
            $user->foto = '';
        }
        
        $user->jenis_identitas = $request->jenis_identitas;

        if ($user->save()) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('error','Data gagal diperbarui');
        }

        return view('penyelenggara.profile', compact('user'));
    }

    // api penyelenggara update password
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validator = $this->validateUpdatePassword($request);

        if ($validator->fails()) {
            return redirect()->route('penyelenggara.password')->withErrors($validator)->withInput($request->all());
        }

        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->password);
        } else {
            Session::flash('password','Password saat ini salah');
            return redirect()->route('penyelenggara.password')->withErrors($validator)->withInput($request->all());
        }
        
        if ($user->save()) {
            Session::flash('success','Password berhasil diperbarui');
        } else {
            Session::flash('error','Password gagal diperbarui');
        }

        return view('penyelenggara.profile', compact('user'));
    }

    // validasi update user
    private function validateUpdateUser($request)
    {
        return Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ], [
            'name.required' => 'Nama harus di isi',
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
    // Kegiatan
    // 

    public function kegiatan_index()
    {
        return view('penyelenggara.kegiatan.index', ['kegiatans' => kegiatan::latest()->paginate(10)]);
    }

    public function kegiatan_show($id)
    {
        return view('penyelenggara.kegiatan.show', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    public function kegiatan_create()
    {
        return view('penyelenggara.kegiatan.create');
    }

    public function kegiatan_store(Request $request)
    {
        $validator = $this->validateCreateUpdatekegiatan($request);
        if ($validator->fails()) return redirect()->route('penyelenggara.kegiatan.create')->withErrors($validator)->withInput($request->all());

        if ($this->attemptCreatekegiatan($request)) {
            Session::flash('success', 'Data kegiatan berhasil dibuat');
        } else {
            Session::flash('failure', 'Data failure');
        }

        return redirect()->route('penyelenggara.kegiatan');
    }

    // ? GET
    // VIEW :: penyelenggara.kegiatan.show
    // halaman detail kegiatan


    // ? GET
    // VIEW :: penyelenggara.kegiatan.edit
    // halaman form ubah data kegiatan
    public function kegiatan_edit($id)
    {
        return view('penyelenggara.kegiatan.edit', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    // ? PUT
    // ENDPOINT :: kegiatan update
    // api untuk update data kegiatan
    public function kegiatan_update(Request $request, $id)
    {
        $kegiatan = kegiatan::findOrFail($id);

        $validator = $this->validateCreateUpdatekegiatan($request);
        if ($validator->fails()) return redirect()->route('penyelenggara.kegiatan.edit', ['id' => $id])->withErrors($validator)->withInput($request->all());

        if ($this->attemptUpdatekegiatan($request, $kegiatan)) {
            Session::flash('success','Data kegiatan berhasil diubah');
        } else {
            Session::flash('failure','Data gagal diperbarui');
        }

        return redirect()->route('penyelenggara.kegiatan.show', ['id' => $kegiatan->id]);
    }

    // // ? DELETE
    // // ENDPOINT :: kegiatan delete
    // // api untuk menghapus kegiatan (hapus hanya untuk petani)
    // public function kegiatan_softDelete($id)
    // {
    //     // $kegiatan = kegiatan::findOrFail($id);
    //     // $kegiatan->deleted = true;
    //     // $kegiatan->save();

    //     return view('penyelenggara.kegiatan.index');
    // }

    // ? SELF
    // VALIDATE ? kegiatan
    // function validasi data kegiatan
    private function validateCreateUpdatekegiatan($request)
    {
        return self::ext_ValidateCreateUpdatekegiatan($request);
    }

    protected static function ext_ValidateCreateUpdatekegiatan($request)
    {
        return Validator::make($request->all(), [
            'namakegiatan' => 'required|min:5|max:60',
            'deskripsi' => 'required|max:2048|',
            'tanggalpelaksanaan' => 'required',
        ], [
            'namakegiatan.required'=> 'Nama kegiatan harus di isi',
            'namakegiatan.max' => 'Nama kegiatan terlalu panjang',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'deskripsi.max' => 'Deskripsi terlalu panjang',
            'tanggalpelaksanaan.required' => 'Tanggal kegiatan harus di isi',
        ]);
    }

    // ? SELF
    // SAVE ? kegiatan
    // function tambah data kegiatan ke database
    private function attemptCreatekegiatan($request)
    {
        return self::ext_AttemptCreatekegiatan($request);
    }

    protected static function ext_AttemptCreatekegiatan($request)
    {
        return kegiatan::create([
            'namakegiatan' => $request->namakegiatan,
            'deskripsi' => $request->deskripsi,
            'tanggalpelaksanaan' => $request->tanggalpelaksanaan,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'alamatkegiatan' => $request->alamatkegiatan,
            'jenis' => $request->jenis,
            'kategori' => $request->kategori,
            'tingkat' => $request->tingkat,
            'deskripsi' => $request->deskripsi,
            'scan_proposalkegiatan' => $request->scan_proposalkegiatan,
            'nama_penanggungjawab' => $request->nama_penanggungjawab,
            'jabatan_penanggungjawab' => $request->jabatan_penanggungjawab,
            'nomor_hp' => $request->nomor_hp,
            'nomor_wa' => $request->nomor_wa
        ])->save();
    }

    // ? SELF
    // SAVE ? kegiatan
    // function update data kegiatan ke database
    private function attemptUpdatekegiatan($request, $kegiatan)
    {
        return self::ext_AttemptUpdatekegiatan($request, $kegiatan);
    }

    protected static function ext_AttemptUpdatekegiatan($request, $kegiatan)
    {
        $kegiatan->namakegiatan = $request->namakegiatan;
        $kegiatan->tanggalpelaksanaan = $request->tanggalpelaksanaan;
        $kegiatan->waktu_pelaksanaan = $request->waktu_pelaksanaan;
        $kegiatan->alamatkegiatan = $request->alamatkegiatan;
        $kegiatan->jenis = $request->jenis;
        $kegiatan->kategori = $request->kategori;
        $kegiatan->tingkat = $request->tingkat;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->scan_proposalkegiatan = $request->scan_proposalkegiatan;
        $kegiatan->nama_penanggungjawab = $request->nama_penanggungjawab;
        $kegiatan->jabatan_penanggungjawab = $request->jabatan_penanggungjawab;
        $kegiatan->nomor_hp = $request->nomor_hp;
        $kegiatan->nomor_wa = $request->nomor_wa;
        return $kegiatan->save();
    }
}
