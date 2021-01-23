<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta name="robots" content="noindex" />
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title> {{ $settings->title }} | @yield('title') </title>
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="">
	<link rel="apple-touch-icon" href="icon.png">
	<!-- Place favicon.ico in the root directory -->

	<!-- bootstrap v4.0.0 -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/bootstrap.min.css')}}">
	<!-- font-awesome css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/font-awesome.min.css')}}">
	<!-- themify-icons css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/themify-icons.css')}}">
	<!-- themify-icons css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/ionicons.min.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/animate.css')}}">
	<!-- cssanimation css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/cssanimation.min.css')}}">
	<!-- jquery-ui.min css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/jquery-ui.min.css')}}">
	<!-- venobox css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/venobox.css')}}">
	<!-- jquery.mmenu css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/jquery.mmenu.css')}}">
	<!-- slick css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/slick.css')}}">
	<!-- slick-theme css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/slick-theme.css')}}">
	<!-- helper css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/helper.css')}}">
	<!-- style css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/style.css')}}">
	<!-- responsive css -->
	<link rel="stylesheet" href="{{asset('FrontDesign/css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('css/star.css')}}">
	<link rel="stylesheet" href="{{asset('css/extra.css')}}">
</head>

<body>
		
	<!-- Seetalert-->
	@include('sweetalert::alert')
	<!--Sweetalert End-->

	<!--header-area start-->
		@include('pages.header')
	<!--header-area end-->
	
	<!--content start-->
		@yield('content')
	<!--content end-->
	
	<!--footer-area start-->
		@include('pages.footer')
	<!--footer-area end-->

	<!-- Login Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body login-popup">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="login-left overlay">
								<img src="{{url('/')}}/public/FrontDesign/images/register1.jpg" alt="" />
							</div>
						</div>
						<div class="col-lg-6">
							<div class="login-right pr-30">
								<div class="section-title">
									<h3>Sign In and Connect to <br/> Education</h3>
								</div>
								<div class="input-form register-form mt-10">
									<form method="POST" action="{{ route('login') }}">
										@csrf
										<div class="row">
											<div class="col-sm-12 mt-25">
												<label>Email*</label>
												<input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
												@error('email')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror
											</div>
											<div class="col-sm-12 mt-25">
												<label>Password*</label>
												<input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
												@error('password')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror
											</div>
											<div class="col-lg-6 mt-30">
												<input type="checkbox" id="agree" />
												<label for="agree">Remember</label>
											</div>
											<div class="col-lg-6 mt-30">
												<button class="btn-common">Login</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 

	<!-- Registration Modal -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body login-popup">					
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="login-left overlay">
								<img src="{{url('/')}}/public/FrontDesign/images/register.jpg" alt="" />
							</div>
						</div>
						<div class="col-lg-6">
							<div class="login-right pr-30">
								<div class="section-title">
									<h3>Sign Up and Connect to <br/> Education</h3>
								</div>
								<div class="input-form register-form mt-10">
									<form id="contactForm" data-toggle="validator" method="POST" action="{{ route('register') }}">
										@csrf
										<div class="row">
											<div class="col-sm-12 mt-25">
												<label>Username*</label>
												<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				                                @error('name')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror
											</div>
											<div class="col-sm-12 mt-25">
												<label>Email*</label>
												<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
												@error('email')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror
											</div>
											<div class="col-sm-12 mt-25">
												<label>Password*</label>
												<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
												@error('password')
				                                    <span class="invalid-feedback" role="alert">
				                                        <strong>{{ $message }}</strong>
				                                    </span>
				                                @enderror
											</div>
											<div class="col-sm-12 mt-25">
												<label>Confirm Password*</label>
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
											</div>
											<div class="col-lg-7 mt-30">
												<button class="btn-common">Login</button>
											</div>
											<div class="col-lg-5 mt-30">
												<button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close"> Cancel </button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	
	<!-- modernizr js -->
	<script src="{{asset('FrontDesign/js/vendor/modernizr-3.6.0.min.js')}}"></script>
	<!-- jquery-3.3.1 version -->
	<script src="{{asset('FrontDesign/js/vendor/jquery-3.3.1.min.js')}}"></script>
	<!-- jquery-migrate-3.0.0.min.js version -->
	<script src="{{asset('FrontDesign/js/vendor/jquery-migrate-3.0.0.min.js')}}"></script>
	<!-- bootstra.min js -->
	<script src="{{asset('FrontDesign/js/bootstrap.min.js')}}"></script>
	<!-- jquery-ui.min js -->
	<script src="{{asset('FrontDesign/js/jquery-ui.min.js')}}"></script>
	<!-- mmenu js -->
	<script src="{{asset('FrontDesign/js/jquery.mmenu.js')}}"></script>
	<!---venobox-js-->
	<script src="{{asset('FrontDesign/js/venobox.min.js')}}"></script>
	<!---slick-js-->
	<script src="{{asset('FrontDesign/js/slick.min.js')}}"></script>
	<!---counterup-js-->
	<script src="{{asset('FrontDesign/js/jquery.counterup.min.js')}}"></script>
	<!---waypoints-js-->
	<script src="{{asset('FrontDesign/js/waypoints.js')}}"></script>
	<!-- jquery.countdown js -->
	<script src="{{asset('FrontDesign/js/jquery.countdown.min.js')}}"></script>
	<!---isotop-js-->
	<script src="{{asset('FrontDesign/js/isotope.pkgd.min.js')}}"></script>
	<!---letteranimation-js-->
	<script src="{{asset('FrontDesign/js/letteranimation.min.js')}}"></script>
	<!-- plugins js -->
	<script src="{{asset('FrontDesign/js/plugins.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('FrontDesign/js/main.js')}}"></script>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<!--------------------------------------------------- Sign Up Modal Time Script Start ----------------------------------------------- -->
  	<script>
  		
  	</script>
  	<!--------------------------------------------------- Sign Up Modal Time Script End ----------------------------------------------- -->

  	<!--------------------------------------------------- Course & Colleges Autocomplete Name Filter Script Start ----------------------------------------------- -->
 	<script>
	$(document).ready(function() {
	 	$("#filter_course_name").autocomplete({
	        source: function(request, response) {
	        	var title  = request.term;	        	
	            $.ajax({
		            url: "{{route('autocomplete.course')}}",
		            data: {
		                term : request.term
		            },
		            dataType: "json",
		            success: function(data){
		              	response($.map(data, function (item) {
			                return {
			                    label: item.name,
			                    value: item.name,
			                    slug: item.id
			                }
			            }));
		            }
	        	});
	    	},
		    minLength: 1,
		    select: function (event, ui) {
	           	$(this).val(ui.item.label);
	           	$('#filter_course_name_id').val(ui.item.slug);
				course_filter(); 
	        }
		});

		$("#filter_college_name").autocomplete({
	        source: function(request, response) {
	        	var title  = request.term;	  	        	
	            $.ajax({
		            url: "{{route('autocomplete.college')}}",
		            data: {
		                term : request.term
		            },
		            dataType: "json",
		            success: function(data){
		              	response($.map(data, function (item) {
			                return {
			                    label: item.name,
			                    value: item.name,
			                    slug: item.id
			                }
			            }));
		            }
	        	});
	    	},
		    minLength: 1,
		    select: function (event, ui){
		    	$(this).val(ui.item.label);
	           	$('#filter_college_name_id').val(ui.item.slug);
	           	college_filter(); 
		    }
		});
	});
	</script>
	<!----------------------------------------------------- Course & Colleges Autocomplete Name Filter Script End ---------------------------------------------- -->

	<!-- ----------------------------------------------------- Courses Sidebar Filters Script Start --------------------------------------------------------------->
	<script>
		$(document).ready(function(){		
			$('.filter_course').on('change', function (e) {
				e.preventDefault(); 
	            course_filter(); 
	    	});

	    	$('#filter_course_name').keyup(function() {
			    var count_val = this.value.length;
			    if (count_val < 1) {
			    	$('#filter_course_name_id').removeAttr('value').trigger('change');
			    	course_filter();
			    }
			});
		});
	</script>
	<!-------------------------------------------------------- Courses Sidebar Filters Script End -------------------------------------------------------------- --> 

	<!-------------------------------------------------------- College Sidebar Filters Script Start --------------------------------------------------------- -->
	<script>
		$(document).ready(function(){
			$(window).load(function(){
				college_filter();
			});		

			$('.filter_colleges').on('change', function (e) {
				e.preventDefault(); 
				college_filter();
	    	});

	    	$('#filter_college_name').keyup(function() {
			    var count_val = this.value.length;
			    if (count_val < 1) {
			    	$('#filter_college_name_id').removeAttr('value').trigger('change');
			    	college_filter();
			    }
			});
		});
	</script>
	<!-------------------------------------------------------- College Sidebar Filters Script End --------------------------------------------------------- -->

	<!-------------------------------------------------------- College Filter Ajax Request Start -------------------------------------------------------------- --> 

	<script>
		var baseUrl = '{{ URL::to('/') }}';				
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    	function college_filter() {
    		$('.loader').css("display", "block");
			var form_data = $( "#collegefilterform :input" ).serialize();

			$.post(baseUrl+'/colleges', {form_data: form_data, _token: CSRF_TOKEN}, function(markup)
	        {
	        	var new_url = baseUrl+'/colleges?'+form_data;
	        	window.history.pushState({}, '', new_url);
	            $('.collegeView').html(markup);
	            $('.loader').css("display", "none");
	        }); 
    	}

    	function course_filter() {
    		$('.loader').css("display", "block");
	    	var course_form_data = $( "#coursefilterform :input" ).serialize();
			$.post(baseUrl+'/courses', {course_form_data: course_form_data, _token: CSRF_TOKEN}, function(markup)
	        {
	            $('.courseView').html(markup);
	            $('.loader').css("display", "none");
	        });
    	}
	</script>
	<!-------------------------------------------------------- College Filter Ajax Request End -------------------------------------------------------------- --> 
</body>
</html>
