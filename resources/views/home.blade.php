@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Product List</h1>
    <div class="row mb-3">
        <div class="col-md-6">
            <form method="GET" action="{{ route('home') }}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products" name="search" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search">Search</i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(count($products))

    @if(session()->has('success'))
    <h1>success</h1>
    @endif

    @if(session()->has('failure'))
    <h1>failure</h1>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}$</td>
                <td>{{ $product->quantity }}</td>
                <td>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                        <form method="post" action="/delete/{{$product->id}}" class="form">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger delete" id="submit">Delete</button>

                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="background-color: #f0f0f0; height: 50px; padding: 5px;">
        {{ $products->links('pagination::bootstrap-4') }}</div>

    @else
    <h1 class="text-center text-danger">No products !!</h1>
    @endif
</div>

@endsection
