<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <link href="{{ asset('imgs/icones/att.logo.ico') }}" rel="shortcut icon" />
   
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<!-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"> -->
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
<!-- </div> -->
