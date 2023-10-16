@extends('users.admin.app')

@section('title', ($isUpdate?'Update':'Create').' category')

@php
    $route = route('categories.store');
    if($isUpdate) {
       $route =  route('categories.update', $category);
    }
@endphp

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @csrf
        @if($isUpdate)
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name', $category->name)}}">
        </div>
        <div class="form-group my-3">
            <input type="submit" class="btn btn-primary w-100" value="{{$isUpdate?'Edit': 'Create'}}">
        </div>
    </form>
@endsection


