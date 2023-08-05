@extends('book-layout')
@section('project-name')
Project Test
@endsection
@section('title')
Create Book
@endsection
@section('content')
<h1>{{ $page }}</h1>
<form>
    <div class="form-group mb-3">
        <label for="bookTitle">Title</label>
        <input type="text" class="form-control" id="bookTitle" placeholder="Enter book title">
    </div>
    <div class="form-group mb-3">
        <label for="bookPrice">Price</label>
        <input type="number" step="0.01" class="form-control" id="bookPrice" placeholder="Enter book price">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection