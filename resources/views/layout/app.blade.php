<!DOCTYPE html>
<html>
<head>
    <title>Portfolio</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #0f0f0f;
            color: white;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 20px 50px;
            background: black;
            border-bottom: 1px solid gold;
        }

        .navbar h2 {
            color: gold;
            margin: 0;
        }

        .navbar a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .navbar a:hover {
            color: gold;
        }

        .container {
            padding: 50px;
            text-align: center;
        }

        h1 {
            color: gold;
        }

        .card {
            background: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid gold;
            margin-top: 20px;
            box-shadow: 0 0 15px rgba(255,215,0,0.2);
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h2>MyPortfolio</h2>
        <div>
            <a href="/home">Home</a>
            <a href="/about">About</a>
            <a href="/education">Education</a>
            <a href="/project">Project</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>