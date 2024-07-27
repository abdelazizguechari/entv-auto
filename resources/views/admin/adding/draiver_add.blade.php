@extends('admin.dash')

@section('admin') 




<div class="page-content">
	<div class="row">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">Driver Form</h6>
					<form>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Driver's Name</label>
									<input type="text" class="form-control" placeholder="Enter driver's name">
								</div>
							</div><!-- Col -->
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">License Number</label>
									<input type="text" class="form-control" placeholder="Enter license number">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Phone Number</label>
									<input type="text" class="form-control" placeholder="Enter phone number">
								</div>
							</div><!-- Col -->
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Email Address</label>
									<input type="email" class="form-control" placeholder="Enter email address">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Address</label>
									<input type="text" class="form-control" placeholder="Enter address">
								</div>
							</div><!-- Col -->
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Date of Birth</label>
									<input type="date" class="form-control">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Emergency Contact Name</label>
									<input type="text" class="form-control" placeholder="Enter emergency contact name">
								</div>
							</div><!-- Col -->
							<div class="col-sm-6">
								<div class="mb-3">
									<label class="form-label">Emergency Contact Phone</label>
									<input type="text" class="form-control" placeholder="Enter emergency contact phone">
								</div>
							</div><!-- Col -->
						</div><!-- Row -->
						<div class="row">
							<div class="col-sm-12">
								<div class="mb-3">
									<label class="form-label">Upload Driver's Photo</label>
									<input type="file" class="form-control">
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