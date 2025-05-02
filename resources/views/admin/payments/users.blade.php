@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h1>Number of Paid Users</h1>
        <p>Paid Users: {{ $paidUsersCount }}</p>
    </div>
@endsection
