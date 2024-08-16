@extends('admin')

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить товар</h1>
                </div>
                <div class="col-sm-6" >
                    <a style="float: right" class="mr-2 btn btn-success" href="{{ route('products.index') }}">Вернутся</a>
                  </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Название:</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Количество:</label>
                    <input type="number" class="form-control" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="price">Цена:</label>
                    <input type="text" class="form-control" name="price" required>
                </div>
                <button type="submit" class="btn btn-success">Добавить товар</button>
            </form>
        </div>
    </section>
</div>

@endsection
