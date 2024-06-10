
@extends('layouts.master')

@section('title')
Quản Lý Đơn Hàng
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
      <div class="white_card_header">
        <div class="box_header m-0">
          <div class="main-title">
            <h1 class="m-0">Quản Lý Đơn Hàng</h1>
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
            {{-- <a href="{{ url("admin/orders/create") }}" class="btn btn-info">Thêm Mới</a> --}}
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>CREATED AT</th>
                <th>UPDATE AT</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($orders as $order)
              
              <tr>
                <td><?= $order['id'] ?></td>
                <td><?=$order['user_name']?></td>
                <td><?=$order['user_email']?></td>
                <td><?= $order['user_phone'] ?></td>
                <td><?= $order['user_address'] ?></td>
                <td><?=$order['created_at']?></td>
                <td><?=$order['created_update']?></td>
                <td>
                  <a href="{{ url("admin/orders/{$order['id']}/show") }}" class="btn btn-info btn-sm">Xem</a>
                  <a href="{{ url("admin/orders/{$order['id']}/edit")}}" class="btn btn-primary  btn-sm">Sửa</a>
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