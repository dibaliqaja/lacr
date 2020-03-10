@extends('template')
@section('title', 'Templating Blade')

@section('main')
<!-- Main -->
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>Students Page</h2>
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                {{-- <a href="{{ route('students.create') }}" class="btn btn-info">Add Student</a><br><br> --}}

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Faculty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $result => $hasil)
                        <tr>
                            <td>{{ $result + $students->firstitem() }}</td>
                            <td>{{ $hasil->name }}</td>
                            <td>{{ $hasil->address }}</td>
                            <td>{{ $hasil->faculty }}</td>
                            <td>
                                <form action="{{ route('crud.destroy', $hasil->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{-- route('category.edit', $hasil->id) --}}#" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- END : Main -->

@endsection
