@extends('admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя</h1>
                </div>
                <div class="col-sm-6" >
                    <a style="float: right" class="mr-2 btn btn-success" href="{{ route('users.index') }}">Вернутся</a>
                  </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small>Оставьте поле пустым, если не хотите изменять пароль</small>
                </div>
                <div class="form-group">
                    <label>Admin:</label><br>
                    <input type="radio" id="admin" name="admin" value="1" {{ $user->admin == 1 ? 'checked' : '' }}>
                    <label for="admin">Админ</label><br>
                    <input type="radio" id="not_admin" name="admin" value="0" {{ $user->admin == 0 ? 'checked' : '' }}>
                    <label for="not_admin">Не Админ</label>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </form>
        </div>
    </section>
</div>
@endsection
