<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Updated viewport meta tag for responsiveness -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Itinerary Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .btn-primary {
            background-color: #949eff;
            border-color: #949eff;
        }

        .btn-primary:hover {
            background-color: #7a82cc;
            border-color: #7a82cc;
        }
/* Responsive table style */
@media (max-width: 767px) {
    .table-responsive-scroll,
    .mt-sm-3 {
        overflow-x: auto;
    }
}


        /* Add space between itinerary view and expenses */
        @media (max-width: 991px) {
            .mt-sm-5{
                margin-top: 3rem !important;
            }
        }


    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Back button -->
        <a href="{{ route('itineraries.my') }}" class="btn btn-secondary mb-3"
            style="background-color: #949EFF; border-color: #949EFF;">Back</a>
        <div class="row">
            <div class="col-lg-6">
                <div class="card p-4">
                    <table class="table p-5">
                    <h1 class="card-title mb-4">{{ $itinerary->title }}</h1>
                    <p><strong>Start Date:</strong> {{ $itinerary->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $itinerary->end_date }}</p>
                    <p><strong>Description:</strong> {{ $itinerary->description }}</p>

                    <!-- Add more itinerary details as needed -->
                    <div class="mt-4 mt-lg-5"> <!-- Added mt-lg-5 class for space on larger screens -->
                        <form method="POST" action="{{ route('itineraries.destroy', $itinerary->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('itineraries.detail', $itinerary->id) }}" class="btn btn-primary mt-3">View Expenses</a>
                    </div>
                </table>
                </div>
            </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
