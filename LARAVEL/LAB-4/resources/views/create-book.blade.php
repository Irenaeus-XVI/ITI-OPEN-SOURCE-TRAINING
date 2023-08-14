@extends('book-layout')
@section('project-name')
Project Test
@endsection
@section('title')
{{ $page }}
@endsection
@section('content')

<h1>{{ $page }}</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" class="form-select" aria-label="Select a Category">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="pic">Book Cover</label>
        <input class="form-control" name="pic" type="file" id="pic">
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select name="tags[]" class="form-select" multiple>
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
