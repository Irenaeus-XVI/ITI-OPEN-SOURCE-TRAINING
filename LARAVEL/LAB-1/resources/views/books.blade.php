@extends('book-layout')
@section('content')
<h1>{{ $page }}</h1>
@isset($books)

@section('title')
Books
@endsection
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $index => $book)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $book['title'] }}</td>
                <td>${{ number_format($book['price'], 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No books found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@else
<p> No Books</p>
@endif
@endsection