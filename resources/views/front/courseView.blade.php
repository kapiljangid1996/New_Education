@extends('layouts.front')

@section('title', 'Courses')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--page-banner-area start-->
<div class="page-banner height-200 bg-1">
	<div class="d-table">
		<div class="page-title vertical-middle text-center">
			<h2>Courses</h2>
		</div>
	</div>
</div>
<!--page-banner-area end-->

<!--breadcrumb-area start-->
<div class="breadcrumb-area mt-25">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="site-breadcrumb">
					<ul class="list-none">
						<li><a href="{{url('/')}}">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>Courses</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumb-area end-->

<!--course-area start-->
<div class="course-area mt-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="site-sidebar">
					<form id="coursefilterform" method="post">
						<!--search-->
						<div class="sidebar-search">
							<input id="filter_course_name" class="filter_course" type="text" placeholder="Search Course Name" />
							<input id="filter_course_name_id"  name="course_name" value="" type="hidden" >
							<button><i class="fa fa-search"></i></button>
						</div>
						<!--category-->
						<div class="sidebar-category mt-25">
							<h3 class="sidebar-title">Categories</h3>
							<ul class="list-none">
								@foreach ($categories as $category)
									<input type="checkbox" class="filter_course" name="category_id[]" value="{{$category->id}}"><label class="labelOwnership">{{$category->name}}</label><br>
								@endforeach
							</ul>
						</div>
					</form>											
				</div>
			</div>
			<div class="col-lg-9 mt-sm-50 courseView">
				<div class="row align-items-center mb-30">
					<div class="col-xl-7 col-sm-6"></div>
					<div class="col-xl-5 col-md-6">
						<div class="site-pagination on-top pull-right">
							<ul>
								@if($courses->previousPageUrl() != null)
									<li><a href="{{$courses->previousPageUrl()}}"><i class="fa fa-long-arrow-left"></i></a></li>
								@endif
								<li><a href="#" class="active">{!! $courses->currentPage() !!}</a></li>
								<li>of</li>
								<li><a href="#">{!! $courses->lastPage() !!}</a></li>
								<li><a href="{{$courses->nextPageUrl()}}"><i class="fa fa-long-arrow-right"></i></a></li>
							</ul>
						</div>
						<div class="product-view-system pull-right" role="tablist">
							<ul class="nav nav-tabs">
								<li><a class="active" data-toggle="tab" href="#grid-courses"><img src="{{asset('FrontDesign/images/icons/icon-grid.png')}}" alt="" /></a></li>
								<li><a data-toggle="tab" href="#list-courses"><img src="{{asset('FrontDesign/images/icons/icon-list.png')}}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-content">
					<!--single-tab-->
					<div id="grid-courses" class="tab-pane fade in show active">
						<div class="row">
							@foreach($courses as $key => $course)
								<div class="col-lg-6 col-sm-6 mt-30">
									<div class="course-single">										
										<div class="course-info" style="border-top: 1px solid #ebebeb !important;">
											<div class="course-text mt-10">
												<h3><a href="{{url('/course/'.$course->slug)}}">{{ $course->name }}</a></h3>
												<p class="show-read-more">{{ $course->short_description }}</p>
											</div>
										</div>
										<div class="course-meta">
											<a><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($course->created_st)->format('d F, Y')}}</a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<!--single-tab-->
					<div id="list-courses" class="tab-pane fade">
						<div class="row">
							@foreach($courses as $key => $course)
								<div class="col-lg-12 mt-30">
									<div class="course-single list-view">
										<div class="course-info" style="border-left: 1px solid #ebebeb !important; width: 100% !important">
											<div class="course-text mt-10">
												<div class="table-view">
													<div class="table-cell pr-10">
														<h3><a href="{{url('/course/'.$course->slug)}}">{{ $course->name }}</a></h3>
													</div>
												</div>
												<div class="course-meta">
													<a><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($course->created_st)->format('d F, Y')}}</a>
												</div>
												<p>{{ $course->short_description }}</p>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="row align-items-center mt-30">
					<div class="col-lg-6">
						<div class="site-pagination">
							<ul>
								@if($courses->previousPageUrl() != null)
									<li><a href="{{$courses->previousPageUrl()}}"><i class="fa fa-long-arrow-left"></i></a></li>
								@endif
								<li><a href="#" class="active">{!! $courses->currentPage() !!}</a></li>
								<li>of</li>
								<li><a href="#">{!! $courses->lastPage() !!}</a></li>
								<li><a href="{{$courses->nextPageUrl()}}"><i class="fa fa-long-arrow-right"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="product-results pull-right">
							<span>Showing {{ $courses->firstItem() }}–{{ $courses->lastItem() }} of {{ $courses->total() }} results</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--course-area end-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<!-- Read More and Less for Course Short Description Script Start -->
<script>
$(document).ready(function(){
    var maxLength = 115;
    $(".show-read-more").each(function(){
        var myStr = $(this).text();
        if($.trim(myStr).length > maxLength){
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a " class="read-more">...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function(){
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});
</script>
<!-- Read More and Less for Course Short Description End-->
@stop