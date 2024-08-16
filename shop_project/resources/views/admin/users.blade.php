@extends('admin')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Пользователи</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <a class="mr-2 btn btn-success" style="float: right" href="{{ route('users.create') }}">Создать пользователя</a>
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
            <th>admin</th>
            <th>name</th>
            <th>email</th>
            <th>created_at</th>
            <th>&#9998;</th>
            <th>&#10006;</th>
        </tr>

        @foreach($users as $user)
             <tr>
                 <td>{{ $user->id }}</td>
                 <td>{{ $user->admin }}</td>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->email }}</td>
                 <td>{{ $user->created_at }}</td>
                 <td><a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Изменить</a></td>
                 <td>
                     <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');">
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
