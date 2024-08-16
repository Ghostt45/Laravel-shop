@extends('admin')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Заказы</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>product_id</th>
            <th>username</th>
            <th>quantity</th>
            <th>price</th>
            <th>created_at</th>
            <th>status</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>

        @foreach($orders as $order)
             <tr>
                 <td>{{ $order->id }}</td>
                 <td>{{ $order->product_id }}</td>
                 <td>{{ $order->username }}</td>
                 <td>{{ $order->quantity }}</td>
                 <td>{{ $order->price }}</td>
                 <td>{{ $order->created_at }}</td>
                 <td>
                    @if($order->status == 0)
                        <p class="text-warning">В ожидании</p>
                    @elseif($order->status == 1)
                        <p class="text-success">Одобрено</p>
                    @else
                        <p class="text-danger">Отклонено</p>
                    @endif
                 </td>
                 <td>
                     <form action="{{ route('orders.approve', $order->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('PUT')
                         <button type="submit" class="btn btn-success">Одобрить</button>
                     </form>
                     <form action="{{ route('orders.reject', $order->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('PUT')
                         <button type="submit" class="btn btn-warning" style="float: right">Отклонить</button>
                     </form>
                 </td>
                 <td>
                      <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот заказ?');">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger">Удалить</button>
                     </form>
                 </td>
             </tr>
        @endforeach
      </table>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection
