@extends('layouts.front')

@section('title', 'Home')

@section('content')
<!--banner-area start-->
<div class="slider">		
	<div class="slider_container">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php $i=0 ?>
				@foreach($sliders as $key => $slider)
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i++ ?>" class="{{$key == 0 ? 'active' : '' }}"></li>
				@endforeach
			</ol>
			<div class="carousel-inner" role="listbox">
				@foreach($sliders as $key => $slider)
					<div class="carousel-item {{$key == 0 ? 'active' : '' }}">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12 px-0">
									<div class="img-box">
										<img class="d-block w-100" src="{{asset('Uploads/Slider/1920x800').'/'.$slider->image}}"  style="width: 1920px; height: 570px">
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
			</a>
		</div>
	</div>
</div>
<div class="container-fluid top-slider-text text-center">
	<div class="row">
		<div class="col-lg-10">
			<div class="banner-inner slider-text-style text-center">
				<div class="banner-text">
					<h1 style="color: white">Find Colleges Online</h1>
					<p style="color: white">Discover over 10,000 courses from 6,500 education providers in United States</p>
				</div>
				<div class="mt-40">
					<div class="form-group search-edutab">
						<nav>
							<div class="nav nav-tabs edutab-color" id="nav-tab " role="tablist" style="border: none !important;">
								<a class="nav-item nav-link active" style="border: none !important;" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">College</a>
								<a class="nav-item nav-link" style="border: none !important;" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Course</a>
								<!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Exams</a> -->
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent" style="padding-top: 2.5px;">
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<input type="text" id="livesearchcollege" searchdata="college" class="form-control input-lg searchresult" placeholder="Enter College Name">
							</div>
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<input type="text" name="course_search" searchdata="course" id="livesearchcourse"  class="form-control input-lg searchresult"  placeholder="Enter Course Name">
							</div>
							<!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
								
							</div> -->
						</div>
						
						<div id="searchlist"></div>
						{{ csrf_field() }}
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<!--banner-area end-->

<!--textblock-area start-->
<!-- <div class="textblock-area">
	<div class="container textblock-inner mt-minus-80">
		<div class="row">
			<div class="col-lg-4 col-sm-12">
				<div class="text-block">
					<h4><i class="ion-ios-play"></i> Best Course Online</h4>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12 mt-sm-20">
				<div class="text-block">
					<h4><i class="ion-md-planet"></i> Best Industry Leader</h4>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-12 mt-sm-20">
				<div class="text-block">
					<h4><i class="ion-md-book"></i> Best Book Library</h4>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--textblock-area end-->

<!--courses-area start-->
<!--<div class="courses-area pb-30 fix mt-60">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title text-center">
					<h2>Our Courses</h2>
				</div>
			</div>
		</div>
		<div class="row mt-60">
			<div class="col-lg-8 offset-lg-2">
				<div class="course-nav-tabs">
					<ul class="nav nav-tabs">
						<li><a class="active" data-toggle="tab" href="#all-courses">All Courses</a></li>
						<li><a data-toggle="tab" href="#science">Science</a></li>
						<li><a data-toggle="tab" href="#photography">Photography</a></li>
						<li><a data-toggle="tab" href="#graphics-design">Graphics Design</a></li>
						<li><a data-toggle="tab" href="#business">Business</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row mt-60">
			<div class="col-lg-12">
				<div class="tab-content">-->
					<!--single-tab-->
					<!-- <div id="all-courses" class="tab-pane fade in show active">
						<div class="row course-carousel">
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/1.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/1.jpg')}}" alt="" />
												<a href="#">Mr. John Wick</a>
												<small>Materials</small>
											</div>
											<div class="course-price text-right">
												<h5>$180</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Chemical Engineering</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/2.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/2.jpg')}}" alt="" />
												<a href="#">Mr. Tom Redder</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>$210</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Financial Accounting</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/3.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Graphic Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/4.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">UX/UI Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/5.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Materials Technology</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/6.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Programming Techniques</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!--single-tab-->
					<!-- <div id="science" class="tab-pane fade">
						<div class="row course-carousel">
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/10.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/1.jpg')}}" alt="" />
												<a href="#">Mr. John Wick</a>
												<small>Materials</small>
											</div>
											<div class="course-price text-right">
												<h5>$180</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Chemical Engineering</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/9.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/2.jpg')}}" alt="" />
												<a href="#">Mr. Tom Redder</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>$210</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Financial Accounting</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/8.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Graphic Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/7.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">UX/UI Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/6.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Materials Technology</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/5.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Programming Techniques</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!--single-tab-->
					<!-- <div id="photography" class="tab-pane fade">
						<div class="row course-carousel">
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/4.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/1.jpg')}}" alt="" />
												<a href="#">Mr. John Wick</a>
												<small>Materials</small>
											</div>
											<div class="course-price text-right">
												<h5>$180</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Chemical Engineering</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/3.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/2.jpg')}}" alt="" />
												<a href="#">Mr. Tom Redder</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>$210</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Financial Accounting</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/2.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Graphic Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/1.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">UX/UI Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/5.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Materials Technology</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/6.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Programming Techniques</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!--single-tab-->
					<!-- <div id="graphics-design" class="tab-pane fade">
						<div class="row course-carousel">
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/1.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/1.jpg')}}" alt="" />
												<a href="#">Mr. John Wick</a>
												<small>Materials</small>
											</div>
											<div class="course-price text-right">
												<h5>$180</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Chemical Engineering</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/2.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/2.jpg')}}" alt="" />
												<a href="#">Mr. Tom Redder</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>$210</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Financial Accounting</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/3.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Graphic Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/4.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">UX/UI Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/5.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Materials Technology</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/7.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Programming Techniques</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!--single-tab-->
					<!-- <div id="business" class="tab-pane fade">
						<div class="row course-carousel">
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/10.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/1.jpg')}}" alt="" />
												<a href="#">Mr. John Wick</a>
												<small>Materials</small>
											</div>
											<div class="course-price text-right">
												<h5>$180</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Chemical Engineering</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/9.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/2.jpg')}}" alt="" />
												<a href="#">Mr. Tom Redder</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>$210</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Financial Accounting</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/8.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Graphic Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/7.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/2.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">UX/UI Designer</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/6.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/3.jpg')}}" alt="" />
												<a href="#">Ms. Lucius</a>
												<small>Financial</small>
											</div>
											<div class="course-price text-right">
												<h5>Free</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Materials Technology</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="course-single">
									<div class="course-thumb">
										<a href="course-details.html"><img src="{{asset('FrontDesign/images/courses/5.jpg')}}" alt="" /></a>
									</div>
									<div class="course-info">
										<div class="author-info">
											<div class="author-name">
												<img src="{{asset('FrontDesign/images/courses/authors/4.jpg')}}" alt="" />
												<a href="#">Ms. Lara Croft</a>
												<small>Chemistry</small>
											</div>
											<div class="course-price text-right">
												<h5>$420</h5>
											</div>
										</div>
										<div class="course-text mt-10">
											<h3><a href="course-details.html">Programming Techniques</a></h3>
											<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</p>
										</div>
									</div>
									<div class="course-meta">
										<a href="#"><i class="fa fa-calendar"></i>25 Oct, 2019</a>
										<a href="#"><i class="fa fa-user"></i>20/38 Student</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--courses-area end-->

<!--team-area start-->
<!-- <div class="team-area fix mt-60">
	<div class="section-title bg-1 style-2 overlay pt-80 pb-230">
		<div class="z-index text-white text-center">
			<h2>We're experts, so you don't have to be.</h2>
			<p>A crew of experienced educators helm our vast and growing library. Harness their expertise, and get the same <br/> award-winning learning materials that are used by teachers in millions of classrooms.</p>
		</div>
	</div>
	<div class="container mt-minus-150 z-index">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="row team-carousel">
					<div class="col-lg-4">
						<div class="team-single">
							<div class="team-thumb">
								<img src="{{asset('FrontDesign/images/team/1.jpg')}}" alt="" />
							</div>
							<div class="team-info">
								<h4>Mr. John Wick</h4>
								<small>Materials</small>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="team-single">
							<div class="team-thumb">
								<img src="{{asset('FrontDesign/images/team/2.jpg')}}" alt="" />
							</div>
							<div class="team-info">
								<h4>Mr. Tom Redder</h4>
								<small>Financial</small>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="team-single">
							<div class="team-thumb">
								<img src="{{asset('FrontDesign/images/team/3.jpg')}}" alt="" />
							</div>
							<div class="team-info">
								<h4>Ms. Lara Croft</h4>
								<small>Organic Chemistry</small>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="team-single">
							<div class="team-thumb">
								<img src="{{asset('FrontDesign/images/team/1.jpg')}}" alt="" />
							</div>
							<div class="team-info">
								<h4>Mr. John Wick</h4>
								<small>Materials</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--team-area end-->

<!--events-and-blog-area start-->
<!-- <div class="events-and-blog-area mt-58">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title text-center">
					<h2>Events & Blogs</h2>
				</div>
			</div>
		</div>
		<div class="row mt-60">
			<div class="col-lg-7">
				<div class="blog-single style-1">
					<div class="blog-thumb">
						<a href="blog-details.html"><img src="{{asset('FrontDesign/images/blog/1.jpg')}}" alt="" /></a>
					</div>
					<div class="blog-desc">
						<h3><a href="blog-details.html">How To Get Better At Learning</a></h3>
						<ul class="list-none">
							<li><a href="#">December 05, 2019</a></li>
							<li><span>|</span></li>
							<li>By <a href="#">Ms. Lucius</a></li>
						</ul>
						<p>Don't be distracted by criticism. Remember the only taste of success some people.</p>
						<a href="blog-details.html" class="readmore">View Details</a>
					</div>
				</div>
				<div class="blog-single style-1 mt-20">
					<div class="blog-thumb">
						<a href="blog-details.html"><img src="{{asset('FrontDesign/images/blog/2.jpg')}}" alt="" /></a>
					</div>
					<div class="blog-desc">
						<h3><a href="blog-details.html">The Future Of Web Design</a></h3>
						<ul class="list-none">
							<li><a href="#">December 05, 2019</a></li>
							<li><span>|</span></li>
							<li>By <a href="#">Ms. Lucius</a></li>
						</ul>
						<p>Don't be distracted by criticism. Remember the only taste of success some people.</p>
						<a href="blog-details.html" class="readmore">View Details</a>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="event-single mt-sm-30">
					<div class="event-inner z-index">
						<div class="event-date">
							<span>04</span>
							<small>DEC</small>
						</div>
						<div class="event-desc">
							<h3><a href="events-details.html">Hands On Traning Workshop</a></h3>
							<ul class="list-none">
								<li><i class="fa fa-map-marker"></i>Newyork, US</li>
								<li><i class="fa fa-clock-o"></i>10:00 pm – 06:00 am</li>
							</ul>
							<a href="events-details.html" class="readmore">View Details</a>
						</div>
					</div>
				</div>
				<div class="event-single mt-20">
					<div class="event-inner z-index">
						<div class="event-date">
							<span>22</span>
							<small>JUN</small>
						</div>
						<div class="event-desc">
							<h3><a href="events-details.html">Summer School 2019</a></h3>
							<ul class="list-none">
								<li><i class="fa fa-map-marker"></i>Newyork, US</li>
								<li><i class="fa fa-clock-o"></i>10:00 pm – 06:00 am</li>
							</ul>
							<a href="events-details.html" class="readmore">View Details</a>
						</div>
					</div>
				</div>
				<div class="event-single ds-md-none mt-20">
					<div class="event-inner z-index">
						<div class="event-date">
							<span>15</span>
							<small>AUG</small>
						</div>
						<div class="event-desc">
							<h3><a href="events-details.html">Colorful Day Event</a></h3>
							<ul class="list-none">
								<li><i class="fa fa-map-marker"></i>Newyork, US</li>
								<li><i class="fa fa-clock-o"></i>10:00 pm – 06:00 am</li>
							</ul>
							<a href="events-details.html" class="readmore">View Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--events-and-blog-area end-->

<!--subscribe-area start-->
<!-- <div class="subscribe-area overlay mt-80">
	<div class="container">
		<div class="row align-items-center height-415">
			<div class="col-lg-8 offset-lg-2">
				<div class="subscribe-form z-index">
					<h3>Subscribe To Our Newletter</h3>
					<p>Subscribe now and receive weekly newsletter with Coaching materials, new courses, interesting posts, popular books and much more!</p>
					<div class="row">
						<div class="col-lg-10 offset-lg-1">
							<input type="email" placeholder="Your Email" />
							<button class="btn-common">Subscribe</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--subscribe-area end-->

<!--testimonial-area start-->
<!-- <div class="testimonial-area pb-30 fix mt-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title text-center">
					<h2>What’s Student Say?</h2>
				</div>
			</div>
		</div>
		<div class="row testimonial-carousel mt-60">
			<div class="col-lg-6">
				<div class="testimonial-single">
					<p>In today's world, its important to harness technology to help us advance and connect.</p>
					<div class="testimonial-author">
						<div class="testimonial-author-thumb">
							<img src="{{asset('FrontDesign/images/testimonials/1.png')}}" alt="" />
						</div>
						<div class="testimonial-author-info">
							<h4>Russell Stephens</h4>
							<small>University of UK</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="testimonial-single">
					<p>In today's world, its important to harness technology to help us advance and connect.</p>
					<div class="testimonial-author">
						<div class="testimonial-author-thumb">
							<img src="{{asset('FrontDesign/images/testimonials/2.png')}}" alt="" />
						</div>
						<div class="testimonial-author-info">
							<h4>Ms. Lara Croft</h4>
							<small>University of US</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="testimonial-single">
					<p>In today's world, its important to harness technology to help us advance and connect.</p>
					<div class="testimonial-author">
						<div class="testimonial-author-thumb">
							<img src="{{asset('FrontDesign/images/testimonials/1.png')}}" alt="" />
						</div>
						<div class="testimonial-author-info">
							<h4>Russell Stephens</h4>
							<small>University of UK</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!--testimonial-area end-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){

$('.searchresult').keyup(function(){ 
    var query = $(this).val();
    var type = $(this).attr('searchdata');
    if(query != '')
    {
    	var _token = $('input[name="_token"]').val();
     	$.ajax({
      		url:"{{ route('search') }}",
      		method:"POST",
      		data:{query:query, _token:_token, type:type},
      		success:function(data){
       			$('#searchlist	').fadeIn();  
            	$('#searchlist	').html(data);
      		}
     	});
    }
});

$(document).on('click', 'li', function(){  
    $('#livesearchcollege').val($(this).text());  
    $('#searchlist	').fadeOut();  
}); 

$('.searchresult').keydown(function(){ 
    $('#searchlist	').fadeOut(); 
}); 

});
</script>

<style>
	.top-slider-text{		
		margin-left: 110px;
	    position: absolute;
	    margin-top: -35%;
	}
	.slider-text-style{
	    background: rgba(0,0,0,.5);
	    color: #fff;
	    border-radius: 6px;
	    padding: 20px;		
	}
	.search-edutab{
		width: 72%;
    	margin-left: 14%;
	}
</style>
@stop