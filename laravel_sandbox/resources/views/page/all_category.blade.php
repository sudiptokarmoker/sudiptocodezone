@extends('layout.default')
@section('content')
    <div class="category-action-wrapper">
        <a href="{{ route('category.add') }}" class="btn btn-primary">Add category</a>
        <a href="{{ route('category.all') }}" class="btn btn-warning">View All Category</a>
    </div>
    
    <table class="table table-responsive">
        
        <tr>
            <td>
                id
            </td>
            <td>
                category name
            </td>
            <td>
                category slug
            </td>
            <td>
                created time
            </td>
            <td>action</td>
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->categories_name }}</td>
                <td>{{ $row->slug }}</td>
                <td>{{ $row->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-warning">Delete</a>
                    <a href="#" class="btn btn-info">View</a>
                </td>
            </tr>
        @endforeach

    </table>

@endsection