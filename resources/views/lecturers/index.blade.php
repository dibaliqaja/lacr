@extends('layouts.app')
{{-- @section('title', 'Templating Blade')

@section('main') --}}
@section('content')
<!-- Main -->
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2>Lecturers Page</h2>
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <a href="{{ route('lect.create') }}" class="btn btn-info">Add Lecturer</a><br><br>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lecturers as $result => $hasil)
                        <tr>
                            <td>{{ $result + $lecturers->firstitem() }}</td>
                            <td>{{ $hasil->name }}</td>
                            <td>{{ $hasil->address }}</td>
                            <td>{{ $hasil->faculty }}</td>
                            <td>
                                <form action="{{ route('lect.destroy', $hasil->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('lect.edit', $hasil->id) }}" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $lecturers->links() }}
        </div>
    </div>
</section>
<!-- END : Main -->

@endsection
