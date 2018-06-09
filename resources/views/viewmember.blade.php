@extends('layout')
  @section('content')
	  <div class="content-wrapper" style="background-image: url(background1.jpg);">
		  <div class="container-fluid">
			  <!-- Breadcrumbs-->
				  <ol class="breadcrumb">
				  <li class="breadcrumb-item">
					  <a href="/ssindex">Dashboard</a>
				  </li>
				  <li class="breadcrumb-item active">Tasks</li>
				  </ol>
			  <div class="row">
				  	<div class="col-12">
					  <h1>View all Employees</h1>
          				<hr>
				  	<div class="container">
					  	<div class="row">
							@foreach ($Cdata as $key)
							<div class="col-md-3" style="margin-left: 10px; margin-top: 10px;">
								<div class="card bg-light" style="border-top: 4px solid #c0503e;">
									<div class="card-header text-center">
									  <img src={{ url('/') }}/uploads/profiles/{{ $key->profile_pic }} alt="profile_picture" style="width: 100px; height:100px; position: center; border-radius: 50%; margin-top: 10px;">
									</div>
									<div class="card-body text-center">
										<h6 class="card-text">
											{{ $key->name }}
										</h6>
										<p class="card-text">
											{{ $key->email }}
										</p>
										<p class="card-text">
											{{ $key->role }}
										</p>
										@if ($key->status)
											<p class="card-text">
												Currently Assigned
											</p>
										@else
											<p class="card-text">
												Currently Available
											</p>
										@endif
									</div>
									<div class="card-footer">
										<a href="#" class="btn btn-primary">more</a>
									</div>
							  </div>
							</div>
							@endforeach
						</div>
					</div>
		  		</div>
			</div>
		  </div>
	  </div>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
@endsection