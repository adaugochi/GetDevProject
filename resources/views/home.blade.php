@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="btn btn-outline-primary mb-5" data-toggle="modal" data-target="#modalAdd">
            <i class="ti-plus font-weight-bold"></i> Add Expense
        </button>

        <add-expense :user-id="{{Auth::user()->id}}" csrf-token="{{csrf_token()}}"></add-expense>
        {{--<update-expense></update-expense>--}}

        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('success') }}
                </div>
            @endif
            <data-table :expenses="{{$expenses}}" :user-id="{{Auth::user()->id}}" csrf-token="{{csrf_token()}}"></data-table>
        </div>
    </div>
@endsection
