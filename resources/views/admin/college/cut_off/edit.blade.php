@extends('layouts.admin')

@section('title','Edit Cut Offs')

@section('breadcrumb')
<div class="row align-items-center mb-2">
	<div class="col">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="{{url('/admin/college')}}">College</a></li>
				<li class="breadcrumb-item"><a href="{{url('/admin/college/cut_offs/'.$cut_offs->college_id)}}">Cut Offs</a></li>
				<li class="breadcrumb-item active" aria-current="category">Edit Cut Offs</li>
			</ol>
		</nav>
	</div>
</div>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow mb-4">
			<div class="card-header">
				<strong class="card-title">Edit Cut Offs</strong>
			</div>
			<div class="card-body">
				<form action="{{url('admin/college/cut_offs/edit_cut_offs/'.$cut_offs->id)}}" method="POST" enctype="multipart/form-data" class="form-group">
					@csrf	
					<div class="form-group row">
						<label for="heading" class="col-sm-2 col-form-label">Heading</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="heading" value="{{$cut_offs->heading}}">
							{!! $errors->first('heading', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="slug" name="slug" value="{{$cut_offs->slug}}">
							{!! $errors->first('slug', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="long_description" class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="long_description" required>{{$cut_offs->long_description}}</textarea>
							{!! $errors->first('long_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="meta_name" class="col-sm-2 col-form-label">Meta Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="meta_name" value="{{$cut_offs->meta_name}}">
							{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_keyword" rows="3" required>{{$cut_offs->meta_keyword}}</textarea>
							{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="meta_description" rows="3" required>{{$cut_offs->meta_description}}</textarea>
							{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-10">
							<input type="hidden" name="status" value="0">
							<input type="checkbox" name="status" value="1" style="margin-top: 7px" @if(old('status', $cut_offs->status)) checked @endif>
						</div>
					</div>
					<input type="hidden"  name="college_id" value="{{$cut_offs->college_id}}">
					<div class="form-group mb-2">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Script -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'long_description', {
    filebrowserBrowseUrl: '/Education/public/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/Education/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script -->
@stop

							