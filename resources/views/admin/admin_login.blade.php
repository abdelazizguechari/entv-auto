<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Modèle de tableau de bord d'administration HTML réactif basé sur Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, tableau de bord, modèle, réactif, css, sass, html, thème, kit ui, front-end, web">

	<title>entv park auto</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Fin des polices -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/core/core.cs')}}s">
	<!-- endinject -->

	<!-- Plugin css pour cette page -->
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.css')}}">
	<!-- Fin du plugin css pour cette page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{asset('backend/assets/fonts/feather-font/css/iconfont.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
	<!-- endinject -->

    <!-- Styles de mise en page -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo2/style.css')}}">
    <!-- Fin des styles de mise en page -->

    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content bg-dark d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card  bg-transparent">
							<div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="">
                                        <img src="{{ asset('img/car1.jpg') }}" width="215" height="560" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper   px-4 py-5">
                                        <a href="#" class="noble-ui-logo logo-light d-block mb-2">DMT<span style="color: green">ENTV</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Bienvenue ! Connectez-vous à votre compte.</h5>

                                        <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="login" class="form-label">Adresse e-mail</label>
                                                <input type="text" class="form-control" id="login" placeholder="Email" name="email" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="Password" class="form-label">Mot de passe</label>
                                                <input type="password" class="form-control" id="Password" name="password" autocomplete="current-password" placeholder="Mot de passe" required>
                                            </div>
                                            

                                            <div>
                                                <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">Connexion</button>
                                            </div>

                                            <a href={{route('signe.admin')}} class="d-block mt-3 text-muted">Pas encore inscrit ? <span class="link-primary">S'inscrire</span> </a>
                                        </form>

                                        {{-- <a href="{{route('google_auth')}}"> --}}
                                            <div class="d-flex justify-content-center pt-7">
                                                <button type="submit" class="btn btn-outline-primary btn-icon-text">
                                                    Continuer avec Google <img src="{{ asset('backend/assets/images/google.svg') }}" alt="Google" style="width: 20px; height: 20px; margin-left: 8px;">
                                                </button>
                                            </div>
                                        </a>

                                       
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

	<!-- Plugin js pour cette page -->
    <script src="{{asset('backend/assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- Fin du plugin js pour cette page -->

	<!-- inject:js -->
	<script src="{{asset('backend/assets/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/template.js')}}"></script>
	<!-- endinject -->

	<!-- Custom js pour cette page -->
    <script src="{{asset('backend/assets/js/dashboard-dark.js')}}"></script>
	<!-- Fin du custom js pour cette page -->

</body>
</html>
