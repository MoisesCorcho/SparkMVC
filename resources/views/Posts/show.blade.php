@extends('Layout.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6 text-center">
            <h1 class="display-4">SparkMVC</h1>
            <p class="lead">Post show</p>
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
              
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at }}</td>
              </tr>
                
            </tbody>
          </table>

    </div>
@endsection