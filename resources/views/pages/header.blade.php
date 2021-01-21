<header id="sticker" class="header-area">
	<div class="container-fluid">
		<div class="row height-100 align-items-center">
			<div class="col-xl-2 col-lg-2 col-sm-4 col-4">
				<div class="logo">
					<a href="{{url('/')}}"><img src="{{asset('Uploads/Site/').'/'.$settings->logo}}" /></a>
				</div>
			</div>
			<div class="col-xl-7 col-lg-9 col-sm-3 col-3">
				<div class="mainmenu">
					<nav>                                
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a>MBA</a>
								<ul class="submenu">
									<li><a href="{{url('/colleges')}}">Colleges</a>
										<ul class="submenu sub-2">
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="{{url('/courses')}}">Courses</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
				<div class="d-hidden mobile-menu">
					<nav id="mobile-menu">                                
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a>MBA</a>
								<ul class="submenu">
									<li><a href="{{url('/colleges')}}">Colleges</a>
										<ul class="submenu sub-2">
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="{{url('/courses')}}">Courses</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-xl-3 col-lg-1 col-sm-5 col-5">
				<div class="header-right header_right">
					<a href="#" class="btn-common ds-md-none mr-90">Get Started</a>
					<div class="register-login register_login">
						<div class="mainmenu mainmenu_class">
							<nav>
								<ul>
									@guest
									@if (Route::has('register'))
										<li><a href="" data-toggle="modal" data-target="#register">Sign up</a></li>
									@endif
										<li><a href="" data-toggle="modal" data-target="#login">Sign in</a></li>
									@else										
										<li><a>{{ Auth::user()->name }}</a>
											<ul class="submenu">
												<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
													<ul class="submenu sub-2">	</ul>
												</li>
											</ul>
										</li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	                                        @csrf
	                                    </form>
									@endguest
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="loader" style="display: none;">
	<img src="{{asset('FrontDesign/images/1.gif')}}" width='100px' id='loader' alt='Loading...' />
</div>

<style>
	.header_right{
		margin-top: 20px;
	}
	.register_login{
		float: right; 
		margin-top: -52px;
	}
	.mainmenu_class{		
		padding-right: 35px;
	}
	.mr-90{
		margin-left: -36px;
	}
</style>