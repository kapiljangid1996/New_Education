<footer class="footer-area mt-60">
	<!--footer-top-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="company-info">
						<img src="{{asset('Uploads/Site/150x100').'/'.$settings->logo}}" alt="logo" />
						<ul class="list-none">
							<li>
								<span>Email:</span>
								<a> {{ $settings->email1 }} </a>
								<a> {{ $settings->email2 ? ','.$settings->email2 : ''}} </a>
							</li>
							<li>
								<span>Call directly:</span>
								<a> {{ $settings->contact1 }} </a>
								<a> {{ $settings->contact2 ? ','.$settings->contact2 : ''}} </a>
							</li>
							<li>
								<span>Address:</span>
								<a> {{ $settings->address1 }} </a> 
								<a> {{ $settings->address2 ? ','.$settings->address2 : ''}} </a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget">
						<h3>Our Links</h3>
						<div class="row">
							<div class="col-lg-6 col-sm-6">
								<div class="footer-menu">
									<ul class="list-none">
										<li><a href="#">Teachers</a></li>
										<li><a href="#">Courses</a></li>
										<li><a href="#">Support</a></li>
										<li><a href="#">Why Edugate</a></li>
										<li><a href="#">Social Media</a></li>
										<li><a href="#">Site Map</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="footer-menu">
									<ul class="list-none">
										<li><a href="#">Company</a></li>
										<li><a href="#">Latest Courses</a></li>
										<li><a href="#">Partners</a></li>
										<li><a href="#">Blog Post</a></li>
										<li><a href="#">Help Topic</a></li>
										<li><a href="#">Policies</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget mt-30">
						<h3>Recent Posts</h3>
						<div class="recent-posts mt-05">
							<ul class="list-none">
								<li>
									<h4><a href="#">How to get better at learning</a></h4>
									<ul class="list-none">
										<li><a href="#">December 05, 2019</a></li>
										<li><span>|</span></li>
										<li>By <a href="#">Ms. Lucius</a></li>
									</ul>
								</li>
								<li>
									<h4><a href="#">The future of web design</a></h4>
									<ul class="list-none">
										<li><a href="#">December 05, 2019</a></li>
										<li><span>|</span></li>
										<li>By <a href="#">Ms. Lucius</a></li>
									</ul>
								</li>
								<li>
									<h4><a href="#">How to get better at website</a></h4>
									<ul class="list-none">
										<li><a href="#">December 05, 2019</a></li>
										<li><span>|</span></li>
										<li>By <a href="#">Ms. Lucius</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget mt-30">
						<h3>Our Gallery</h3>
						<div class="footer-gallery mt-20">
							<form method="post" action="{{route('newsletter.store')}}">
						        @csrf
							 	<div class="row">
						 			<div class="form-group col-md-2">
						   				<label for="Email">Email:</label>
						   				<input type="text" class="form-control" name="email" style="width: 300px;">
						 			</div>
							 	</div>   
							 	<div class="row">
							 		<div class="form-group col-md-4">
							 			<button type="submit" class="btn btn-success">Submit</button>
							 		</div>
							 	</div>
						    </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-bottom-->
	<div class="footer-bottom">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="copyright-text">
						<p> {{ $settings->footer }} </p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 d-xs-none">
					<ul class="list-none">
						<li><a href="#">Policy</a></li>
						<li><a href="#">Term & Conditions</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">FAQs</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>