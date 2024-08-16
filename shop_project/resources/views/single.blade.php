@extends('layouts.app')

@section('content')

<div class="container">
    <form method="" action="{{ route('cart.add') }}">
        @csrf
        <h2 style="margin-top: 20px; margin-bottom: 30px;">Покупка товара</h2>
        <div class="row" style="margin-top: 50px;">
            <h2 class="card-title">Название: {{ $product->title }}</h2>
            <p class="card-text">Описание: {{ $product->description }}</p>
            <p class="card-text">Количество: {{ $product->quantity }}</p>
            <p class="card-text">Цена: {{ $product->price }} AMD.</p>
            <div class="mb-3">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input name="quantity" type="number" class="form-control" id="exampleInputPassword1" placeholder="Введите количество для покупки..." min="1" max="{{ $product->quantity }}">
            </div>
            <button name="button-add-to-cart" type="submit" class="btn btn-success">Добавить в корзину</button>
        </div>
    </form>
</div>

@endsection
