<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/skel.min.js"></script>
    <script src="../../js/skel-layers.min.js"></script>
    <script src="../../js/init.js"></script>
    <script src="../../js/bootstrap.js"></script>

    <link rel="stylesheet" href="../../css/skel.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/style-xlarge.css" />
    <link rel="stylesheet" href="../../css/bootstrap.css"/>
</head>
<body id="top">

<!-- Header -->
<header id="header" class="skel-layers-fixed">
    <h1><a href="/">Find Papers</a></h1>
    <nav id="nav">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li>
                <div class="dropdown">
                    <div class="btn btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Dropdown
                        <span class="caret"></span>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="../../../search/author">Author</a></li>
                        <li><a href="../../../search/paper">Paper</a></li>
                        <li><a href="#">Conference</a></li>
                    </ul>
                </div>
            </li>
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

</body>
</html>