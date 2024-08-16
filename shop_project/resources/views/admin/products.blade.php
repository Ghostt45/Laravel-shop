@extends('admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Товары</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <a style="float: right" class="mr-2 btn btn-success" href="{{ route('products.create') }}">Добавить товар</a>
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
            <th>user_id</th>
            <th>title</th>
            <th>description</th>
            <th>quantity</th>
            <th>price</th>
            <th>created_at</th>
            <th>status</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>

        @foreach($products as $product)
             <tr>
                 <td>{{ $product->id }}</td>
                 <td>{{ $product->user_id }}</td>
                 <td>{{ $product->title }}</td>
                 <td>{{ $product->description }}</td>
                 <td>{{ $product->quantity }}</td>
                 <td>{{ $product->price }}</td>
                 <td>{{ $product->created_at }}</td>
                 <td>
                   @if ($product->is_published)
                     <span class="badge bg-success">Опубликован</span>
                     <form action="{{ route('products.toggleStatus', $product->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('PUT')
                         <button type="submit" class="btn btn-warning" style="float: right">Снять с публикации</button>
                     </form>
                   @else
                     <span class="badge bg-danger">Не опубликован</span>
                     
                     <form action="{{ route('products.toggleStatus', $product->id) }}" method="POST" style="display:inline;">
                         @csrf
                         @method('PUT')
                         <button type="submit" class="btn btn-success" style="float: right">Опубликовать</button>
                     </form>
                   @endif
                 </td>
                 <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Изменить</a></td>
                  <td>
                      <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
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
