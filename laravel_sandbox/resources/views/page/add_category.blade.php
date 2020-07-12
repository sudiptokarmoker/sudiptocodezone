@extends('layout.default')
@section('content')
    <div class="category-action-wrapper">
        <a href="{{ route('category.add') }}" class="btn btn-primary">Add category</a>
        <a href="{{ route('category.all') }}" class="btn btn-warning">View All Category</a>
    </div>
    
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('store.category') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="txtCategoriesName">Category name</label>
          <input class="form-control" type="text" placeholder="category name" name="categories_name" id="txtCategoriesName">
        </div>
        <div class="form-group">
            <label for="txtCategoriesSlug">Slug Name</label>
            <input class="form-control" type="text" placeholder="category slug" name="slug" id="txtCategoriesSlug">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection