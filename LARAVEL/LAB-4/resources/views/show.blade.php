@extends('book-layout')

@section('content')
<div class="container">
    <h1>Book Details</h1>

    <div class="card">
        <div class="card-body d-flex justify-content-center">
            <div class="col-4">
                <h2 class="card-title">{{ $book->title }}</h2>
                <p class="card-text h4"><strong>Price:</strong> ${{ $book->price }}</p>
                <p class="card-text h4"><strong>Description:</strong> {{ $book->description ?: 'N/A' }}</p>
                <p class="card-text h4"><strong>Category:</strong> {{ $book->category->name ?: 'N/A' }}</p>

                @if ($book->tags->count() > 0)
                <p class="card-text h4"><strong>Tags:</strong></p>
                <div>
                    @foreach ($book->tags as $tag)
                    <span class="h5">{{ $tag->name }}</span>
                    @endforeach
                </div>
                @else
                <p class="card-text h4"><strong>Tags:</strong> No tags</p>
                @endif
            </div>

            <div class="col-8">
                <img src="{{ asset('storage/books/' . $book->pic) }}" alt="" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
    </div>
</div>
@endsection