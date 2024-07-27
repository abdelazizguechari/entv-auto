@extends('admin.dash')

@section('admin') 


<div class="page-content">
	<div class="row">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">Car Form</h6>
					<form>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Name of Car</label>
									<input type="text" class="form-control" placeholder="Enter name of car">
								</div>
							</div><!-- Col -->
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Color</label>
									<input type="text" class="form-control" placeholder="Enter color">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
						<div class="row">
							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Model</label>
									<input type="text" class="form-control" placeholder="Enter model">
								</div>
							</div><!-- Col -->
							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">Year</label>
									<input type="text" class="form-control" placeholder="Enter year">
								</div>
							</div><!-- Col -->
							<div class="col-sm-4">
								<div class="mb-3">
									<label class="form-label">License Plate</label>
									<input type="text" class="form-control" placeholder="Enter license plate">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Owner's Email Address</label>
									<input type="email" class="form-control" placeholder="Enter owner's email">
								</div>
							</div><!-- Col -->
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Owner's Password</label>
									<input type="password" class="form-control" autocomplete="off" placeholder="Owner's password">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
					</form>
					<button type="button" class="btn btn-primary submit">Submit form</button>
				</div>
			</div>
		</div>
	</div>
    </div>


		

				
           
				
								
									
					

						
				
			









@endsection