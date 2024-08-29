<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>entv park auto</title>


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts --> 

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.cs')}}s">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo2/style.css')}}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
</head>
<body>



<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content ">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
         
            <div class="col-md-12 ps-md-0">
              <div class="auth-form-wrapper  px-3 py-5">
                <a href="#" class="noble-ui-logo text-center logo-light d-block mb-2">parck<span>auto</span></a>
                <h5 class="text-muted  text-center  fw-normal mb-4">Create account.</h5>


                <form action="{{route('user.signe')}}" method="POST" class="forms-sample">
                  @csrf

                  <div class="row">
                    <div class=" d-flex flex-wrap  justify-content-between">
                      <div class="mb-3 me-2">
                        <label for="exampleInputUsername1" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="exampleInputUsername1" placeholder="First Name" required>
                      </div>
                      <div class="mb-3 ">
                        <label for="exampleInputUsername1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="exampleInputUsername1" placeholder="Last Name" required>
                      </div>
                      <div class="mb-3 me-2">
                        <label for="exampleInputUsername1" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputUsername1" placeholder="Email" required>
                      </div>
                      <div class="mb-3 me-2">
                        <label for="exampleInputUsername1" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputUsername1" autocomplete="phone" placeholder="Phone" required>
                      </div>
                      <div class="mb-3 me-2">
                        <label for="exampleInputWilaya" class="form-label">Wilaya</label>
                        <select required name="wilaya" id="exampleInputWilaya" class="form-select"></select>
                    </div>
                    <div class="mb-3 me-2">
                      <label for="userBirthday" class="form-label">Date de naissance</label>
                      <input required type="date" class="form-control" name="birthday" id="userBirthday" placeholder="Date de naissance">
                  </div>
                   
                      <div class="mb-3 me-2">
                        <label for="address" class="form-label">address</label>
                        <input required ="text" class="form-control" name="address" id="address" placeholder="address">
                      </div> 
                      <div class="mb-3 me-2">
                        <label for="mat" class="form-label">mat</label>
                        <input  required ="text" class="form-control" name="mat" id="mat" placeholder="mat">
                      </div> 
                      <div class="mb-3 me-2">
                        <label for="userPassword" class="form-label">Password</label>
                        <input required type="password" class="form-control" name="password" id="userPassword" placeholder="Password">
                      </div> 
                    </div>
                  </div>
                
                  <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="authCheck">
                    <label class="form-check-label" for="authCheck">Remember me</label>
                  </div>
                  <div>
                    <input type="submit" class="btn btn-primary text-white me-2 mb-2 mb-md-0">
                  </div>
                  <a href="{{route('admin.logout')}}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
                </form>
                
              </div>
            </div>
          </div>
                    </div>
                </div>
            </div>

        </div>
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

	<!-- Custom js for this page -->
  <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>
	<!-- End custom js for this page -->

</body>
</html>


<script>
  const wilayas = [
      "Adrar", "Chlef", "Laghouat", "Oum El Bouaghi", "Batna", "Béjaïa", "Biskra", "Béchar", 
      "Blida", "Bouira", "Tamanrasset", "Tébessa", "Tlemcen", "Tiaret", "Tizi Ouzou", "Alger", 
      "Djelfa", "Jijel", "Sétif", "Saïda", "Skikda", "Sidi Bel Abbès", "Annaba", "Guelma", 
      "Constantine", "Médéa", "Mostaganem", "M'Sila", "Mascara", "Ouargla", "Oran", "El Bayadh", 
      "Illizi", "Bordj Bou Arreridj", "Boumerdès", "El Tarf", "Tindouf", "Tissemsilt", "El Oued", 
      "Khenchela", "Souk Ahras", "Tipaza", "Mila", "Aïn Defla", "Naâma", "Aïn Témouchent", "Ghardaïa", 
      "Relizane", "Timimoun", "Bordj Badji Mokhtar", "Ouled Djellal", "Béni Abbès", "In Salah", 
      "In Guezzam", "Touggourt", "Djanet", "El M'Ghair", "El Meniaa"
  ];

  const selectElement = document.getElementById('exampleInputWilaya');

  wilayas.forEach(wilaya => {
      const option = document.createElement('option');
      option.value = wilaya;
      option.textContent = wilaya;
      selectElement.appendChild(option);
  });
</script>