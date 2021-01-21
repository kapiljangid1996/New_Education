<div class="col-lg-12">
	<div class="row align-items-center mb-30">
		<div class="col-xl-6 col-sm-6"></div>
		<div class="col-xl-6 col-md-6">
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
								<a href="{{url('/college/'.$college->slug)}}"><img src="{{asset('Uploads/College/Image/').'/'.$college->image}}" style="height: 225px;"></a>
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
								<a href="{{url('/college/'.$college->slug)}}"><img src="{{asset('Uploads/College/Image/').'/'.$college->image}}" style="height: 200px;"></a>
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