@extends('admin.includes.main')
@section('title',isset($user->id) ? 'Update User' : 'Add New User')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- BreadCrumb -->
  @include('admin.includes.partials.breadcrumb', ['breadcrumb_title' => isset($user->id) ? 'Update User' : 'Add New User'])

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @if ( \Helper::hasPermission(['user-list']) )
            <div class="card-header">
              <h3 class="card-title"><a href="{{route('user.index')}}" class="btn btn-block btn-outline-success btn-sm"> All Users</a></h3>
            </div>
            @endif
            <form action="{{isset($user->id) ? route('user.update',$user->id) : route('user.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @if(isset($user->id))@method('PUT')@endif
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="name">Name : <sup class="text-danger">*required</sup></label>
                      <input type="text" class="form-control" required id="name" name="name" value="{{  $user->name ?? old('name') }}" placeholder="Name">
                      @if ( $errors->has('name') )
                      <small class="text-danger">* {{ $errors->first('name') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label> Choose Roles : <sup class="text-danger">*required</sup></label>
                      <select class="select2bs4 w-100" multiple="multiple" data-placeholder="Select Roles" required name="role_id[]">
                        @foreach($roles as $role)
                        <option @if(isset($user)) {{in_array($role->id, $user_roles) ? 'selected' : ''}} @endif value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('role_id'))
                      <span class="text-danger">{{ $errors->first('role_id') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="gender" class="d-block">Gender: </label>
                      @foreach (['male', 'female', 'others'] as $gender)
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" name="gender" class="form-check-input" value="{{ $gender }}" @if(isset($user)) {{ ($user->gender == $gender) ? 'checked' : '' }} @elseif(old('gender')==$gender) checked @endif> {{ ucfirst($gender) }}
                        </label>
                      </div>
                      @endforeach
                      @if ($errors->has('gender'))
                      <small class="text-danger">* {{ $errors->first('gender') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="address">Address :</label>
                      <input type="text" class="form-control" id="address" name="address" value="{{ $user->address ?? old('address') }}" placeholder="Address">
                      @if ( $errors->has('address') )
                      <small class="text-danger">* {{ $errors->first('address') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="phone_number">Contact no.:</label>
                      <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number ?? old('phone_number') }}" placeholder="Contact Number">
                      @if ( $errors->has('phone_number') )
                      <small class="text-danger">* {{ $errors->first('phone_number') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="email">Email:<sup class="text-danger">*required</sup></label>
                      <input type="email" class="form-control" required id="email" name="email" value="{{ $user->email ?? old('email') }}" placeholder="Email">
                      @if ( $errors->has('email') )
                      <small class="text-danger">* {{ $errors->first('email') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="dob">Date of Birth :</label>
                      <input type="date" class="form-control" id="dob" name="dob" value="{{ isset($user->dob) ? (session()->get('nepaliDatePicker') ? \Helper::eng2nep($user->dob) : $user->dob) : old('dob') }}" placeholder="yyyy-mm-dd">
                      @if ( $errors->has('dob') )
                      <small class="text-danger">* {{ $errors->first('dob') }}</small>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="citizenship_no">Citizenship no. : </label>
                      <input type="text" class="form-control" id="citizenship_no" name="citizenship_no" value="{{ $user->citizenship_no ?? old('citizenship_no') }}" placeholder="Citizenship no.">
                      @if ( $errors->has('citizenship_no') )
                      <small class="text-danger">* {{ $errors->first('citizenship_no') }}</small>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="display-image text-center mb-2">
                        <a @if(isset($user->pp_image)) href="{{ config('app.file_url').$user->pp_image }}" target="_blank" @else href="#" @endif> <img src="{{ isset($user->pp_image) ? config('app.file_url').$user->pp_image : asset(config('constant.noImageTemplate')) }}" class="display-img-thumbnail img-thumbnail mb-2" id="pp_image_display" alt="Display Image" width="120" style="height: 100px;"> </a>
                      </div>
                      <label for="pp_image">Upload Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="pp_image" id="pp_image" accept="image/png, image/jpg, image/jpeg">
                          <label class="custom-file-label" for="pp_image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="display-image text-center mb-2">
                        <a @if(isset($user->citizenship)) href="{{ config('app.file_url').$user->citizenship }}" target="_blank" @else href="#" @endif> <img src="{{ isset($user->citizenship) ? config('app.file_url').$user->citizenship : asset(config('constant.noImageTemplate')) }}" class="display-img-thumbnail img-thumbnail mb-2" id="citizenship_display" alt="Display Image" width="120" style="height: 100px;"> </a>
                      </div>
                      <label for="citizenship">Citizenship Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="citizenship" id="citizenship" accept="image/png, image/jpg, image/jpeg">
                          <label class="custom-file-label" for="citizenship">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>
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

@section('javascript')

<script>
  $("#pp_image,#citizenship").change(function(event) {
    PalikaUtils.displayImageToDiv($(this).attr('id'),this.files);
  });
</script>

@endsection