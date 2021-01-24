@extends('layouts.admin')

@section('title','Menu Manager')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="product">Menu Manager</li>
			</ol>
		</nav>
	</div>
</div>
@stop

@section('content')
<div class="row">
	<div class="col-md-12 my-4">
		<div class="card shadow">
			<div class="card-header">
				<strong class="card-title">Menu Manager</strong>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="card-body">
						<div class="toolbar">
							<div class="row">
								<div class="col-sm-6">
									<a href="" class="btn btn-primary btn-round">Add Menu Items</a>
								</div>
								<div class="col-sm-6">
									<div class="dataTables_filter">
										<label style="float: right;">
											<span class="bmd-form-group bmd-form-group-sm">
												<input type="text" class="form-control" id="myInput" value="" placeholder="Search">
											</span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="card-body">
						<div class="toolbar">
							<div class="row">
								<div class="col-sm-8">
									<a href="" class="btn btn-primary btn-round">Add Menu Items</a>
								</div>
								<div class="col-sm-4">
									<div class="dataTables_filter">
										<label style="float: right;">
											<span class="bmd-form-group bmd-form-group-sm">
												<input type="text" class="form-control" id="myInput" value="" placeholder="Search">
											</span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>
</div>
@stop