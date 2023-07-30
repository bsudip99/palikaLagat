<?php

namespace App\Http\Controllers;

use App\Models\PermissionModule;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function __construct()
  {
    $this->middleware('has_permission:role-create')->only(['create', 'store',]);
    $this->middleware('has_permission:role-list')->only(['index']);
    $this->middleware('has_permission:role-edit')->only(['update']);
    $this->middleware('has_permission:role-delete')->only(['destroy']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $roles = Role::notSuperadmin()->get();
    return view('admin.role.index', compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $permission_modules = PermissionModule::orderBy('name')->get();
    return view('admin.role.create-edit', compact('permission_modules'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request->name == 'Superadmin') return back()->withErrors(['name' => 'Name should be except "Superadmin"']);
    $role = Role::create(['name' => $request->name]);
    foreach ($request->permissions as $permission) {
      $permission_role = PermissionRole::create(['role_id' => $role->id, 'permission_id' => $permission]);
    }
    return redirect()->route('roles.index')->withSuccess('Role added Successfully');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $role = Role::find($id);
    $permission_modules = PermissionModule::orderBy('name')->get();
    $role_permissions = $role->permissions ? $role->permissions->pluck('id')->toArray() : [];
    return view('admin.role.create-edit', compact('role', 'permission_modules', 'role_permissions'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $role = Role::findOrFail($id);
    $role->update(['name' => $request->name]);
    PermissionRole::where('role_id', $id)->delete();
    foreach ($request->permissions as $permission) {
      $permission_role = PermissionRole::create(['role_id' => $role->id, 'permission_id' => $permission]);
    }
    return redirect()->route('roles.index')->withSuccess('Role updated Successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $role = Role::find($id);
    if ($role->users->count() > 0) return redirect()->back()->withInfo('Role can\'t be deleted as it is used in the system.');
    $role->delete();
    PermissionRole::where('role_id', $id)->delete();
    return redirect()->back()->withSuccess('Role deleted Successfully');
  }
}
