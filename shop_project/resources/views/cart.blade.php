@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4 mb-4">Ваша корзина</h2>
    @if(count($cart) > 0)
        <form action="{{ route('cart.updateQuantity') }}" method="POST" id="cart-form">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Итоговая цена</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['product']->title }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary" onclick="changeQuantity('{{ $item['product']->id }}', -1)">-</button>
                                <input type="number" id="quantity-{{ $item['product']->id }}" name="quantity[{{ $item['product']->id }}]" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->quantity }}" style="width: 60px; text-align: center;" onchange="updateTotalPrice('{{ $item['product']->id }}')">
                                <button type="button" class="btn btn-secondary" onclick="changeQuantity('{{ $item['product']->id }}', 1)">+</button>
                            </td>
                            <td>{{ $item['product']->price }} AMD</td>
                            <td id="total-price-{{ $item['product']->id }}">{{ $item['quantity'] * $item['product']->price }} AMD</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                                    @csrf
                                    
                                    <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('order.create') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Купить</button>
            </form>
        </form>
    @else
        <p>Ваша корзина пуста.</p>
    @endif
</div>

<script>
    function changeQuantity(productId, delta) {
        var quantityInput = document.getElementById('quantity-' + productId);
        var currentQuantity = parseInt(quantityInput.value);
        var newQuantity = currentQuantity + delta;
        var maxQuantity = parseInt(quantityInput.max);

        if (newQuantity >= 1 && newQuantity <= maxQuantity) {
            quantityInput.value = newQuantity;
            updateTotalPrice(productId);
            // Automatically submit the form to update the cart
            document.getElementById('cart-form').submit();
        }
    }

    function updateTotalPrice(productId) {
        var quantityInput = document.getElementById('quantity-' + productId);
        var price = parseFloat(quantityInput.closest('tr').querySelector('td:nth-child(3)').innerText);
        var quantity = parseInt(quantityInput.value);
        var totalPrice = quantity * price;
        document.getElementById('total-price-' + productId).innerText = totalPrice.toFixed(2) + ' AMD';
    }
</script>
@endsection
