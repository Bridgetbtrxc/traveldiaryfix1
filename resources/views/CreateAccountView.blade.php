<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    color: #333;
    background-image: url('/images/bg.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}
        .container {
            max-width: 400px;
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 60px;
        }

        .form-group label {
            font-weight: normal;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            padding: 10px;
        }

        button {
            border-radius: 10px;
            width: 100%;
            background-color: #007bff;
            border-color: #007bff;
            font-weight: bold;
            padding: 12px;
        }

        button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .text-center a {
            text-decoration: none;
            color: #007bff;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .form-title {
            color: #030406;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-text {
            font-size: 0.875em;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="form-title">Create Your Account</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                Create Account
              </button>
        </form>
        <div class="text-center mt-3">
            <small><a href="/login">Have an account already? Login</a></small>
        </div>
        @if (session('alert'))
    <div class="alert alert-warning">
        {{ session('alert') }}
    </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
