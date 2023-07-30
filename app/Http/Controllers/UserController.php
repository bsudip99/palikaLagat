<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mail\MailController;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

  private $imagePath;
  /**
   * Create a new UserController instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('has_permission:user-create')->only(['create', 'store',]);
    $this->middleware('has_permission:user-list')->only(['index']);
    $this->middleware('has_permission:user-edit')->only(['update']);
    $this->middleware('has_permission:user-delete')->only(['destroy']);
    $this->imagePath = 'images/userImages';
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return view('admin.user.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::all();
    return view('admin.user.create-edit', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserRequest $request)
  {
    $requestData = $request->validated();

    if ($request->hasFile('pp_image')) {
      $imageName = \Helper::addMultimedia($requestData['pp_image'], $requestData['name'], "image",$this->imagePath);
      $requestData['pp_image'] = $imageName;
    }

    if ($request->hasFile('citizenship')) {
      $imageName = \Helper::addMultimedia($requestData['citizenship'], $requestData['name'], "citizenship",$this->imagePath);
      $requestData['citizenship'] = $imageName;
    }

    unset($requestData['role_id']);
    $user = User::create($requestData);
    if($request->role_id){
      foreach($request->role_id as $role){
          $userRole = RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $role,
          ]);
      }
    }
    if (!$user) {
      return redirect()->back()->withError('Error in creating User');
    }
    return redirect()->route('user.index')->withSuccess('User Created Successfully and mail is sent to provided email');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user = User::find($id);
    return view('admin.user.show', compact('user'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = User::find($id);
    $roles = Role::all();
    $user_roles = $user->roles->pluck('id')->toArray();
    return view('admin.user.create-edit', compact('user', 'roles','user_roles'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UserRequest $request, $id)
  {
    $email_exists = User::where('email', $request->email)->exists();
    $requestData = $request->validated();
    
    if ($request->hasFile('pp_image')) {
      $imageName = \Helper::addMultimedia($requestData['pp_image'], $requestData['name'], "image",$this->imagePath);
      $requestData['pp_image'] = $imageName;
    }

    if ($request->hasFile('citizenship')) {
      $imageName = \Helper::addMultimedia($requestData['citizenship'], $requestData['name'], "citizenship",$this->imagePath);
      $requestData['citizenship'] = $imageName;
    }

    unset($requestData['role_id']);
    $user = User::findorFail($id);
    $previous_email = $user->email;
    $user->update($requestData);

    if($request->role_id){
      RoleUser::where('user_id',$id)->delete();
      foreach($request->role_id as $role){
          $userRole = RoleUser::create([
            'user_id' => $id,
            'role_id' => $role,
          ]);
      }
    }

    if (!$user) return redirect()->back()->withError('Error in updating User');

    if (!$email_exists) {
      $user->update(['password' => null] );
      if($request->update_profile || $previous_email == auth()->user()->email) 
      {
        auth()->logout();
        return redirect()->route('admin.login')->with('flash_success', 'User updated Successfully and mail is sent to changed email');
      }
      return redirect()->route('user.index')->withSuccess('User updated Successfully and mail is sent to changed email');
    }
    if($request->update_profile) return redirect()->route('user.update_profile')->withSuccess('Profile updated Successfully');
    return redirect()->route('user.index')->withSuccess('User updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect()->back()->withSuccess('User deleted Successfully');
  }

  public function status($id)
  {
    $user = User::find($id);
    $user->status = $user->status ? 0 : 1;
    $user->save();
    return redirect()->back()->withSuccess('User status changed Successfully');
  }
}
