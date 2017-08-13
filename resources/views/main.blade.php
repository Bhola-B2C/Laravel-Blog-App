<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')
	</head>
	<body>
		{{--@include('partials._topbar')--}}
		@include('partials._navbar')
		@yield('jumbo')
		<div class="container main">
			@include('partials._messages')
			@yield('content')
		</div>
		@include('partials._footer')
		@include('partials._javascript')
	</body>
</html>