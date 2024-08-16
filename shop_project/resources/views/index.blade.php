@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card mb-4" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Название: {{ $product->title }}</h5>
                        <p class="card-text">Описание: {{ $product->description }}</p>
                        <p class="card-text">Количество: {{ $product->quantity }}</p>
                        <p class="card-text">Цена: {{ $product->price }} AMD.</p>
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
