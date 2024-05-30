<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class=m-5>
        <p>Successful!</p>
        <h1>Welcome, {{ $userName }}</h1>

        <!-- untuk logout -->
        <div class=mt-5>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>

        <!-- untuk error message -->
        @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Button to trigger itinerary creation form -->
        <div class=mt-5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItineraryModal">
                Add Itinerary
            </button>
        </div>

        <!-- Modal for adding itinerary -->
        <div class="modal fade" id="addItineraryModal" tabindex="-1" aria-labelledby="addItineraryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItineraryModalLabel">Add Itinerary</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Itinerary creation form -->
                        <form action="{{ route('itineraries.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class=mt-5>Your Itineraries</h2>

        <div class="row">
            @foreach ($itineraries as $itinerary)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $itinerary->title }}</h3>
                            <p class="card-text"><strong>Start Date:</strong> {{ $itinerary->start_date }}</p>
                            <p class="card-text"><strong>End Date:</strong> {{ $itinerary->end_date }}</p>
                            <a href="{{ route('itineraries.show', $itinerary->id) }}" class="btn btn-primary">View
                                Details</a>
                            <form action="{{ route('itineraries.destroy', $itinerary->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    </div>
</body>

</html>
