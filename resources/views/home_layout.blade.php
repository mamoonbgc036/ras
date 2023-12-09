<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-bottom: 60px;
            /* Adjust this value according to the footer height */
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            /* Customize the footer background color */
            color: #ffffff;
            /* Customize the footer text color */
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-light py-4">
        <div class="float-right m-4">
            <a href="{{ route('login') }}" class="btn btn-sm btn-secondary">Login</a>
        </div>
        <div class="container d-flex align-items-center justify-content-around">
            <div>
                <h1>Welcome to My Blog</h1>
                <p>Read insightful articles written by our talented authors.</p>
                <a href="{{ route('home') }}" class="btn btn-warning mx-auto">Home</a>
            </div>
            @yield('filter')
        </div>
    </header>

    <main class="container mx-auto">
        <div class="row">
            <div class="col-md-12">
                @yield('blog')
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2023 My Blog Website</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>