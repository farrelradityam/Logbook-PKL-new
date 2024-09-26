<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-2.1.6/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
  $('#school-table').DataTable();

  $('#major-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('data') }}",
    
    columns: [
      {data: 'id', name: 'id'},
      {data: 'code', name: 'code'},
      {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  }); 
});
</script>
<script>
function confirmDelete(event) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
</script>
</body>
</html>