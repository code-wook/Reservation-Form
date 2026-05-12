<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>@yield('title', 'UP Cebu Reservation Form')</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="bg-gray-100 min-h-screen px-3 sm:px-6 py-4">

<div class="max-w-4xl mx-auto bg-white p-4 sm:p-6 md:p-8 rounded-lg shadow">

<div class="m-2">
@yield('content')

</div>
</div>

<div id="toastContainer" class="toast-container"></div>

@stack('scripts')

</body>
</html>