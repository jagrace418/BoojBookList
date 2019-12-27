<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/10f5e1780c.js" crossorigin="anonymous"></script>
	<title>Booj Reading List</title>
</head>
<body>
<header class="bg-red-500 p-10">
	<div class="flex flex-col">
		<div class="text-center text-4xl">
			Booj Reading List
		</div>
	</div>
</header>
<main class="ml-4">
	@yield('content')
</main>
</body>
</html>
