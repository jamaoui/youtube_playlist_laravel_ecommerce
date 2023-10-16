@extends('users.admin.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Product list </h1>
        <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{!!$product->description  !!}</td>
                <td align="center">

                    @if($product->category)
                        <a href="{{route('categories.show', $product->category_id)}}" class="btn btn-link">
                        <span class="badge bg-primary">
                          {{$product->category->name}}
                        </span>
                        </a>
                    @endif
                </td>
                <td>{{$product->quantity}}</td>
                <td><img width="100px" src="storage/{{$product->image}}" alt=""></td>
                <td>{{$product->price}} MAD</td>
                <td>
                    <div class="btn-group gap-2">
                        <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Update</a>
                        <form method="post" action="{{route('products.destroy', $product)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" align="center"><h6>No products.</h6></td>
            </tr>

        @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection
