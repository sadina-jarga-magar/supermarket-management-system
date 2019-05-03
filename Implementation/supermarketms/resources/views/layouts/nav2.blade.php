<!-- Header -->
	<header class="header3">
		<!-- Header desktop -->
		<div class="container-menu-header-v3">
			<div class="wrap_header3 p-t-74">
				<!-- Logo -->
				<a href="index.html" class="logo3">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Header Icon -->
				<div class="header-icons3 p-t-38 p-b-60 p-l-8">
			
			<a href="/admineditprofile" class="header-wrapicon1 dis-block">
						<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>
			
					
				
			

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="/order" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View order
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="/registereduser" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View user
									</a>
						
		

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
							<i class="fa fa-list-alt"><a href="/addproducttype"> Product Type</a></i>
								
							</li>

							<li>
							<i class="fa fa-product-hunt"><a href="/insertp"> Product</a></i>
							</li>

							<li>
							<i class="fa fa-shopping-cart"><a href="/customerorders"> Order</a></i>
							</li>
							<li>
							<i class="fa fa-registered"><a href="/registereduser"> Registered User</a></i>
							</li>
							<li>
							<i class="fa fa-pencil-square-o"><a href="{!!url('/admineditprofile', Auth::user()->id)!!}"> Edit Profile</a></i>
							</li>
							<i class="fa fa-sign-out"><a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></i>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                        
						</ul>
					</nav>
				</div>
			</div>

			<div class="bottombar flex-col-c p-b-65">
				<div class="bottombar-social t-center p-b-8">
					<a href="https://www.facebook.com/" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.instagram.com/" class="topbar-social-item fa fa-instagram"></a>
					<a href="https://www.snapchat.com/" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="https://www.youtube.com/" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<div class="bottombar-child2 p-r-20">
					<div class="topbar-language rs1-select2">
						
					</div>
				</div>
			</div>
		</div>
		

		