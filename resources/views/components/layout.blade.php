<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="h-full">
    
<div class="min-h-full">
<x-navbar></x-navbar>

  <x-header>{{$title}}</x-header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{ $slot }}
    </div>
  </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.js"></script>
<script src="{{ asset('main.js') }}"></script>
</body>
</html>