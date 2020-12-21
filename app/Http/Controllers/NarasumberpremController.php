<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\kegiatan;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class NarasumberpremController extends Controller
{
    // Construct
    public function __construct()
    {
        $this->middleware(['auth','role:narasumberprem']);
    }

    // 
    // narasumberprem
    // 

    // view narasumberprem home
    public function index()
    {
        return view('narasumberprem.index');
    }

    public function pencarian()
    {
        return view('narasumberprem.pencarian', ['kegiatans' => kegiatan::latest()->paginate(10)]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
 
        // mengambil data dari table pegawai sesuai pencarian data
        $kegiatan = kegiatan::where('namakegiatan','like',"%".$cari."%")->paginate();
 
        // mengirim data pegawai ke view index
        return view('narasumberprem.pencarian',['kegiatans' => $kegiatan]);
    }

    public function show($id)
    {
        return view('narasumberprem.pencarian.show', ['kegiatan' => kegiatan::findOrFail($id)]);
    }

    // view narasumberprem profile
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('narasumberprem.profile', compact('user'));
    }

    // view edit data narasumberprem
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('narasumberprem.edit', compact('user'));
    }

    // view ubah password
    public function password(Request $request)
    {
        return view('narasumberprem.password');
    }

    // api narasumberprem update
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $validator = $this->validateUpdateUser($request);

        if ($validator->fails()) {
            return redirect()->route('narasumberprem.edit')->withErrors($validator)->withInput($request->all());
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

        return view('narasumberprem.profile', compact('user'));
    }

    // api narasumberprem update password
    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validator = $this->validateUpdatePassword($request);

        if ($validator->fails()) {
            return redirect()->route('narasumberprem.password')->withErrors($validator)->withInput($request->all());
        }

        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->password);
        } else {
            Session::flash('password','Password saat ini salah');
            return redirect()->route('narasumberprem.password')->withErrors($validator)->withInput($request->all());
        }
        
        if ($user->save()) {
            Session::flash('success','Password berhasil diperbarui');
        } else {
            Session::flash('error','Password gagal diperbarui');
        }

        return view('narasumberprem.profile', compact('user'));
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
}
