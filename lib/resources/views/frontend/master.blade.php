<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/layout/frontend')}}/">;
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Thế giới điện thoại @yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}"><img src="img/home/Untitled-5.png"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-5 col-sm-12 col-xs-12">
					<form role="search" method="get" action="{{asset('search/')}}">
					<input type="text" name="result" placeholder="Nhập từ khóa ...">
					<input type="submit" name="submit" value="Tìm Kiếm">
				</div>
				<div id="cart" class="col-md-2 col-sm-10 col-xs-10">
					<a class="display" href="{{asset('cart/show')}}">Giỏ hàng</a>
				<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>				    
				</div>
			
				<!-- <div id="login" class="col-md-2 col-sm-10 col-xs-10">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="img/home/Untitled-6.png">
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Đăng Ký</a>
							<a class="dropdown-item" href="#">Đăng Nhập</a>
						</div>
					</li>
				</div>		 -->
			</div>
		</header><!-- /header -->
		<!-- endheader -->

		<!-- main -->
		<section id="body">
			<div class="container">
				<div class="row">
					<div id="sidebar" class="col-md-3">
						<nav id="menu">
							<ul>
								<li class="menu-item">danh mục sản phẩm</li>
								@foreach($categories as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
								@endforeach					
							</ul>
							<!-- <a href="#" id="pull">Danh mục</a> -->
						</nav>

						<div id="banner-l" class="text-center">
							<div class="banner-l-item">
								<a href=""><img src="img/home/artboard_1_copy_6_2x_36fd9061366849e1a272c6c5f6c92f46_grande.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-l-item">
								<a href=""><img src="img/home/istockphoto-815368264-1024x1024.jpg" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-l-item">
								<a href=""><img src="img/home/samsung-mã-giảm-giá-lazada.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-l-item">
								<a href=""><img src="img/home/2501_TetronrangSamhangnhuy-postquangcao.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-l-item">
								<a href=""><img src="img/home/GIAM-GIA-DONG-HO-3.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-l-item">
								<a href=""><img src="img/home/photo-1-1547460160838884501380.jpg" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-l-item">
								<a href=""><img src="img/home/galaxy-s9-plus-lunar-new-year-ad-leak_840x1200-800-resize.jpg" alt="" class="img-thumbnail"></a>
							</div>
						</div>
					</div>

					<div id="main" class="col-md-9">
						<!-- main -->
						<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
						<div id="slider">
							<div id="demo" class="carousel slide" data-ride="carousel">

								<!-- Indicators -->
								<ul class="carousel-indicators">
									<li data-target="#demo" data-slide-to="0" class="active"></li>
									<li data-target="#demo" data-slide-to="1"></li>
									<li data-target="#demo" data-slide-to="2"></li>
									<li data-target="#demo" data-slide-to="3"></li>
									<li data-target="#demo" data-slide-to="4"></li>
								</ul>

								<!-- The slideshow -->
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="img/home/slide-1.png" alt="Los Angeles" >
									</div>
									<div class="carousel-item">
										<img src="img/home/slide-2.png" alt="Chicago">
									</div>
									{{-- <div class="carousel-item">
										<img src="img/home/slide-3.png" alt="New York" >
									</div> --}}
									{{-- @foreach($status as $item)
									<div class="carousel-item active">
										<img src="{{asset('lib/storage/app/avatar/' . $item->img)}}" alt="Los Angeles" >
									</div>
									@endforeach --}}
								</div>

								<!-- Left and right controls -->
								<a class="carousel-control-prev" href="#demo" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a class="carousel-control-next" href="#demo" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								</a>
							</div>
						</div>

						<div id="banner-t" class="text-center">
							<div class="row">
								<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
									<a href="#"><img src="img/home/benner.png" alt="" class="img-thumbnail"></a>
								</div>
								<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
									<a href="#"><img src="img/home/benner1.png" alt="" class="img-thumbnail"></a>
								</div>
							</div>					
						</div>
                     @yield('main')
                    </div>
                </div>
            </section>
            <!-- endmain -->
    
            <!-- footer -->
            <footer id="footer">			
                <div id="footer-t">
                    <div class="container">
                        <div class="row">				
                            <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
                                <a href="#"><img src="img/home/Untitled-5.png"></a>		
                            </div>
                            <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                                <h3>About us</h3>
                                <p class="text-justify">Lê Đức Hoành thành lập năm 2009. Chúng tôi đào tạo chuyên sâu trong 2 lĩnh vực là Lập trình Website & Mobile nhằm cung cấp cho thị trường CNTT Việt Nam những lập trình viên thực sự chất lượng, có khả năng làm việc độc lập, cũng như Team Work ở mọi môi trường đòi hỏi sự chuyên nghiệp cao.</p>
                            </div>
                            <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                                <h3>Hotline</h3>
                                <p>Phone Sale: (+84) 0988 550 553</p>
                                <p>Email: sirtuanhoang@gmail.com</p>
                            </div>
                            <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                                <h3>Contact Us</h3>
                                <p>Address 1: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
                                <p>Address 2: Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà Nội</p>
                            </div>
                        </div>				
                    </div>
                    <div id="footer-b">				
                        <div class="container">
                            <div class="row">
                                <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <p>Học viện Công nghệ Lê Đức Hoành - www.vietpro.edu.vn</p>
                                </div>
                                <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                                    <p>© 2017 Academy. All Rights Reserved</p>
                                </div>
                            </div>
                        </div>
                        <div id="scroll">
                            <a href="#"><img src="img/home/scroll.png"></a>
                        </div>	
                    </div>
                </div>
            </footer>
            <!-- endfooter -->
        </body>
        </html>