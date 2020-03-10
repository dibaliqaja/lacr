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

    <div class="container">
        <h3>Edit Lecturer Form</h3>
        <form action="{{ route('lect.update', $lecturers->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="" value="{{ $lecturers->name }}">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea class="form-control" name="address" id="">{{ $lecturers->address }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

@endsection
