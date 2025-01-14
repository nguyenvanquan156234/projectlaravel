<!DOCTYPE html>
<html>

<head>
    <base href="{{ asset('frontend') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> Shop - Home @yield('title')</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script type="text/javascript">
        $(function() {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function() {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
    <style>
        .chitiet {
            font-weight: bold;
            color: #e99607
        }

        .login {
            margin-top: 10px;

        }

        .dn {}

        .dk {
            margin-left: 10px;
        }

        .login {
            display: flex;
            align-items: center;
        }

        .login a {
            text-decoration: none;
            padding: 10px 15px;
            margin-right: 10px;
            border: 1px solid #e99607;
            border-radius: 5px;
            color: #fafbfc;
            transition: background-color 0.3s, color 0.3s;
        }

        .login a:hover {
            background-color: #ff0000;
            color: white;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            /* Nếu muốn thêm khoảng cách giữa thanh phân trang và nội dung khác */
        }
    </style>
</head>

<body>
    <!-- header -->
    <header id="header">
        <div class="container">
            <div class="row">
                <div id="logo" class="col-md-2 col-sm-12 col-xs-12 mt-2">
                    <h1>
                        <a href="{{ asset('/') }}" class=""><img src="img/home/logo.jpg"></a>
                        <nav><a id="pull" class="btn btn-danger" href="#">
                                <i class="fa fa-bars"></i>
                            </a></nav>
                    </h1>
                </div>
                <div id="search" class="col-md-6 col-sm-12 col-xs-12">
                    <form action="{{asset('search/')}}" method="get">
                            <input type="text" name="result" placeholder="Nhập từ khóa ...">
                            <input type="submit" name="submit" value="Tìm Kiếm">
                    </form>
                </div>
                <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                    <a class="display" href="#">Giỏ hàng</a>
                    <a href="#">6</a>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12 login">
                    @auth
                        <!-- Hiển thị tên người dùng và nút logout khi đã đăng nhập -->
                        <a class="dn badge text-bg-warning text-danger">Hi: {{ auth()->user()->name }}</a>
                        <a href="{{ route('logout') }}">Đăng xuất</a>
                    @else
                        <!-- Hiển thị nút đăng nhập và đăng ký khi chưa đăng nhập -->
                        <a class="dn" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="dk" href="{{ route('signUp') }}">Đăng ký</a>
                        <a class="dn" href="{{ route('login.get') }}">Admin</a>
                    @endauth
                </div>
                

            </div>
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
                            @foreach ($categories as $cate)
                                <li class="menu-item"><a
                                        href="{{ asset('category/' . $cate->id . '/' . $cate->cate_slug . '.html') }}"
                                        title="">{{ $cate->cate_name }}</a></li>
                            @endforeach
                        </ul>
                        <!-- <a href="#" id="pull">Danh mục</a> -->
                    </nav>

                    <div id="banner-l" class="text-center">
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-1.png" alt=""
                                    class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-2.png" alt=""
                                    class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-3.png" alt=""
                                    class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-4.png" alt=""
                                    class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-5.png" alt=""
                                    class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-6.png" alt=""
                                    class="img-thumbnail"></a>
                        </div>
                        <div class="banner-l-item">
                            <a href="#"><img src="img/home/banner-l-7.png" alt=""
                                    class="img-thumbnail"></a>
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
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/home/slide-1.png" alt="Los Angeles">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/home/slide-2.png" alt="Chicago">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/home/slide-3.png" alt="New York">
                                </div>
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
                                <a href="#"><img src="img/home/banner-t-1.png" alt=""
                                        class="img-thumbnail"></a>
                            </div>
                            <div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
                                <a href="#"><img src="img/home/banner-t-1.png" alt=""
                                        class="img-thumbnail"></a>
                            </div>
                        </div>
                    </div>
                    @yield('main')
                </div>
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
                        <a href="#"><img src="img/home/logo.jpg"></a>
                    </div>
                    <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>About us</h3>
                        <p class="text-justify">Trải qua 22 năm đào tạo, đã có hơn 20 khóa sinh viên tốt nghiệp ra trường. Hiện nay, trường Cao đẳng Công nghệ Thông tin TP.HCM (Trường Cao đẳng Công nghệ TP.HCM-ITC) đang đào tạo 18 ngành, nghề cao đẳng và 7 ngành, nghề trung cấp bao gồm nhiều lĩnh vực như: Công nghệ Thông tin; Thiết kế đồ họa; Kế toán, Tài chính - Ngân hàng, Logistics,… Hàng năm, số lượng cử nhân, kỹ sư tốt nghiệp ra trường có việc làm đạt tỷ lệ lên đến 95%.</p>
                    </div>
                    <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Hotline</h3>
                        <p>Phone Sale: <br> (028) 397 349 83 - (028) 386 050 03</p>
                        <p>Email: <br> info@itc.edu.vn <br>
                            tuyensinh@itc.edu.vn</p>
                    </div>
                    <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                        <h3>Contact Us</h3>
                        <p>Address: <br>  12 Trịnh Đình Thảo, Phường Hòa Thạnh,
                            Quận Tân Phú, Thành phố Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
            <div id="footer-b">
                <div class="container">
                    <div class="row">
                        <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>TRƯỜNG CAO ĐẲNG CÔNG NGHỆ THÔNG TIN TP. HỒ CHÍ MINH - WWW.ITC.EDU.VN</p>
                        </div>
                        <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>Copyright © 2022 ITC Website designed by Cánh Cam.</p>
                        </div>
                    </div>
                </div>
                <div id="scroll">
                    <a href="{{ asset('/') }}"><img src="img/home/scroll.png"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- endfooter -->
</body>

</html>
