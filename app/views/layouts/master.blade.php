<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="FYIBN">
<meta name="author" content="cw">
<link rel="shortcut icon" href="/assets/ico/favicon.ico">

<link type="text/css" href="http://fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet" media="all" />
<title>FYIBN</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


<!-- Custom styles for this template -->
<link href="/assets/stylesheets/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div class="site-wrapper" style="clear:both">
    <div class="site-wrapper-inner">
        <div class="cover-container">

            @if (Auth::check())
                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand">{{ link_to_route('posts', 'FYIBN') }}</h3>
                        <ul class="nav masthead-nav">
                            {{ HTML::nav_item('/', 'Home' ) }}
                            {{ HTML::nav_item('post', 'Post' ) }}
                            {{-- HTML::nav_item('inbox', 'Inbox') --}}
                            {{-- HTML::nav_item("users", 'Users' ) --}}
                        </ul>
                    </div>
                </div>
            @endif

            <div class="inner cover">
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {{{ Session::get('error') }}}
                    </div>
                @endif


                @yield('content')
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>a website for us, not you.</p>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="/assets/componets/mousetrap/mousetrap.min.js"></script>
<script src="/assets/javascripts/fyjsn.js"></script>
</body>
</html>
