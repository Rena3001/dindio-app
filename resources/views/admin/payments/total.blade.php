@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h1>Total Number of Payments</h1>
        <p>Total Payments: {{ $totalPayments }}</p>
    </div>
@endsection
