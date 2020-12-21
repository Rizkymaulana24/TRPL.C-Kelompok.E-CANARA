<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;

class AuthController extends Controller
{   
    // Construct
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['showLoginForm']]);
    }

    // form login
    public function showLoginForm()
    {   
        return view('auth.login');
    }

    // form register
    public function showRegisterForm()
    {   
        return view('auth.register');
    }

    public function showRegisterpremForm()
    {   
        return view('auth.registerprem');
    }

    // api daftar save
    public function pengguna_store(Request $request)
    {
        $validator = $this->validateDaftar($request);
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator);
        }

        if ($this->attemptDaftar($request)) {
            Session::flash('success', 'Data pengguna berhasil dibuat');
            return redirect()->route('login');
        } else {
            return redirect()->route('register');
        }
    }

    // validasi buat akun petani
    private function validateDaftar($request)
    {
        return Validator::make($request->all(), [
            'nama_lengkap' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'nama_lengkap.required' => 'Nama harus di isi',
            'email.required' => 'Email harus di isi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus di isi',
        ]);
    }

    // simpan akun petani
    private function attemptDaftar($request)
    {
        return User::create([
            'username' => ucwords(strtolower($request->username)),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'nama_lengkap' => strtolower($request->nama_lengkap),
            'nomor_hp' => strtolower($request->nomor_hp),
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos,
            'role' => $request->role
        ])->save();
    }

    // validate
    private function validateLogin($request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email harus di isi',
            'password.required' => 'Password harus di isi',
        ]);
    }

    // attempt
    private function attemptLogin($request)
    {
        Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return Auth::check();
    }

    // redirect
    private function redirectUser()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        } else if (Auth::user()->role == 'narasumber') {
            return redirect()->route('narasumber');
        } else if (Auth::user()->role == 'penyelenggara') {
            return redirect()->route('penyelenggara');
        } else if (Auth::user()->role == 'narasumberprem') {
            return redirect()->route('narasumberprem');
        } else if (Auth::user()->role == 'penyelenggaraprem') {
            return redirect()->route('penyelenggaraprem');
        }
    }
    // register
    // protected function register(array $data)
    // {
    //     return User::register([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'role' => $data['role'],
    //         'password' => Hash::make($data['password'],),
    //     ]);
    // }
    
    // login
    public function login(Request $request)
    {   
        $validator = $this->validateLogin($request);
        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput($request->except('password'));
        }

        if ($this->attemptLogin($request)) {
            return $this->redirectUser();
        } else {
            Session::flash('error', 'Maaf username dan password anda tidak sesuai. Harap periksa kembali');
            return redirect()->route('login')->withInput($request->except('password'));
        }
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
