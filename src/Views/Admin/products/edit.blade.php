@extends('layouts.master')

@section('title')
Cập nhật Người dùng: {{ $product['name'] }}
@endsection

@section('content')
@if (!empty($_SESSION['errors']))
<div class="alert alert-warning">
    <ul>
        @foreach ($_SESSION['errors'] as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@php
unset($_SESSION['errors']);
@endphp
@endif

@if (isset($_SESSION['status']) && $_SESSION['status'])
<div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

@php
unset($_SESSION['status']);
unset($_SESSION['msg']);
@endphp
@endif

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="main-title">
            <h1 class="m-0">Cập Nhật Sản Phẩm</h1>
        </div>
    </div>
</div>
<form action="{{ url("admin/products/{$product['id']}/update") }}" enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 mt-3">
                <label for="category_id" class="form-label text-body h4">Category:</label>

                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categoryPluck as $id => $name)
                    <option @if ($product['category_id']==$id) selected @endif value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label text-body h4">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name"
                    value="{{ $product['name'] }}" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="img_thumbnail" class="form-label text-body h4">Img Thumbnail:</label>
                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail"
                    name="img_thumbnail">
                <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
            </div>
            <div class="mb-3 mt-3">
                <label for="price_regular" class="form-label text-body h4">Price Regular:</label>
                <input type="text" class="form-control" id="price_regular" placeholder="Enter Price Regular"
                    value="{{ $product['price_regular'] }}" name="price_regular">
            </div>
            <div class="mb-3 mt-3">
                <label for="overview" class="form-label text-body h4">Price Sale:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Price Sale"
                    value="{{ $product['price_sale'] }}" name="price_sale">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3 mt-3">
                <label for="overview" class="form-label text-body h4">Overview:</label>
                <textarea class="form-control" id="overview" placeholder="Enter overview"
                    name="overview">{{ $product['overview'] }}</textarea>
            </div>

            <div class="mb-3 mt-3">
                <label for="content" class="form-label text-body h4">Content:</label>
                <textarea class="form-control" id="content" rows="4" placeholder="Enter content"
                    name="content">{{ $product['content'] }}</textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection