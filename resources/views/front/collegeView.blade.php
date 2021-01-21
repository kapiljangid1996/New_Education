@extends('layouts.front')

@section('title', 'Colleges')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<!--page-banner-area start-->
<div class="page-banner height-200 bg-1">
	<div class="d-table">
		<div class="page-title vertical-middle text-center">
			<h2>Colleges</h2>
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
						<li>Colleges</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumb-area end-->

<!--college-area start-->
<div class="course-area mt-70">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="site-sidebar">
					<h3>Filters: </h3>
					<form id="collegefilterform" method="post">
						<!--search-->
						<div class="sidebar-search">
							<input id="filter_college_name" class="filter_colleges search_college" type="text" placeholder="Search College Name" />
							<input id="filter_college_name_id"  name="college_name" value="<?php echo (isset($_GET['college_name']) && !empty($_GET['college_name'])) ? $_GET['college_name']  : '' ;?>" type="hidden">
							<button><i class="fa fa-search"></i></button>
						</div>
						<!--location-->
						<div class="sidebar-category mt-35">
							<h3 class="sidebar-title">Location</h3>
							<div class="sidebar-search">
								<input type="text" placeholder="Search Location" />
								<button><i class="fa fa-search"></i></button>
							</div>
							<br>
							<div style="overflow-y: scroll; height:300px;">

								@foreach($cities as $city_value)
									<input type="checkbox" class="filter_colleges" name="city[]" value="{{ $city_value->city_name ? $city_value->city_name->id : ''}}"><label class="labelOwnership">{{ $city_value->city_name ? $city_value->city_name->name : ''}} ({{ $city_value['total']}})</label><br>
								@endforeach
							</div>							
						</div>
						<!--category-->
						<div class="sidebar-category mt-25">
							<h3 class="sidebar-title">Ownership</h3>

							<input type="checkbox"  class="filter_colleges ownership" name="ownership[]" value="Private" <?php echo (isset($_GET['ownership']) && !empty($_GET['ownership']) && in_array('Private',$_GET['ownership'])) ? 'checked=checked' : '' ;?> ><label class="labelOwnership"> Private </label><br>

							<input type="checkbox"  class="filter_colleges ownership" name="ownership[]" value="Public / Government" <?php echo (isset($_GET['ownership']) && !empty($_GET['ownership']) && in_array('Public / Government',$_GET['ownership'])) ? 'checked=checked' : '' ;?>><label class="labelOwnership"> Public / Government </label><br>

							<input type="checkbox"  class="filter_colleges ownership" name="ownership[]" value="Public Private" <?php echo (isset($_GET['ownership']) && !empty($_GET['ownership']) && in_array('Public Private',$_GET['ownership'])) ? 'checked=checked' : '' ;?>><label class="labelOwnership"> Public Private </label>

						</div>
						<!--Ratings-->
						<div class="sidebar-category mt-25">
							<h3 class="sidebar-title">Ratings</h3>
							<div class="author-rating">
								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="5"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="4"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="3"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="2"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="1"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
							</div>
						</div>
						<input type="hidden" name="page" class="hidden_page" value="{!! $colleges->currentPage() !!}">
					</form>
				</div>
			</div>
			<div class="col-lg-9 mt-sm-50 collegeView">
				<div class="row align-items-center mb-30">
					<div class="col-xl-7 col-sm-6"></div>
					<div class="col-xl-5 col-md-6">
						<div class="site-pagination on-top pull-right">
							<ul>
								@if($colleges->previousPageUrl() != null)
									<li><a href="{{$colleges->previousPageUrl()}}"><i class="fa fa-long-arrow-left"></i></a></li>
								@endif
								<li><a href="#" class="active">{!! $colleges->currentPage() !!}</a></li>
								<li>of</li>
								<li><a href="#">{!! $colleges->lastPage() !!}</a></li>
								@if($colleges->nextPageUrl() != null)
									<li><a href="{{$colleges->nextPageUrl()}}"><i class="fa fa-long-arrow-right"></i></a></li>
								@endif
							</ul>
						</div>
						<div class="product-view-system pull-right" role="tablist">
							<ul class="nav nav-tabs">
								<li><a class="active" data-toggle="tab" href="#grid-colleges"><img src="{{asset('FrontDesign/images/icons/icon-grid.png')}}" alt="" /></a></li>
								<li><a data-toggle="tab" href="#list-colleges"><img src="{{asset('FrontDesign/images/icons/icon-list.png')}}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-content">
					<!--single-tab-->
					<div id="grid-colleges" class="tab-pane fade in show active">
						<div class="row">
							@foreach($colleges as $key => $college)
								<div class="col-lg-6 col-sm-6 mt-30">
									<div class="course-single">
										<div class="course-thumb">
											<a href="{{url('/college/'.$college->slug)}}"><img src="{{asset('Uploads/College/Image/400x200/').'/'.$college->image}}" style="height: 225px;"></a>
										</div>
										<div class="course-info">
											<div class="author-info">
												<div class="author-name">
													<img src="{{asset('Uploads/College/Logo/').'/'.$college->logo}}" alt="" />
													<a href="{{url('/college/'.$college->slug)}}">{{$college->name}}</a>
													<p style="margin-left: 70px;">{{$college->city_name->name}}, {{$college->state_name->name}}</p>
												</div>
											</div>
											<div class="course-text mt-10">
												<p class="show-read-more">{{ $college->short_description }}</p>
											</div>
										</div>
										<div class="course-meta">
											<a><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($college->created_st)->format('d F, Y')}}</a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					<!--single-tab-->
					<div id="list-colleges" class="tab-pane fade">
						<div class="row">
							@foreach($colleges as $key => $college)
								<div class="col-lg-12 mt-30">
									<div class="course-single list-view">
										<div class="course-thumb">
											<a href="{{url('/college/'.$college->slug)}}"><img src="{{asset('Uploads/College/Image/400x200/').'/'.$college->image}}" style="height: 200px;"></a>
										</div>
										<div class="course-info">
											<div class="course-text mt-10">
												<div class="table-view">
													<div class="table-cell pr-10">
														<h3><a href="{{url('/college/'.$college->slug)}}">{{$college->name}}</a></h3>
													</div>
												</div>
												<div class="course-meta">
													<p>{{$college->city_name->name}}, {{$college->state_name->name}}</p>
													<a><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($college->created_st)->format('d F, Y')}}</a>
												</div>
												<p class="show-read-more">{{ $college->short_description }}</p>
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
								@if($colleges->previousPageUrl() != null)
									<li><a href="{{$colleges->previousPageUrl()}}"><i class="fa fa-long-arrow-left"></i></a></li>
								@endif
								<li><a href="#" class="active">{!! $colleges->currentPage() !!}</a></li>
								<li>of</li>
								<li><a href="#">{!! $colleges->lastPage() !!}</a></li>
								@if($colleges->nextPageUrl() != null)
									<li><a href="{{$colleges->nextPageUrl()}}"><i class="fa fa-long-arrow-right"></i></a></li>
								@endif
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="product-results pull-right">
							<span>Showing {{ $colleges->firstItem() }}–{{ $colleges->lastItem() }} of {{ $colleges->total() }} results</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--college-area end-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    var maxLength = 120;
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
<!-------------------------------------------------------- College Sidebar Filters Script Start --------------------------------------------------------- -->
<script>
	$(document).ready(function(){
		var baseUrl = '{{ URL::to('/') }}';	
		var page = $('.hidden_page').attr('value');				
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$('.filter_colleges').on('change', function (e) {
			e.preventDefault(); 
            $('.loader').css("display", "block");
			var form_data = $( "#collegefilterform :input" ).serialize();

			$.post(baseUrl+'/colleges?page='+page, {form_data: form_data, _token: CSRF_TOKEN}, function(markup)
	        {
	        	var after_url = baseUrl+'/colleges?'+form_data;
	        	window.history.pushState({}, '', after_url);
	            $('.collegeView').html(markup);
	            $('.loader').css("display", "none");
	        }); 
    	});

    	$('#filter_college_name').keyup(function() {
		    var count_val = this.value.length;
		    if (count_val < 1) {
		    	$('#filter_college_name_id').removeAttr('value').trigger('change');
		    	$('.loader').css("display", "block");

		    	var form_data = $( "#collegefilterform :input" ).serialize();
				$.post(baseUrl+'/colleges?page='+page, {form_data: form_data, _token: CSRF_TOKEN}, function(markup)
		        {
		        	var new_url = baseUrl+'/colleges?page='+page;
	        		window.history.pushState({}, '', new_url);
		            $('.collegeView').html(markup);
		            $('.loader').css("display", "none");
		        });
		    }
		});
	});
</script>
<!-------------------------------------------------------- College Sidebar Filters Script End --------------------------------------------------------- -->

<script>
	$(document).ready(function(){
		$(window).on('load', function() {
			var baseUrl = '{{ URL::to('/') }}';
			var page = $('.hidden_page').attr('value');			
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			$('.loader').css("display", "block");
			var form_data = $( "#collegefilterform" ).serialize();
			$.post(baseUrl+'/colleges?page='+page, {form_data: form_data, _token: CSRF_TOKEN}, function(markup)
	        {
	        	var new_url = baseUrl+'/colleges?page='+form_data;
	        	window.history.pushState({}, '', new_url);
	            $('.collegeView').html(markup);
	            $('.loader').css("display", "none");
	        }); 
		});
	});
</script>
@stop