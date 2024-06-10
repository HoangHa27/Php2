


    @extends('layouts.master')

@section('title')
Quản Lý Sản Phẩm
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="white_card card_height_100 mb_30">
      <div class="white_card_header">
        <div class="box_header m-0">
          <div class="main-title">
            <h1 class="m-0">Quản Lý Bài Viết/Sản Phẩm</h1>
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
            <a href="{{ url("admin/products/create") }}" class="btn btn-info">Thêm Mới</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Categorry</th>
                <th>NAME</th>
                <th>Image</th>
                <th>Price_regular</th>
                <th>Price_Sale</th>
                {{-- <th>orerview</th>
                <th>content</th> --}}
                <th>CREATED AT</th>
                <th>UPDATE AT</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
             
              @foreach ($products as $product)
              
              <tr>
                <td><?= $product['id'] ?></td>
                <td><?=$product['category_id']?></td>
                <td><?=$product['name']?></td>
                <td>
                  <img src="{{ asset($product['img_thumbnail']) }}"   width="100px" >
                </td>
                <td><?= $product['price_regular'] ?></td>
                <td><?= $product['price_sale'] ?></td>
                <td><?=$product['created_at']?></td>
                <td><?=$product['updated_at']?></td>
                <td>
                  {{-- <a href="{{ url('admin/products/' . $product['id']) }}" class="btn btn-info">Xem</a>
                  <form action="{{ url('admin/products/' .$product['id'] .'/delete')  }}" method="post">
                  <button onclick="return confirm('Bạn có xoá không')" type="submit">DELETE</button> --}}
  
  
                  <a href="{{ url("admin/products/{$product['id']}/show") }}" class="btn btn-info btn-sm">Xem</a>
                  <a href="{{ url("admin/products/{$product['id']}/edit")}}" class="btn btn-primary  btn-sm">Sửa</a>
                  <a href="{{ url("admin/products/{$product['id']}/delete" ) }}" onclick="return confirm('Bạn có xoá không')" class="btn btn-danger btn-sm">Xóa</a>
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