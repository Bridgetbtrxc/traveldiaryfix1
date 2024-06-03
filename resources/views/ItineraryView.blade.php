<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Back button -->
        <a href="{{ route('itineraries.my') }}" class="btn btn-secondary mb-3" style="background-color: #949EFF; border-color: #949EFF;">Back</a>
        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <h1 class="card-title mb-4">{{ $itinerary->title }}</h1>
                    <p><strong>Start Date:</strong> {{ $itinerary->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $itinerary->end_date }}</p>
                    <p><strong>Description:</strong> {{ $itinerary->description }}</p>
                    <!-- Add more itinerary details as needed -->
                    <div class="mt-4">
                        <form method="POST" action="{{ route('itineraries.destroy', $itinerary->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="card-title mb-0">Expenses for Itinerary</h1>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpenseModal">Add Expense</button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Expense Date</th>
                                <th>Amount</th>
                                <th>Actions</th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalAmount = 0;
                            @endphp
                            @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->title }}</td>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->expense_date }}</td>
                                <td>Rp {{ $expense->amount }}</td>
                                <td>
                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <!-- Add more table cells as needed -->
                            </tr>
                            @php
                            $totalAmount += $expense->amount;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total Amount:</strong></td>
                                <td>Rp {{ $totalAmount }}</td>
                                <td></td> <!-- Empty cell for consistency -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding expense -->
    <div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="addExpenseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Expense creation form -->
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="itinerary_id" value="{{ $itinerary->id }}">
                        <!-- Include the hidden input field for itinerary_id -->
                        <div class="mb-3">
                            <label for="expense_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="expense_title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="expense_description" class="form-label">Description</label>
                            <textarea class="form-control" id="expense_description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="expense_amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="expense_amount" name="amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="expense_date" class="form-label">Expense Date</label>
                            <input type="date" class="form-control" id="expense_date" name="expense_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
