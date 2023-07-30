@extends('admin.includes.main')
@section('title','User Profile')
@section('css')
<style>
  .user-image{
    position: relative;
  }
  .user-image img{
    position: absolute;
    transform: translate(0,30%);
    -webkit-box-shadow: 6px 8px 4px -4px #222, -6px 8px 4px -4px #666;
    box-shadow: 6px 8px 4px -4px #222222ab, -6px 8px 4px -4px #666;
  }

  .image-title{
    position: absolute;
    bottom: 0;
  }
</style>
    
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid mt-4">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-body pt-0 mt-4">
                <div class="row">
                  <div class="col-md-4">
                    <h2><b>{{$user->name}}</b></h2>
                    <ul class="ml-4 mb-0 fa-ul">
                      <li><span class="fa-li"><i class="fas fa-building"></i></span> <label for="address"> Address: </label> {{$user->address}}</li>
                      <li><span class="fa-li"><i class="fas fa-phone"></i></span> <label for="phone_number"> Phone #:</label> {{$user->phone_number}}</li>
                      <li><span class="fa-li"><i class="fas fa-mars"></i></span> <label for="gender"> Gender:</label> {{$user->gender ? ucfirst($user->gender) : 'N/A'}}</li>
                      <li><span class="fa-li"><i class="fas fa-calendar-alt"></i></span> <label for="dob"> Date of Birth:</label> {{$user->dob}}</li>
                      <li><span class="fa-li"><i class="fas fa-medkit"></i></span> <label for="blood_group"> Blood Group:</label> {{$user->blood_group}}</li>
                      <li><span class="fa-li"><i class="fas fa-passport"></i></span> <label for="citizenship_no"> Citizenship No.:</label> {{$user->citizenship_no}}</li>
                    </ul>
                  </div>
                  <div class="col-md-4">
                    <div class="user-image">
                      <img src="{{ isset($user->pp_image) ? config('app.file_url').$user->pp_image : asset(config('constant.noImageTemplate')) }}" alt="user-avatar" height="150">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="user-image">
                      <img src="{{ isset($user->citizenship) ? config('app.file_url').$user->citizenship : asset(config('constant.noImageTemplate')) }}" alt="user-avatar" height="150">
                    </div>
                    <div class="image-title"><b>Citizenship</b></div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit User
                  </a>
                </div>
              </div>
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
  