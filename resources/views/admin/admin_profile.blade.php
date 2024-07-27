@extends('admin.dash')
@section('admin')
	
<div class="page-content">

  

  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
          
            <div>
              <img class="wd-100 rounded-circle" src="{{!empty($profiledata -> photo) 
              ? url('uplode/admin_images/' .$profiledata ->photo ) : url('uplode/no_image.jpg')
            }}" alt="profile">
            
              <span class="h4 ms-3 "> <?php echo $profiledata -> name ; ?> </span>
            </div>
            <div class="dropdown">
            
            </div>
          </div>

          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
            <p class="text-muted"><?php echo $profiledata -> created_at ; ?></p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
            <p class="text-muted"> {{$profiledata -> address}} </p>
          </div>

          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">role:</label>
            <p class="text-muted">{{$profiledata -> role}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{$profiledata -> email}}</p>
          </div>

           <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
            <p class="text-muted">{{$profiledata -> phone}}</p>
          </div>
        
          <div class="mt-3 d-flex social-links">
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="github"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="twitter"></i>
            </a>
            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
              <i data-feather="instagram"></i>
            </a>
          </div>
        </div>
</div>
        </div>

        <div class="col-md-8 col-xl-8 middle-wrapper" >

      <div class="row">

        <div class="card">
          <div class="card-body">
              <h6 class="card-title">Update Profile</h6>
      
              <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                  @csrf
                  <div class="mb-3">
                      <label for="Username" class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" id="Username" autocomplete="off" value="{{ $profiledata->name }}">
                  </div>
      
                  <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" name="address" id="address" autocomplete="off" value="{{ $profiledata->address }}">
                  </div>
      
                  <div class="mb-3">
                      <label for="Email" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" id="Email" value="{{ $profiledata->email }}">
                  </div>
      
                  <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" value="{{ $profiledata->phone }}">
                  </div>
      
                  <div class="mb-3">
                      <label class="form-label" for="formFile">File upload</label>
                      <input class="form-control" type="file" id="formFile" name="photo">
                  </div>
      
                  <div class="mb-3">
                      <img class="wd-80 rounded-circle" src="{{ !empty($profiledata->photo) 
                          ? url('uplode/admin_images/' . $profiledata->photo) 
                          : url('uplode/no_image.jpg') }}" alt="profile" id="show">
                  </div> 
      
                  <button type="submit" class="btn btn-primary me-2">Update</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
              </form>
          </div>
      </div>
      </div>
    </div>
      

            @endsection