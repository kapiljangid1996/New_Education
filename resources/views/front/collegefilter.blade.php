<div class="col-lg-12">
	<div class="row align-items-center mb-30">
		<div class="col-xl-6 col-sm-6"></div>
		<div class="col-xl-6 col-md-6">
			<div class="site-pagination on-top pull-right">
				<span>Showing {{ $colleges->total() }} Colleges</span>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<!--single-tab-->
		<div id="list-colleges" class=" infinite-scroll2">
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
				<span>Showing {{ $colleges->total() }} Colleges</span>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset('js/scroll.js')}}"></script>
<script type="text/javascript">
      $(document).ready(function () {
		    $('ul.pagination').hide();
		    $('.infinite-scroll2').jscroll({
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
		    //setTimeout(function(){ filter(); }, 500);
		    //alert('jh');
      });

</script>