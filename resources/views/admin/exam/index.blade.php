@extends('layouts.admin')

@section('title','Exam')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="product">Exam</li>
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
				<strong class="card-title">Exam</strong>
			</div>
			<div class="card-body">
				<div class="toolbar">
					<div class="row">
						<div class="col-sm-6">
							<a href="{{route('exam.create')}}" class="btn btn-primary btn-round">Add</a>
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
							<th>Name</th>
							<th>Slug</th>
							<th>Status</th>
							<th>Action</th>
							<th>More</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php
							$index = 0;	
							foreach ($exams as $exam){
								$index++;
						?>
						<tr>
							<td><?php echo $index; ?></td>
							<td>{{ $exam->name }}</td>
							<td>{{ $exam->slug }}</td>
							<td>
								@if($exam->status == 1)
                                  	Active
                              	@else
                                  	Inactive
                              	@endif
							</td>
							<td>
								<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{route('exam.edit', $exam->id)}}">Edit</a>
									<form action="{{ url('/admin/exam', $exam->id) }}" method="POST">
										@csrf
	                      				@method('DELETE')
										<button class="dropdown-item" type="submit" onclick="return confirm('Are you sure you want to delete')">Delete</button>
									</form>
								</div>
							</td>
							<td>
								<button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="{{ url('/admin/exam/overview', $exam->id) }}">Overviews</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/date', $exam->id) }}">Dates</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/syllabus', $exam->id) }}">Syllabus</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/appform', $exam->id) }}">Application Form</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/pattern', $exam->id) }}">Pattern</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/preparation', $exam->id) }}">Preparation</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/question', $exam->id) }}">Question Papers</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/answer', $exam->id) }}">Answer Key</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/result', $exam->id) }}">Results</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/cutoff', $exam->id) }}">Cut Off</a>
								    <a class="dropdown-item" href="{{ url('/admin/exam/counselling', $exam->id) }}">Counselling</a>
								</div>
							</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
				<div class="row">
					<ul class="pagination" style="margin-left: 15px">
						{!! $exams->links("pagination::bootstrap-4") !!}
					</ul>
				</div>
				<ul style="margin-left: 10px">{!! "Page " . $exams->currentPage() . " of " . $exams->lastPage()  !!}</ul>
			</div>
		</div>
	</div>
</div>
@stop