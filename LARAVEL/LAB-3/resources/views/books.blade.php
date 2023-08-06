@extends('book-layout')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $page }}</h1>

    @if ($books->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>${{ $book->price }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info mr-2">Show</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
    @else
    <div class="alert alert-info mt-4" role="alert">
        No books found.
    </div>
    @endif
</div>
@endsection