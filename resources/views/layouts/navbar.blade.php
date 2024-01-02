<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/styles/app.css">
    <link rel="stylesheet" href="/styles/processes/dashboard.css">
    <link rel="icon" href="/favicon.svg">

    @yield('stylesheets')
    <title>
        @yield('title')
    </title>
</head>

<body>
    <nav class="navbar">
        <div class="navbar_logo">
            <img src="/logo.svg" alt="Logo">
        </div>

        <div class="user_links">
            <a href="{{ route('logout') }}">Sair</a>
        </div>
    </nav>

    @yield('content')

    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 4rem;
            height: 4rem;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .navbar_logo img {
            width: 10rem;
        }

        .navbar_links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar_links a {
            margin-left: 1rem;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            color: #002341;
            transition: all 0.2s ease-in-out;
        }

        .navbar_links a:hover {
            color: #E2AD68;
            cursor: pointer;
        }

        .user_links a {
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            background-color: #FFF;
            color: #002341;
            border: 1px solid #ddd;
            padding: 0.6rem 2rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease-in-out;
        }

        .user_links a:hover {
            background-color: #002341;
            color: #FFF;
            border: 1px solid #002341;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 2rem;
            }

            .navbar_logo img {
                width: 7rem;
            }

            .navbar_logo img {
                height: 1.5rem;
            }

            .navbar_links {
                display: none;
            }

            .user_links a {
                padding: 0.5rem 0.8rem;
                font-size: 0.8rem;
            }
        }
    </style>
</body>

</html>