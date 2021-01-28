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
					<form id="collegefilterform" method="get" action="#">
						<!--search-->
						<div class="sidebar-search">
							<input id="filter_college_name" class="filter_colleges search_college" type="text" placeholder="Search College Name" name="college_name_text" value="<?php echo (isset($_GET['college_name_text']) && !empty($_GET['college_name_text'])) ? $_GET['college_name_text']  : '' ;?>"/>

							<input id="filter_college_name_id"  name="college_name" value="<?php echo (isset($_GET['college_name']) && !empty($_GET['college_name'])) ? $_GET['college_name']  : '' ;?>" type="hidden">
							
							<button><i class="fa fa-search"></i></button>
						</div>
						<!--location-->
						<div class="sidebar-category mt-35">
							<h3 class="sidebar-title">Location</h3>
							<div class="sidebar-search">
								<input type="text" placeholder="Search Location" id="searchText" />
								<button><i class="fa fa-search"></i></button>
							</div>
							<br>
							<div style="overflow-y: scroll; height:250px;">
								<ul style="list-style-type:none; padding-left: 0px; margin-top: 0px;" id="ulVal">
									@foreach($cities as $city_value)
										<li>
											<input type="checkbox" class="filter_colleges" name="city[]" value="{{ $city_value->city_name ? $city_value->city_name->id : ''}}" <?php echo (isset($_GET['city']) && !empty($_GET['city']) && in_array($city_value->city_name->id,$_GET['city'])) ? 'checked=checked' : '' ;?> city_name="{{ $city_value->city_name ? $city_value->city_name->name : ''}}"> 
											<label class="labelOwnership">{{ $city_value->city_name ? $city_value->city_name->name : ''}} ({{ $city_value['total']}})</label>
										</li>
									@endforeach
								</ul>
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
						<!-- <div class="sidebar-category mt-25">
							<h3 class="sidebar-title">Ratings</h3>
							<div class="author-rating">
								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="5"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="4"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="3"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="2"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><br>

								<input type="checkbox" class="filter_colleges rating" name="rating[]" value="1"><i class="fa fa-star labelOwnership"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
							</div>
						</div> -->
					</form>
				</div>
			</div>
			<div class="col-lg-9 mt-sm-50" id="collegeView">
				<div class="row align-items-center mb-30">
					<div class="col-xl-7 col-sm-6"></div>
					<div class="col-xl-5 col-md-6">
						<div class="site-pagination on-top pull-right">
							<span>Showing {{ $colleges->total() }} Colleges</span>
						</div>
					</div>
				</div>
				<div class="tab-content">
					<!--single-tab-->
					<div id="list-colleges" class="infinite-scroll">
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
												<p>{!!  substr(strip_tags($college->short_description), 0, 150) !!}</p>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							{!! $colleges->links("pagination::bootstrap-4") !!}
						</div>
					</div>
				</div>
				<div class="row align-items-center mt-30">
					<div class="col-lg-6">
					</div>
					<div class="col-lg-6">
						<div class="product-results pull-right">
							<span>Showing {{ $colleges->total() }} results</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--college-area end-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset('js/scroll.js')}}"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        debug: true,
        loadingHtml: '<img class="center-block" src="http://localhost/New_Education/public/FrontDesign/images/1.gif" width="100px" alt="Loading..." />',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
        callback: function() {
            $('ul.pagination').remove();            
        }
    });
</script>

<script>
$("document").ready(function () {
    $("#searchText").on("keyup", function (e) {
        var input  = $(this).val();        
        $("#ulVal input[type=checkbox]").each(function (index, element) {
            var regex = new RegExp($.trim(input), "gi");
            if($(element).attr('city_name').match(regex) !== null) {
                $(element).parent().show();
            } else {
                $(element).parent().hide();
            }
        });
    });
});
</script>
@stop