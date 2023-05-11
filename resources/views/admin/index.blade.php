<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/4e76dcb553.js" crossorigin="anonymous"></script>
</head>
<body class="h-screen antialiased">
    @include('layouts.sidebar')
    <div class="flex justify-center items-center min-h-screen text-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 dark:text-white">
        <div>
            
        </div>
    </div>
</body>
</html>