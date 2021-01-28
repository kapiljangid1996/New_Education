@extends('layouts.front')

@section('title')
	{{ $courses[0]->name }}
@stop

@section('content')
<link rel="stylesheet" href="{{asset('css/star.css')}}">
<!--page-banner-area start-->
<div class="page-banner height-200 bg-1">
	<div class="d-table">
		<div class="page-title vertical-middle text-center">
			<h2>{{ $courses[0]->name }}</h2>
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
						<li><a href="{{url('/courses')}}">Courses</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li>{{ $courses[0]->name }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumb-area end-->

<!--course-details start-->
<div class="course-details-area mt-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="course-details mb-40">
					<h2>{{ $courses[0]->name }}</h2>
					<div class="course-info mt-25 mb-50">
						<ul class="list-none">
							<li>
								<a><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($courses[0]->created_st)->format('d F, Y')}}</a>
							</li>
							<li>
								<a href="#">Review</a>
								<div class="author-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
									<span>(4.5 Rate)</span>
								</div>
							</li>
						</ul>
					</div>
					
					<div>
						<div>
							{!! $courses[0]->long_description !!}
						</div>
					</div>
				</div>

				<!--rating-box-->
				<h3>Review and Rating</h3>
				<div class="rating-box mt-25">
					<div class="row">
						<div class="col-lg-3">
							<div class="rating-number d-table">
								<div class="vertical-middle">
									<h5>4.0</h5>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<p>Average Rating</p>
								</div>
							</div>
						</div>
						<div class="col-lg-9 mt-sm-40">
							<!--rating-line-->
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-4">
									<strong>5 stars</strong>
								</div>
								<div class="col-xl-8 col-lg-7 col-5">
									<div class="single-progress">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="20"
											aria-valuemin="0" aria-valuemax="100" style="width:20%">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-2">
									<span>1</span>
								</div>
							</div>
							<!--rating-line-->
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-4">
									<strong>4 stars</strong>
								</div>
								<div class="col-xl-8 col-lg-7 col-5">
									<div class="single-progress">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="20"
											aria-valuemin="0" aria-valuemax="100" style="width:20%">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-2">
									<span>1</span>
								</div>
							</div>
							<!--rating-line-->
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-4">
									<strong>3 stars</strong>
								</div>
								<div class="col-xl-8 col-lg-7 col-5">
									<div class="single-progress">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="20"
											aria-valuemin="0" aria-valuemax="100" style="width:20%">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-2">
									<span>1</span>
								</div>
							</div>
							<!--rating-line-->
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-4">
									<strong>2 stars</strong>
								</div>
								<div class="col-xl-8 col-lg-7 col-5">
									<div class="single-progress">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="0"
											aria-valuemin="0" aria-valuemax="100" style="width:0%">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-2">
									<span>0</span>
								</div>
							</div>
							<!--rating-line-->
							<div class="row">
								<div class="col-xl-2 col-lg-3 col-4">
									<strong>1 star</strong>
								</div>
								<div class="col-xl-8 col-lg-7 col-5">
									<div class="single-progress">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="0"
											aria-valuemin="0" aria-valuemax="100" style="width:0%">
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-2 col-lg-2 col-2">
									<span>0</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="student-reviews mt-20">
					<ul class="list-none">
						<li>
							<div class="student-thumb">
								<a href="#"><img src="{{asset('FrontDesign/images/courses/students/1.png')}}" alt="" /></a>
								<a href="#">Lyly Maymac</a>
								<small>1 Month Ago</small>
							</div>
							<div class="student-review">
								<div class="students-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,</p>
							</div>
						</li>
						<li>
							<div class="student-thumb">
								<a href="#"><img src="{{asset('FrontDesign/images/courses/students/2.png')}}" alt="" /></a>
								<a href="#">Gerard Hynes</a>
								<small>3 Months Ago</small>
							</div>
							<div class="student-review">
								<div class="students-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,</p>
							</div>
						</li>
						<li>
							<div class="student-thumb">
								<a href="#"><img src="{{asset('FrontDesign/images/courses/students/3.png')}}" alt="" /></a>
								<a href="#">Rosie White</a>
								<small>5 Months Ago</small>
							</div>
							<div class="student-review">
								<div class="students-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<!--course-author-->
				
				<!--author-bio-->
				<div class="author-bio text-center mt-50">
					<h3>Ms. Lucius</h3>
					<small>Software Engineer</small>
					<img src="{{asset('FrontDesign/images/courses/authors/1.png')}}" alt="" />
					<div class="author-rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<span>(4.5 Rate)</span>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore .</p>
					<div class="social-icons mt-20">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
				
				<!--advertisement-->
				<div class="sidebar-advertisement bg-1 height-250 mt-50">
					<div class="d-table">
						<div class="vertical-middle">
							<h3>Book Store</h3>
							<p>Buy Book Online Now!</p>
							<a href="#" class="btn-common mt-10">Visit Store</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--course-details end-->
@stop