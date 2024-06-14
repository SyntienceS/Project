@extends('layouts.app') 
@section('content')
<div class="container">
<main>
    <section class="introduction">
        <h2>This page is currently not finished</h2>
        <p>...</p>
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status }}</td>
                    <td>
                    <a href="{{ route('products.index', ['sort_by' => 'name', 'order' => $sort_by == 'name' && $order == 'asc' ? 'desc' : 'asc']) }}">Name</a>
                    <a href="{{ route('products.index', ['sort_by' => 'price', 'order' => $sort_by == 'price' && $order == 'asc' ? 'desc' : 'asc']) }}">Price</a>
                    <a href="{{ route('products.index', ['sort_by' => 'quantity', 'order' => $sort_by == 'quantity' && $order == 'asc' ? 'desc' : 'asc']) }}">Quantity</a>
    
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <form action="{{ route('products.buy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success">Buy</button>
                        </form>
                        <form action="{{ route('products.sell', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Sell</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
