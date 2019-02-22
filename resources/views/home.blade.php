@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="btn mb-5 float-right" data-toggle="modal" data-target="#modaladd" >
            <i class="ti-plus font-weight-bold"></i> Add Expense
        </button>

        <!--Add Modal -->
        <div class="modal fade" id="modaladd" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="{{ url('expense') }}">
                            {{ csrf_field() }}
                            <h3>Add Expense</h3>
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label for="voe" class="small font-weight-bold">Value of Expense</label>
                                <input type="text" name="value_of_expense" id="voe" class="form-control form-control-sm" required onkeyup="Money()">
                            </div>

                            <div class="form-group">
                                <label for="doe" class="small font-weight-bold">Date of Expense</label>
                                <input type="datetime-local" name="date_of_expense" id="doe" class="form-control form-control-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="amount" class="small font-weight-bold">Amount (EUR)</label>
                                <input type="text" name="amount_in_euro" id="amount_euro" class="form-control form-control-sm" required>
                            </div>

                            <input type="hidden" name="amount_in_pounds" id="amount_pounds">
                            <input type="hidden" name="amount_in_euros" id="amount_euros">
                            <input type="hidden" name="vat" id="vat">

                            <div class="form-group">
                                <label for="amount" class="small font-weight-bold">Amount (POUNDS)</label>
                                <input type="text" name="amount" id="amount_pound" class="form-control form-control-sm">
                            </div>

                            <div class="form-group">
                                <label for="reason" class="small font-weight-bold">Reason of Expense</label>
                                <textarea class="form-control" rows="3" name="reason" required></textarea>
                            </div>

                            <button type="submit" class="btn">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>DATE OF EXPENSE</th>
                        <th>VAT</th>
                        <th>AMOUNT (EUR)</th>
                        <th>REASON OF EXPENSE</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as $key => $expense)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ date('M j, Y H:i A', strtotime($expense->date_of_expenses)) }}</td>
                            <td>{{ $expense->VAT }}</td>
                            <td>{{ $expense->amount_in_euro }}</td>
                            <td>{{ $expense->reason_for_expenses }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
