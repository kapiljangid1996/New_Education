<div class="col-lg-12">
		<div class="row align-items-center mb-30">
			<div class="col-xl-6 col-sm-6"></div>
			<div class="col-xl-6 col-md-6">
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
				<div class="row" id="CourseSearch">
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
				<div class="row" id="CourseSearch">
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
<style>
    .show-read-more .more-text{
        display: none;
    }
</style>