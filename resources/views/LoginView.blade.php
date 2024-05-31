<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="flex flex-wrap w-full">
        <!-- SVG Illustration Container -->
        <div class="hidden lg:flex w-full lg:w-1/2 justify-center items-center bg-white p-10">
            <div class="max-w-md">
                <!-- SVG goes here -->
                <svg xmlns="http://www.w3.org/2000/svg" width="524.67004" height="531.39694" class="w-full" alt="https://undraw.co/illustrations" title="https://undraw.co/illustrations" viewBox="0 0 524.67004 531.39694">
                    <!-- SVG content omitted for brevity -->
                </svg>
            </div>
        </div>
        <!-- Form Container -->
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-5">
            <h2 class="text-2xl font-bold mb-6 text-center">Log In</h2>
            <form class="w-full max-w-sm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email address</label>
                    <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="block text-gray-500 text-xs italic mt-2">We'll never share your email with anyone else.</small>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" placeholder="Password">
                </div>
                <div class="mb-6">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" id="remember" name="remember">
                    <label class="text-gray-700 ml-2" for="remember">Remember me</label>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            </form>
            <div class="text-center mt-4">
                <a href="/" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Create Account</a>
            </div>
        </div>
    </div>
</body>
</html>
