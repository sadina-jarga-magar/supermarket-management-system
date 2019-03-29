
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.facebook.com/" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com/" class="topbar-social-item fa fa-instagram"></a>
					<a href="https://www.snapchat.com/" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="https://www.youtube.com/" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Order by Phone: +9779803933811
				</span>
				<a class="topbar-social-item fa fa-dollar">Cash on delivery</a>
				<div class="topbar-child2">
					<span class="topbar-email">
						littlemart@gmail.com
					</span>

					<div class="topbar-language rs1-select2">
						
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="/">Home</a>
							</li>

							<li>
								<a href="/product">Shop</a>
							</li>

							<li>
								<a href="/cart">Features</a>
							</li>

							<li>
								<a href="/about">About Us</a>
							</li>

							<li>
								<a href="/contact">Contact Us</a>
							</li>
							<li>
								<a href="/help">Help?</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					@guest
					<li>
					<a href="{{ route('login') }}" class="header-wrapicon1 dis-block">
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>
					</li>
					@else
					<li>
						<a class="btn btn-sm btn-primary-outline display-4" href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="mbrib-logout mbr-iconfont mbr-iconfont-btn"></span>
                                        {{ __('Logout') }}
                                    </a>
                                     <a href="{{ url('editprofile')}}">Edit Profile </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form> 
                                    </li>
                                    @endguest

					

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							
							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="/cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		


