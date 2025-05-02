@extends('admin.layout.master')

@section('content')
<div class="container">
    <h1>Create FAQ</h1>
    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" name="question" id="question" class="form-control" placeholder="Enter the question" required>
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea name="answer" id="answer" class="form-control" rows="5" placeholder="Enter the answer" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create FAQ</button>
    </form>
</div>
@endsection