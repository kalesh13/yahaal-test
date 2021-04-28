<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>    
    <meta name="description" content="@yield('description')">    
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="robots" content="@yield('robots', 'index, follow')"/>

    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="@yield('og_url')"/>
    <meta property="og:type" content="@yield('og_type','website')"/>
    <meta property="og:keywords" content="@yield('keywords')"/>
    <meta property="og:site_name" content="@yield('og_sitename')"/>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}" type="text/css" media="all"/>
    @yield('page_top_scripts')
</head>
<body>
<div id="app">
    @yield('page-content')
</div>
<script src="{{mix('/js/manifest.js')}}"></script>
<script src="{{mix('/js/vendor.js')}}"></script>
<script src="{{mix('/js/app.js')}}"></script>
@yield('page_bottom_scripts')
</body>
</html>