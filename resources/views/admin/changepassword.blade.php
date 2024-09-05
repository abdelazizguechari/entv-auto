<style>
  .form-control {
      background-color: transparent !important;
  }
  
  </style>


@extends('admin.dash')

@section('admin')
<div class="page-content">
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
    </div>

    <div class="col-md-8 col-xl-12 middle-wrapper">
      <div class="row">
        <div class="card bg-transparent">
          <div class="card-body bg-dark ">
            <h6 class="card-title fs-4">Change Password</h6>
            <hr>
            <form action="{{ route('password.change') }}" method="POST" class="forms-sample">
              @csrf
              <div class="mb-3">
                <label for="oldpassword" class="form-label">Old Password</label>
                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="oldpassword">
                @error('old_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            
              <div class="mb-3">
                <label for="newpassword" class="form-label">New Password</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="newpassword">
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            
              <div class="mb-3">
                <label for="newpassword_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="newpassword_confirmation">
                @error('new_password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            
              <button type="submit" class="btn btn-primary me-2">Change</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
