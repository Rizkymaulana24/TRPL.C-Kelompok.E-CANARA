<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\kegiatan;
use App\Narasumber;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class PenyelenggarapremController extends Controller
{
    // Construct
    public function __construct()
    {
        $this->middleware(['auth','role:penyelenggaraprem']);
    }

    // 
    // Penyelenggaraprem
    // 

    // view penyelenggaraprem home
    public function index()
    {
        return view('penyelenggaraprem.index');
    }

    public function pencarian()
    {
        $narasumbers = User::where('role','narasumber')->paginate(10);
        return view('penyelenggaraprem.pencarian', compact('narasumbers'));
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $narasumbers = User::where('username','like',"%".$cari."%")->paginate();
 
        // mengirim data pegawai ke view index
        return view('penyelenggaraprem.pencarian',['users' => $narasumbers],compact('narasumbers'));
    }

    public function show($id)
    {
        $narasumber = Narasumber::find($id);
        return view('penyelenggaraprem.pencarian.show', ['users' => User::findOrFail($id)],compact('narasumber'));
    }

    // view penyelenggaraprem profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('penyelenggaraprem.profile', compact('user'));
    }

    // view edit data penyelenggaraprem
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('penyelenggaraprem.edit', compact('user'));
    }

    // view ubah password
    public function password(Request $request)
    {
        return view('penyelenggaraprem.password');
    }

    // api penyelenggaraprem update
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $validator = $this->validateUpdateUser($request);

        if ($validator->fails()) {
            return redirect()->route('penyelenggaraprem.edit')->withErrors($validator)->withInput($request->all());
        }

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->provinsi = $request->provinsi;
        $user->kota = $request->kota;
        $user->kecamatan = $request->kecamatan;
        $user->alamat = $request->alamat;
        $user->kodepos = $request->kodepos;
        $user->nomor_hp = $request->nomor_hp;
        $user->nomor_wa = $request->nomor_wa;
        $user->nama_penanggungjawab = $request->nama_penanggungjawab;

        if ($request->hasfile('logo_penyelenggara')) {
            $file = $request->file('logo_penyelenggara');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/logo_penyelenggara/', $filename);
            $user->logo_penyelenggara = $filename;
        } else {
            return $request;
            $user->logo_penyelenggara = '';
        };

        if ($request->hasfile('scan_strukturkepengurusan')) {
            $file = $request->file('scan_strukturkepengurusan');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/scan_strukturkepengurusan/', $filename);
            $user->scan_strukturkepengurusan = $filename;
        } else {
            return $request;
            $user->scan_strukturkepengurusan = '';
        };

        if ($request->hasfile('scan_identitaspenanggungjawab')) {
            $file = $request->file('scan_identitaspenanggungjawab');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/scan_identitaspenanggungjawab/', $filename);
            $user->scan_identitaspenanggungjawab = $filename;
        } else {
            return $request;
            $user->scan_identitaspenanggungjawab = '';
        };

        if ($request->hasfile('scan_buktitransfer')) {
            $file = $request->file('scan_buktitransfer');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/scan_buktitransfer/', $filename);
            $user->scan_buktitransfer = $filename;
        } else {
            return $request;
            $user->scan_buktitransfer = '';
        };
        
        $user->jenis_identitas = $request->jenis_identitas;
        if ($user->save()) {
            Session::flash('success','Data berhasil diperbarui');
        } else {
            Session::flash('error','Data gagal diperbarui');
        }

        return view('penyelenggaraprem.profile', compact('user'));
    }

    // api penyelenggaraprem update password
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validator = $this->validateUpdatePassword($request);

        if ($validator->fails()) {
            return redirect()->route('penyelenggaraprem.password')->withErrors($validator)->withInput($request->all());
        }

        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->password);
        } else {
            Session::flash('password','Password saat ini salah');
            return redirect()->route('penyelenggaraprem.password')->withErrors($validator)->withInput($request->all());
        }
        
        if ($user->save()) {
            Session::flash('success','Password berhasil diperbarui');
        } else {
            Session::flash('error','Password gagal diperbarui');
        }

        return view('penyelenggaraprem.profile', compact('user'));
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
        $kegiatans = Kegiatan::activeWithUserFindByUserId(User::auth()->id);
        return view('penyelenggaraprem.kegiatan.index', compact('kegiatans'));
    }

    public function kegiatan_show($id)
    {
        return view('penyelenggaraprem.kegiatan.show', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    public function kegiatan_create()
    {
        return view('penyelenggaraprem.kegiatan.create');
    }

    public function kegiatan_store(Request $request)
    {
        $validator = $this->validateCreateUpdatekegiatan($request);
        if ($validator->fails()) return redirect()->route('penyelenggaraprem.kegiatan.create')->withErrors($validator)->withInput($request->all());

        if ($this->attemptCreatekegiatan($request)) {
            Session::flash('success', 'Data kegiatan berhasil di buat');
        } else {
            Session::flash('failure', 'Data failure');
        }

        return redirect()->route('penyelenggaraprem.kegiatan');
    }

    // ? GET
    // VIEW :: penyelenggaraprem.kegiatan.show
    // halaman detail kegiatan


    // ? GET
    // VIEW :: penyelenggaraprem.kegiatan.edit
    // halaman form ubah data kegiatan
    public function kegiatan_edit($id)
    {
        return view('penyelenggaraprem.kegiatan.edit', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    // ? PUT
    // ENDPOINT :: kegiatan update
    // api untuk update data kegiatan
    public function kegiatan_update(Request $request, $id)
    {
        $kegiatan = kegiatan::findOrFail($id);

        $validator = $this->validateCreateUpdatekegiatan($request);
        if ($validator->fails()) return redirect()->route('penyelenggaraprem.kegiatan.edit', ['id' => $id])->withErrors($validator)->withInput($request->all());

        if ($this->attemptUpdatekegiatan($request, $kegiatan)) {
            Session::flash('success','Data kegiatan berhasil diubah');
        } else {
            Session::flash('failure','Data gagal diperbarui');
        }

        return redirect()->route('penyelenggaraprem.kegiatan.show', ['id' => $kegiatan->id]);
    }

    // // ? DELETE
    // // ENDPOINT :: kegiatan delete
    // // api untuk menghapus kegiatan (hapus hanya untuk petani)
    // public function kegiatan_softDelete($id)
    // {
    //     // $kegiatan = kegiatan::findOrFail($id);
    //     // $kegiatan->deleted = true;
    //     // $kegiatan->save();

    //     return view('penyelenggaraprem.kegiatan.index');
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
            'nomor_wa' => $request->nomor_wa,
            'user_id' => $request->user_id
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
