@extends('layouts.front')

@section('title', 'Contact Us')

@section('content')

<!--page-banner-area start-->
<div class="page-banner height-200 bg-1">
	<div class="d-table">
		<div class="page-title vertical-middle text-center">
			<h2>Contact Us</h2>
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
						<li><a href="{{url('/colleges')}}">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--breadcrumb-area end-->

<!--contact-us-area start-->
<div class="container">
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 text-center">
			<div class="contact-form input-form mt-sm-50">
				<form id="contactForm" method="POST" action="{{route('contact.submit')}}">
					@csrf
					<h3>Contact Us Form</h3><hr>
					<div class="row">
						<div class="col-sm-12">
							<input type="text" name="name" placeholder="Name" required />
						</div>
						<div class="col-sm-12 mt-30">
							<input type="text" name="email" placeholder="Email" required />
						</div>
						<div class="col-sm-12 mt-30">
							<input type="text" name="subject" placeholder="Subject" required />
						</div>
						<div class="col-sm-12 mt-30">
							<textarea name="message" placeholder="Message" required></textarea>
						</div>
						<div class="col-sm-12 mt-40">
							<button class="btn-common d-inline-block">Send message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>
<!--contact-us-area End-->
@stop