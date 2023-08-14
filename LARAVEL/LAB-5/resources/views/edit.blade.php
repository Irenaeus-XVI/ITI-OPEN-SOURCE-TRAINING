@extends('book-layout')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $page }}</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $book->price }}" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-select" aria-label="Default select example" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $book->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('books.show', $book->id) }}" class="btn btn-secondary">Back to Book Details</a>
    </div>
</div>
@endsection
