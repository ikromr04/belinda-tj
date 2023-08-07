<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function check(Request $request)
  {
    $user = User::where('login', '=', request('login'))->first();

    if (!$user) {
      return back()->with('fail', 'Мы не узнаем ваш адрес для входа');
    }

    if (Hash::check(request('password'), $user->password)) {
      $request->session()->put('loggedUser', $user->id);
      return redirect(route('admin'));
    } else {
      return back()->with('fail', 'Неверный пароль');
    }
  }

  public function logout()
  {
    if (session()->has('loggedUser')) {
      session()->pull('loggedUser');
      return redirect(route('home.index'));
    }
  }
}
