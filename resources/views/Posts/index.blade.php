@extends('Layout.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6 text-center">
            <h1 class="display-4">SparkMVC</h1>
            <p class="lead">Posts index</p>
        </div>

        <table class="table table-dark table-striped-columns">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $item)    
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->title }}</td>
                <td>{{ $item->body }}</td>
                <td>{{ $item->created_at }}</td>
              </tr>
                @endforeach
            </tbody>
          </table>

    </div>
@endsection