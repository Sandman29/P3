<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','Developer\'s Best Friend')</title>
	<meta charset='utf-8'>

	<!-- <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
		<link rel='stylesheet' href='/css/foobooks.css' type='text/css'>
	-->

	@yield('head')

	
</head>
<body>
	
	@yield('content')

	@yield('body')
	
</body>
</html>
