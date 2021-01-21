@extends('layouts.admin')

@section('title','College Cut Offs')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ url('/admin/college') }}">College</a></li>
				<li class="breadcrumb-item active" aria-current="product">College Cut Offs</li>
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
				<strong class="card-title">College Cut Offs</strong>
			</div>
			<div class="card-body">
				<div class="toolbar">
					<div class="row">
						<div class="col-sm-6">
							<a href="{{url('admin/college/cut_offs/add_cut_offs/'.$id)}}" class="btn btn-primary btn-round">Add</a>
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
				<table class="table table-borderless table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Heading</th>
							<th>Slug</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php
							$index = 0;	
							foreach ($cut_offs as $cut_off){
								$index++;
						?>
						<tr>
							<td><?php echo $index; ?></td>
							<td>{{ $cut_off->heading }}</td>
							<td>{{ $cut_off->slug }}</td>
							<td>
								@if($cut_off->status == 1)
                                  	Active
                              	@else
                                  	Inactive
                              	@endif
							</td>
							<td>
								<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="/admin/college/cut_offs/edit_cut_offs/{{ $cut_off->id }}">Edit</a>
									<a class="dropdown-item" href="/admin/college/cut_offs/delete_cut_offs/{{ $cut_off->id }}" onclick="return confirm('Are you sure you want to delete')">Delete</a>									
								</div>
							</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
				<div class="row">
					<ul class="pagination" style="margin-left: 15px">
						{!! $cut_offs->links("pagination::bootstrap-4") !!}
					</ul>
				</div>
				<ul style="margin-left: 10px">{!! "Page " . $cut_offs->currentPage() . " of " . $cut_offs->lastPage()  !!}</ul>
			</div>
		</div>
	</div>
</div>
@stop