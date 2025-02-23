@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div>
        <h1 class="header">Feedback Form</h1>
    
        <form action="{{ route('feedback.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="comments" class="form-label">Comments:</label>
                <textarea id="comments" name="comments" class="form-control" rows="4" required></textarea>
            </div>

            <p>Let us know what you think of our website.</p>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection