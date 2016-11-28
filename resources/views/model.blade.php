<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="../../js/html5shiv.js"></script><![endif]-->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/skel.min.js"></script>
    <script src="../../js/skel-layers.min.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <noscript>
        <link rel="stylesheet" href="../../css/skel.css" />
        <link rel="stylesheet" href="../../css/style.css" />
        <link rel="stylesheet" href="../../css/style-xlarge.css" />
        <link rel="stylesheet" href="../../css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/style.css"/>
        <link rel="stylesheet" href="../../css/style-xlarge.css"/>
    </noscript>
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <h1><a href="/">Find Papers</a></h1>
    <nav id="nav">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="search">Search</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

@section('banner')
@show

<!-- One -->
<section id="one" class="wrapper style1">
    @section('content')
    @show
</section>

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row double">
            <div class="6u">
                <div class="row collapse-at-2">
                    <div class="6u">
                        <h3>Accumsan</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                    <div class="6u">
                        <h3>Faucibus</h3>
                        <ul class="alt">
                            <li><a href="#">Nascetur nunc varius</a></li>
                            <li><a href="#">Vis faucibus sed tempor</a></li>
                            <li><a href="#">Massa amet lobortis vel</a></li>
                            <li><a href="#">Nascetur nunc varius</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="6u">
                <h2>Aliquam Interdum</h2>
                <p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
                </ul>
            </div>
        </div>
        <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li>
        </ul>
    </div>
</footer>

</body>
</html>