<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 via-violet-200 to-white-100 min-h-screen flex flex-col justify-center items-center text-center">

    <div class="w-full px-6">
        <h1 class="text-5xl font-bold text-slate-600 mb-4 mt-12">
            Welcome to Logbook-PKL
        </h1>

        <p class="text-xl text-gray-600 mb-1">
            Logbook-PKL adalah platform digital yang memudahkan mahasiswa dalam
        </p>
        <p class="text-xl text-gray-600 mb-20">
            mencatat dan mengelola kegiatan Praktik Kerja Lapangan (PKL) mereka.
        </p>

        <div class="flex justify-center space-x-8 mb-4">
            <a href="{{ route('login') }}" class="px-8 py-4 bg-blue-500 text-slate-700 font-bold text-lg text-center w-96 rounded-md  hover:bg-blue-400">
            <i class="bi bi-box-arrow-in-right mr-3"></i>LOGIN
            </a>
        </div>
        <div class="flex justify-center space-x-8 mb-16">
            <a href="{{ route('register') }}" class="px-8 py-4 bg-green-500 text-slate-700 font-bold text-lg text-center w-96 rounded-md  hover:bg-green-400">
            <i class="bi bi-person-plus mr-3"></i>REGISTER
            </a>
        </div>

        <div class="text-center text-gray-500 text-sm mb-3">
            <p class="mt-2">Already have an account? <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">Login here</a></p>
            <p>&copy; 2024 Our Platform. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
