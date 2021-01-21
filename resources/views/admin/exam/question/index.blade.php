@extends('layouts.admin')

@section('title','Exam Questions')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{ url('/admin/exam') }}">Exam</a></li>
				<li class="breadcrumb-item active" aria-current="product">Exam Questions</li>
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
				<strong class="card-title">Exam Questions</strong>
			</div>
			<div class="card-body">
				<div class="toolbar">
					<div class="row">
						<div class="col-sm-6">
							<a href="{{url('admin/exam/question/add_question/'.$id)}}" class="btn btn-primary btn-round">Add</a>
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
							foreach ($questions as $question){
								$index++;
						?>
						<tr>
							<td><?php echo $index; ?></td>
							<td>{{ $question->name }}</td>
							<td>{{ $question->slug }}</td>
							<td>
								@if($question->status == 1)
                                  	Active
                              	@else
                                  	Inactive
                              	@endif
							</td>
							<td>
								<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="/admin/exam/question/edit_question/{{ $question->id }}">Edit</a>
									<a class="dropdown-item" href="/admin/exam/question/delete_question/{{ $question->id }}" onclick="return confirm('Are you sure you want to delete')">Delete</a>									
								</div>
							</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
				<div class="row">
					<ul class="pagination" style="margin-left: 15px">
						{!! $questions->links("pagination::bootstrap-4") !!}
					</ul>
				</div>
				<ul style="margin-left: 10px">{!! "Page " . $questions->currentPage() . " of " . $questions->lastPage()  !!}</ul>
			</div>
		</div>
	</div>
</div>
@stop