@extends('layouts.app')
{{-- @section('title', 'Templating Blade')

@section('main') --}}
@section('content')

@if (count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="container">
        <h3>Add Lecturer Form</h3>
            <form action="{{ route('lect.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control" name="address" id=""></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
    </div>

@endsection
