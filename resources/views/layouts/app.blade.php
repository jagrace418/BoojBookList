<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="https://kit.fontawesome.com/10f5e1780c.js" crossorigin="anonymous"></script>
	<title>Reading List</title>
</head>
<body>
<header class="header p-10">
	<div class="flex flex-col">
		<div class="text-center text-4xl">
			Reading List
		</div>
	</div>
</header>
<main class="page min-h-screen">
	<div class="ml-4 mt-6">
		@yield('content')
	</div>
</main>
</body>
</html>
