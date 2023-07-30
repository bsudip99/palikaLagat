@extends('admin.includes.main')
@section('title','User Management')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- BreadCrumb -->
    @include('admin.includes.partials.breadcrumb', ['breadcrumb_title' => 'All Users'])

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              @if ( \Helper::hasPermission(['user-create']) )
              <div class="card-header">
                <h3 class="card-title"><a href="{{route('user.create')}}" class="btn btn-outline-success btn-sm"> Add New User</a></h3>
              </div>
              @endif
              <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th>Phone No.</th>
                      <th>Status</th>
                      @if ( \Helper::hasPermission(['user-detail', 'user-edit']) )
                      <th>Action</th>
                      @endif
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $loop->index+1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{$user->email }}</td>
                      <td></td>
                      <td>{{ $user->phone_number }}</td>
                      <td>
                          <a href="{{ route('user.status', $user->id) }}" class="badge badge-{{ ($user->status) ? 'success' : 'warning' }}">
                          {{ ($user->status) ? 'Active' : 'Inactive' }}
                          </a>
                      </td>
                      @if ( \Helper::hasPermission(['user-detail', 'user-edit']) )
                      <td>
                        @if ( \Helper::hasPermission(['user-detail']) )
                        <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-sm btn-success" title="Show User">
                          <i class="fas fa-eye"></i>
                        </a>
                        @endif
                        @if ( \Helper::hasPermission(['user-edit']) )
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-success" title="Edit User">
                          <i class="fas fa-edit"></i>
                        </a>
                        @endif
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
  