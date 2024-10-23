<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UNIFIED</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f0f4f8;
            color: #333;
        }
        .bg-blue {
            background-color: #007bff;
        }
        .text-blue {
            color: #007bff;
        }
        .bg-light-blue {
            background-color: #e9f5ff;
        }
        .text-light-blue {
            color: #004085;
        }
        .shadow-custom {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .hover-bg-blue:hover {
            background-color: #0056b3;
        }

        /* Custom styles for welcome text */
        .welcome-text {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            opacity: 0;
            transform: translateY(20px); /* Start slightly below */
            animation: fadeInUp 1.5s ease-out forwards; /* Fade and slide up */
        }

        /* Keyframes for the fade-in animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px); /* Start from below */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* End at original position */
            }
        }

        /* Custom styles for logo */
        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
            animation: bounce 2s infinite; /* Bounce animation */
        }

        /* Keyframes for the bounce animation */
        @keyframes bounce {
            0%, 100% {
                transform: scale(1); /* Normal size */
            }
            50% {
                transform: scale(1.1); /* Slightly larger */
            }
        }
    </style>
</head>
<body class="bg-blue-800">

    <header class="bg-blue-900 text-white py-4 px-6 shadow-custom">
        <div class="flex justify-between items-center container mx-auto">
            <a href="/" class="text-lg font-bold">UNIFIED</a>
            <div>
                <a href="/login" class="bg-white text-blue-900 py-2 px-4 rounded hover:bg-gray-200 transition">Login</a>
                <a href="/register" class="bg-white text-blue-900 py-2 px-4 rounded hover:bg-gray-200 transition ml-4">Register</a>
            </div>
        </div>
    </header>

    <main class="min-h-screen flex flex-col items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('images/brgy.jpg') }}');">


        <img src="/images/logoo.png" alt="Logo" class="logo h-30 w-30">


        <div class="welcome-text">
            Welcome to the Unified System
        </div>

    </main>
</body>
</html>
