@php
	       $theme = session('theme', 'dark');
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>admin panel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts --> 


  	<!-- Plugin css for this page -->
	  <link rel="stylesheet" href="{{asset('backendassets/vendors/fullcalendar/main.min.css')}}">
	  <!-- End plugin css for this page -->
  
  
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
	<!-- End plugin css for this page -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.cs')}}s">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->

	
	  <!-- CSS -->
	  <link rel="stylesheet" href={{asset('backend/assets/css/demo1/stylee.css')}}>
	  <!-- End CSS -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

 <!-- Layout styles -->


   <!-- Layout styles -->
   <link id="theme-style" rel="stylesheet" href="{{ $theme === 'light' ? asset('backend/assets/css/demo1/style.css') : asset('backend/assets/css/demo2/style.css') }}">
   <!-- End layout styles --


  <link rel="shortcut icon" href="{{asset('backend/assets/images/entvlogo.png')}}" sizes="48x48" type="image/png"/>


  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <style>
	/* Inline styles to handle initial theme */
	:root {
		--default-theme: url("{{ asset('backend/assets/css/demo2/style.css') }}"); /* Dark mode */
	}
</style>

</head>
<body>
	

		<-- partial:partials/_sidebar.html -->
   @include('admin.body.sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
            @include('admin.body.header')
			<!-- partial -->

@yield('admin')

			<!-- partial:partials/_footer.html -->
            @include('admin.body.footer')
			<!-- partial -->
		
		</div>
	</div>

		

	<!-- core:js -->
	<script src="{{asset('backend/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>

	<!-- endinject -->

	
	<!-- Plugin js for this page -->
  <script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- Custom js for this page -->
  
	<!-- End custom js for this page -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


	@php
	use Illuminate\Support\Facades\Session;
@endphp
	<script>
		@if(Session::has('message'))
		var type = "{{ Session::get('alert-type','info') }}"
		switch(type){
		   case 'info':
		   toastr.info(" {{ Session::get('message') }} ");
		   break;
	   
		   case 'success':
		   toastr.success(" {{ Session::get('message') }} ");
		   break;
	   
		   case 'warning':
		   toastr.warning(" {{ Session::get('message') }} ");
		   break;
	   
		   case 'error':
		   toastr.error(" {{ Session::get('message') }} ");
		   break; 
		}
		@endif 
	   </script>


<!-- Plugin js for this page -->
<script src="{{asset('backend/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/js/data-table.js')}}"></script>
  <!-- End plugin js for this page -->


  	<!-- Custom js for this page -->
	<script src="{{asset('backend/assets/js/fullcalendar.js')}}"></script>
	<script src="{{asset('backend/assets/vendors/moment/moment.min.js')}}"></script>
	<script src="{{asset('backend/assets/vendors/fullcalendar/main.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('backend/assets/js/code/code.js')}}"></script>


    <!-- Scripts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>

var theme = "{{ $theme }}"; 



      document.addEventListener('DOMContentLoaded', function () {
    const themeSwitcher = document.getElementById('theme-switcher');
    const themeStyle = document.getElementById('theme-style');
    const themeIcon = document.getElementById('theme-icon');

    function setTheme(theme) {
        console.log('Setting theme to:', theme); // Debugging line
        if (theme === 'light') {
            themeStyle.href = "{{ asset('backend/assets/css/demo1/style.css') }}"; // Light mode
            themeIcon.setAttribute('data-feather', 'sun'); // Light mode icon
        } else {
            themeStyle.href = "{{ asset('backend/assets/css/demo2/style.css') }}"; // Dark mode
            themeIcon.setAttribute('data-feather', 'moon'); // Dark mode icon
        }
        feather.replace(); // Re-render feather icons
    }

    // Set the initial theme based on server-side value
    setTheme("{{ $theme }}");

    // Event listener to switch themes
    themeSwitcher.addEventListener('click', function () {
        console.log('Button clicked'); // Debugging line
        const newTheme = themeStyle.href.includes('demo2/style.css') ? 'light' : 'dark';
        
        // Update theme in session
        fetch("{{ route('theme.switch') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ theme: newTheme })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Theme switched successfully:', data); // Debugging line
            setTheme(newTheme);
        })
        .catch(error => {
            console.error('Error switching theme:', error); // Error handling
        });
    });
});

    </script>


<script>

	
  </script>

  <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>

</body>
</html>    