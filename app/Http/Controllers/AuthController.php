<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mail\MailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  public function __construct()
  {
  }

  public function login(Request $request)
  {
    if ($request->isMethod('post')) {
      $data = $request->validate(
        [
          'email' => 'required|email',
          'password' => 'required|min:8',
        ],
      );
      $user = User::where('email', $data['email'])->first();
      if (!$user) return redirect()->route('admin.login')->with('flash_error', 'Email address doesn\'t exist in our system');
      if ($user->status) {
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
          ///function to check expired password
          return redirect()->route('admin.dashboard')
            ->with('success', 'Login Successfull');
        }
        return redirect()->route('admin.login')->with('flash_error', 'Invalid Username and Password');
      } else {
        return redirect()->route('admin.login')->with('flash_error', 'Your account has been disabled');
      }
    }
    if (Auth::check()) return redirect()->route('admin.dashboard');

    return view('admin.auth.loginPage')->with('flash_error', 'Please Login to Access');
  }

  public function logout(Request $request)
  {
    $request->session()->flush();
    return redirect()->route('admin.login')->with('flash_success', 'Logout Successful');
  }


  public function dashboard()
  {
    return view('admin.dashboard.index');
  }

  public function update_profile()
  {
    $user = User::find(auth()->user()->id);
    return view('admin.user.user-profile', compact('user'));
  }

  public function change_password()
  {
    return view('admin.user.change_password');
  }

  public function update_password(Request $request)
  {
    $passwordUpdateCheck = $this->update_password_function($request);

    if (!$passwordUpdateCheck) {
      return  redirect()->route('user.change_password')->with('flash_success', 'Password Changed successfully but password history not updated');
    } else {
      if (isset($passwordUpdateCheck['error'])) {
        return redirect()->back()->withErrors($passwordUpdateCheck['error']);
      }
      return redirect()->route('user.change_password')->with('flash_success', 'Password Changed Successfully');
    }
  }

  public function update_password_function(Request $request)
  {
    $validatedData = $request->validate([
      'old_password' => 'required',
      'password' => [PasswordRules::register(auth()->user()->email), 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/']
    ], [
      'old_password.required' => 'Old Password is required',
      'password.required' => 'New Password is required',
      'password.min' => 'Password should be of 8 characters',
      'password.confirmed' => 'Confirm Password did not match',
      'password.regex' => 'Password must contain at least One Capital, One small letter ,A Number and One Symbol'
    ]);

    $user = auth()->user();

    // Check if Old password does not match
    if (!password_verify($validatedData['old_password'], $user->password)) {
      return ["error" => ['old_password' => 'Old Password didn\'t match.']];
    }
    // Check if new password matches old password
    if (password_verify($validatedData['password'], $user->password)) {
      return ["error" => ['password' => 'You cannot use the same password.']];
    }


    $user = User::find($user->id);
    if ($user) {
      $user->update([
        'password' => bcrypt($validatedData['password'])
      ]);
    }
    return $user;
  }

  public function forgot_password()
  {
    return view('admin.auth.forgotPassword');
  }

  public function resetPassword(Request $request)
  {
    if ($request->isMethod('post')) {
      $request->validate([
        'token' => 'required',
      ]);
      $user = User::where('reset_token', $request->token)->first();
      if (!$user) {
        return redirect()->back()->with('flash_error', 'The provided token is unavailable');
      }

      $validatedData = $request->validate([
        'password' => [PasswordRules::register($user->email), 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/']
      ], [
        'password.required' => 'New Password is required',
        'password.min' => 'Password should be of 8 characters',
        'password.confirmed' => 'Confirm Password did not match',
        'password.regex' => 'Password must contain at least One Capital, One small letter ,A Number and One Symbol'
      ]);

      $user->update(['password' => bcrypt($request->password), 'reset_token' => null, 'status' => 1]);
      return  redirect()->route('admin.login')->with('flash_success', 'Password is reset successfully');
    } else {
      if (!isset($_GET['token'])) {
        return  redirect()->route('admin.login');
      }
      return view('admin.auth.newPassword');
    }
  }
}
