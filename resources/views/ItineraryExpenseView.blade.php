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

        @media (max-width: 767px) {
            .table-responsive-scroll,
            .mt-sm-3 {
                overflow-x: auto;
            }
        }

        @media (max-width: 991px) {
            .mt-sm-5 {
                margin-top: 3rem !important;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('itineraries.my') }}" class="btn btn-secondary mb-3"
            style="background-color: #949EFF; border-color: #949EFF;">Back</a>
        <div class="col-lg-6 mt-sm-5">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="card-title mb-0">Expenses for Itinerary</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addExpenseModal">Add Expense</button>
                </div>
                <div class="table-responsive-scroll">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Expense Date</th>
                                <th>Amount</th>
                                <th>Actions</th>
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
                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                            $totalAmount += $expense->amount;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total Amount:</strong></td>
                                <td>Rp {{ $totalAmount }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade {{ $errors->any() ? 'show d-block' : '' }}" id="addExpenseModal" tabindex="-1"
        aria-labelledby="addExpenseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExpenseModalLabel">Add Expense</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="itinerary_id" value="{{ $itinerary->id }}">
                        <div class="mb-3">
                            <label for="expense_title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="expense_title" name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expense_description" class="form-label">Description</label>
                            <textarea class="form-control" id="expense_description" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="expense_amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="expense_amount" name="amount" value="{{ old('amount') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="expense_date" class="form-label">Expense Date</label>
                            <input type="date" class="form-control" id="expense_date" name="expense_date" value="{{ old('expense_date') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @if ($errors->any())
    <script>
        var addExpenseModal = new bootstrap.Modal(document.getElementById('addExpenseModal'));
        addExpenseModal.show();
    </script>
    @endif

    @if (session('success'))
    <script>
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    </script>
    @endif
</body>

</html>
