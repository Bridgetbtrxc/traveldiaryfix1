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
    <div>
        <h1>{{ $itinerary->title }}</h1>
        <p><strong>Start Date:</strong> {{ $itinerary->start_date }}</p>
        <p><strong>End Date:</strong> {{ $itinerary->end_date }}</p>
        <p><strong>Description:</strong> {{ $itinerary->description }}</p>
        <!-- Add more itinerary details as needed -->
    </div>
    <form method="POST" action="{{ route('itineraries.destroy', $itinerary->id) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
