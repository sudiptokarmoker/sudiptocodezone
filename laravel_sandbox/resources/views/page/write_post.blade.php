@extends('layout.default')
@section('content')
<div class="jumbotron">
    <h1 class="display-4">Hello, Welcome to the write post page!</h1>
    <div class="category-action-wrapper">
        <a href="{{ route('category.add') }}" class="btn btn-primary">Add category</a>
        <a href="{{ route('category.all') }}" class="btn btn-warning">View All Category</a>
    </div>
    <form>
        <div class="form-group">
          <label for="txtPostTitle">Post title</label>
          <input class="form-control" type="text" placeholder="post title" name="title" id="txtPostTitle">
        </div>
        <div class="form-group">
          <label for="txtPostDetails">Post Details</label>
          <textarea name="details" class="form-control" id="txtPostDetails">

          </textarea>
        </div>
        <div class="form-group">
          <select class="custom-select" name="lstCategoryId">
            <option selected>Category Id</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>

        <div class="form-group">
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Upload post image</label>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection