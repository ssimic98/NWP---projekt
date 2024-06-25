<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieApp</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        .img-container {
            background: url('{{ asset('images/AdmindashboardImage.jpg') }}');
            height: 50vh; /* Adjust as needed */
            display: flex;
            align-items: center;
            justify-content: center;
            color: black; /* Text color for contrast */
        }

        .login-form {
            padding: 20px;
        }
        .center-container
        {
            display:flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="center-container">
        <div class="container">
        <div class="row">
            <!-- Left Column with Image -->
            <div class="col-lg-6 img-container">
                <div class="text-center">
                    <h1>Welcome to MovieApp</h1>
                </div>
            </div>

            <!-- Right Column with Login Form -->
            <div class="col-lg-6">
                <div class="login-form">
                    <h3>Login to Your Account</h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register now</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>
