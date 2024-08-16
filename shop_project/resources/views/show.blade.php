@extends('layouts.app')
@section('content')

<div class="container">
    <h2 style="margin-top: 20px; margin-bottom: 30px;">Корзина</h2>
    <div class="row" style="margin-top: 50px;">
      <Form method="post" action="app/controllers/orders.php">
              
            </Form>
                <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <div class="card-body">
              <h5 class="card-title">Название: {{ $product->title }}</h5>
              <p class="card-text">Описание: {{ $product->description }}</p>
              <p class="card-text">Цена: {{ $product->price }} AMD.</p>
              <form method="post" action="app/controllers/orders.php">
                <input type="hidden" name="product_id" value="5">
                <button name="button-remove-from-cart" type="submit" class="btn btn-danger">Удалить</button>
                <button style="float: right;" name="button-create-cart-order" type="submit" class="btn btn-success">Купить</button>
              </form>
            </div>
          </div>

          </div>
  </div>
@endsection
