@extends('admin.includes.main')
@section('title','Role Management')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- BreadCrumb -->
  @include('admin.includes.partials.breadcrumb', ['breadcrumb_title' => 'All Roles'])

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><a href="{{route('roles.create')}}" class="btn btn-outline-success btn-sm"> Add New Role</a></h3>
            </div>
            <div class="card-body">
              <table id="datatable-buttons" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Role</th>
                    <th>Created Date</th>
                    @if ( \Helper::hasPermission(['role-edit', 'role-delete']) )
                    <th>Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $role )
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{$role->name}}</td>
                    <td>{{ $role->created_at->format('Y-m-d') }}</td>
                    @if ( \Helper::hasPermission(['role-edit', 'role-delete']) )
                    <td>
                      @if ( \Helper::hasPermission(['role-edit']))
                      <a href="{{route('roles.edit',$role->id)}}" class="btn btn-sm btn-success" title="Edit Role"><i class="fas fa-edit"></i></a>
                      @endif
                      @if ( \Helper::hasPermission(['role-delete']))
                      <a href="#" class="btn btn-sm btn-danger delete-modal" data-id="{{ $role->id }}" title="Delete Role"><i class="fas fa-trash"></i></a>
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
  @if ( \Helper::hasPermission(['role-delete']))
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalCenterTitle"><span id="modal-title">Confirmation Message!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <h4>Are you sure want to delete?</h4>
          </div>
        </div>
        <div class="modal-footer">
          <div class="d-flex float-right">
            <a href="" class="btn btn-success btn-sm float-right" id="delete-confirm">Confirm</a>&nbsp;
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">Cancel</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')

<script>
  var app = {
    init() {
      this.binders();
    },
    binders() {
      $('.delete-modal').on('click', function(event) {
        event.preventDefault();
        let role_id = $(this).attr('data-id');
        PalikaUtils.showModal('deleteModal');
        var delete_url = '{{ route("roles.delete", ":id") }}';
        delete_url = delete_url.replace(':id', role_id);
        $('#delete-confirm').attr('href', delete_url);
      });
    },
  };

  $(function() {
    app.init();
  });
</script>

@endsection