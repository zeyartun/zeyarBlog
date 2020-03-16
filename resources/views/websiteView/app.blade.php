<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	 <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cuStyle.css') }}" rel="stylesheet">
</head>
<body>
@yield('content')
</body>
</html>