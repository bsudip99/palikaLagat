@extends('admin.includes.main')
@section('title',isset($role->id) ? 'Update Role' : 'Add New Role')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- BreadCrumb -->
    @include('admin.includes.partials.breadcrumb', ['breadcrumb_title' => isset($role->id) ? 'Update Role' : 'Add New Role'])

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              @if ( \Helper::hasPermission(['role-list']) )
              <div class="card-header">
                <h3 class="card-title"><a href="{{route('roles.index')}}" class="btn btn-block btn-outline-success btn-sm"> All Roles</a></h3>
              </div>
              @endif
              <form action="{{isset($role->id) ? route('roles.update',$role->id) : route('roles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($role->id)) @method('PUT') @endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name <sup class="text-danger">*required</sup></label>
                    <input type="text" class="form-control" required name="name" id="name" value="{{$role->name ?? (old('name'))}}" placeholder="Enter Role name">
                    @if ( $errors->has('name') )
                    <small class="text-danger">* {{ $errors->first('name') }}</small>
                    @endif
                  </div>
                  <h5 style="font-weight: 500">Select Permissions</h5 style="font-weight: 500">
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-striped" style="width:100%">
                      <thead>
                        <tr>
                          <th>Permission Module</th>
                          <th>Permission List</th>
                      </thead>
                      <tbody>
                        @foreach ($permission_modules as $p_module )
                        <tr>
                          <td>{{ $p_module->name }}</td>
                          <td class="d-flex">
                            @foreach($p_module->permissions as $permission)
                            <label class="checkbox-container d-flex mr-3">
                              <input type="checkbox" class="mt-1 mr-1" @isset($role_permissions) @if(in_array($permission->id, $role_permissions)) checked @endif @endisset name="permissions[]" value="{{ $permission->id }}" >
                              <span class="checkmark"></span>
                              <span class="permission-title">{{ $permission->name }}</span>
                            </label>
                            @endforeach
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-sm">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
  