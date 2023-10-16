@extends('users.admin.app')

@section('title', ($isUpdate?'Update':'Create').' product')

@php
    $route = route('products.store');
    if($isUpdate) {
       $route =  route('products.update', $product);
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
            <input type="text" name="name" id="name" class="form-control" value="{{old('name', $product->name)}}">
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description"
                      class="form-control">{{old('description', $product->description)}}</textarea>
        </div>
        <div class="form-group">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control"
                   value="{{old('quantity', $product->quantity)}}">
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($product)
                <img width="100px" src="/storage/{{$product->image}}" alt="">
            @endif
        </div>
        <div class="form-group">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.5" name="price" id="price" class="form-control"
                   value="{{old('price', $product->price)}}">
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Please choose your category</option>
                @foreach($categories as $category)
                    <option @selected(old('category_id', $product->category_id) === $category->id) value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group my-3">
            <input type="submit" class="btn btn-primary w-100" value="{{$isUpdate?'Edit': 'Create'}}">
        </div>
    </form>
@endsection


