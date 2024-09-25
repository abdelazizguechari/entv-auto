 
 @extends('admin.dash')

 @section('admin')

<div class="page-content">
  <div class="col-lg-12 col-xl-12 stretch-card">
    
    <x-chat-aside :currentUserId="$currentUserId" :users="$users" />


</div>

</div>


@endsection