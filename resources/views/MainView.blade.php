<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            background-color: #eeeff1;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            padding-top: 20px;
            color: #fff;
            transition: width 0.3s;
            box-shadow: 2px 0px 5px 0px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            text-align: left;
            margin: 20px;
            color: #000000;
            text-decoration: none;
            transition: color 0.3s;
        }

        .sidebar a:hover {
            color: #949EFF;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .navbar {
    background-color: #949EFF;
    color: #fff;
    border-radius: 6px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-brand:hover,
        .navbar-nav .nav-link:hover {
            color: #dcdcdc;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #949EFF;
        }

        .btn-primary {
            background-color: #949EFF;
            border-color: #949EFF;
        }

        .btn-primary:hover {
            background-color: #7A82CC;
            border-color: #7A82CC;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ $userName }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar rounded" style="box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);">
        <a href="#"><i class="bi bi-house-door fs-5 me-2"></i>Home</a>
        <a href="{{ route('itineraries.my') }}"><i class="bi bi-journal fs-5 me-2"></i>My Itinerary</a>
        <a href="#"><i class="bi bi-gear fs-5 me-2"></i>Settings</a>
    </div>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12 rounded" style="background-color: #949EFF;">
                    <div class="text-white p-4 rounded" style="background-color: transparent;">
                        <h2>Welcome, {{ $userName }}</h2>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Your Travelling History</h2>
            </div>

    <div class="modal fade" id="addItineraryModal" tabindex="-1" aria-labelledby="addItineraryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItineraryModalLabel">Add Itinerary</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('itineraries.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">

                            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
                        </body>
                        </html>
