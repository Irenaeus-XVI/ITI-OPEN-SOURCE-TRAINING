@extends('book-layout')

@section('content')
<div class="container">
    <h1>Book Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text"><strong>Price:</strong> ${{ $book->price }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $book->description ?: 'N/A' }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
    </div>
</div>
@endsection