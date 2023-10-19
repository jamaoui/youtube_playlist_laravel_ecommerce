@php use Illuminate\Support\Facades\Request; @endphp
@extends('layouts.app')

@section('title', 'Products')
@section('sidebar')
    <h1>Filters</h1>
    <hr>
    <form method="get">
        <div class="form-group">
            <label for="name">Name or description</label>
            <input type="text" name="name" id="name" value="{{Request::input('name')}}" class="form-control"
                   placeholder="Name">
        </div>
        <h3>Categories</h3>
        @php
            $categoriesIds=Request::input('categories')?? [];
        @endphp
        @foreach($categories as $category)
            <div class="form-check">
                <input @checked(in_array($category->id, $categoriesIds)) type="checkbox" name="categories[]"
                       value="{{$category->id}}" class="form-check-input">
                <label class="form-check-label">{{$category->name}}</label>
            </div>
        @endforeach
        <h3>Pricing</h3>
        <div class="form-group">
            <label for="min">Min</label>
            <input min="{{$priceOptions->minPrice}}" max="{{$priceOptions->maxPrice}}" type="number" name="min" id="min" value="{{Request::input('min')}}" class="form-control"
                   placeholder="Min price">
            <label for="max">Max</label>
            <input min="{{$priceOptions->minPrice}}" max="{{$priceOptions->maxPrice}}" type="number" name="max" id="max" value="{{Request::input('max')}}" class="form-control"
                   placeholder="Max price">
        </div>
        <div class="form-group my-2">
            <input type="submit" class="btn btn-primary" value="Filter">
            <a type="reset" class="btn btn-secondary" href="{{route('home_page')}}">Reset</a>
        </div>
    </form>
    <hr>
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Products </h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top h-100" src="storage/{{$product->image}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{!! $product->description !!}</p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Quantity:  <span class="badge bg-success">{{$product->quantity}}</span></span>
                            <span>

                            Price: <span class="badge bg-primary">{{$product->price}} MAD</span>
                            </span>
                        </div>
                        <hr>
                        <div class="my-2">
                            Category: <span class="badge bg-primary">{{$product->category?->name}}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$product->created_at}}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info my-4 w-100" role="alert">
                <h4>
                   <strong>Info:</strong> No Products
                </h4>
            </div>

        @endforelse
    </div>
@endsection
