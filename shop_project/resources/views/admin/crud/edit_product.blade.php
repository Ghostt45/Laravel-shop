@extends('admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать товар</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Название:</label>
                    <input type="text" class="form-control" name="title" value="{{ $product->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Количество:</label>
                    <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Цена:</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Обновить товар</button>
            </form>
        </div>
    </section>
</div>

@endsection
