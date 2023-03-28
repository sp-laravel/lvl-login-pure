<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user) {
    //
  }

  public function register() {
    return view('auth.register');
  }

  public function registerVerify(Request $request) {
    // dd($request->all());
    $request->validate(
      [
        'email' => 'required|unique:users,email|email',
        'password' => 'required|min:4',
        'password_confirmation' => 'required|same:password',
      ],
      [
        'email.required' => 'el email es requerido',
        'password.required' => 'la contraseña es requerida',
        'password_confirmation.required' => 'la contraseña 2 es requerida',
      ]
    );

    User::create([
      'email' => $request->email,
      'password' => bcrypt($request->password)
    ]);

    return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
  }

  public function login() {
    return view('auth.login');
  }

  public function loginVerify(Request $request) {
    // dd($request->all());
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:4'
    ], [
      'email.required' => 'el email es requerido',
      'email.unique' => 'el email ya ha sido usado',
      'password.required' => 'la contraseña es requerida',
    ]);

    // Validar si el usuario y la contraseña son correctos
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->route('dashboard');
    }

    return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña no valida'])->withInput();
  }

  public function signOut() {
    Auth::logout();
    return redirect()->route('login')->with('success', 'sessioin cerrada correctamente');
  }
}