@extends('layouts.master')

@section('title')
Quản Lý người dùng
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
      <div class="white_card_header">
        <div class="box_header m-0">
          <div class="main-title">
            <h1 class="m-0">Quản Lý người dùng</h1>
          </div>
        </div>
      </div>
      <div class="white_card_body">
        @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

        @php
        unset($_SESSION['status']);
        unset($_SESSION['msg']);
        @endphp
        @endif

        @if (isset($_SESSION['status']) && !$_SESSION['status'])
        <div class="alert alert-warning">{{ $_SESSION['msg'] }}</div>

        @php
        unset($_SESSION['status']);
        unset($_SESSION['msg']);
        @endphp
        @endif
        <div class="table-responsive">
          <div class="text-end">
            <a href="{{ url("admin/users/create") }}" class="btn btn-info">Thêm Mới</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>UPDATE AT</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($users as $user)

              <tr>
                <td>
                  <?= $user['id'] ?>
                  </?=>
                <td>
                  <img src="{{ show_upload($user['avatar'])}}" width="100px">
                </td>
                <td>
                  <?=$user['name']?>
                </td>
                <td>
                  <?=$user['email']?>
                </td>
                <td>
                  <?=$user['created_at']?>
                </td>
                <td>
                  <?=$user['updated_at']?>
                </td>
                <td>
                  <a href="{{ url("admin/users/{$user['id']}/show") }}" class="btn btn-info btn-sm ">Xem</a>
                  <a href="{{ url("admin/users/{$user['id']}/delete" ) }}" onclick="return confirm('Bạn có xoá không')"
                    class="btn btn-danger btn-sm">Xóa</a>
                  <a href="{{ url("admin/users/{$user['id']}/edit") }}" class="btn btn-primary btn-sm">Sửa</a>
                  </form>
                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection