@extends('layouts.app')

@section('content')


@unless (count($products) == 0)

<div class="container">
    <h1>Product List</h1>
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
                        <a href="" class="btn btn-primary">Edit</a>
                        <form method="post" action="/delete/{{$product->id}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger delete" id="submit">Delete</button>

                            <script defer>
                                const btn = document.querySelector('.delete')
                                btn.addEventListener('click',(e)=>{
                                    e.preventDefault()
                                    if(confirm('Are you sure about deleting this product')){
                                        console.log('hello')
                                    }
                                })
                            </script>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@else
<h1 class="text-center text-danger">No products !!</h1>

@endunless

@endsection

