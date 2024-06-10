
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
<form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data" method="POST">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $user['name'] }}" name="name">
    </div>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user['email'] }}" name="email">
    </div>
    <div class="mb-3 mt-3">
        <label for="avatar" class="form-label">Avatar:</label>
        <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
        <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
    </div>
    <div class="mb-3 mt-3">
        <label for="password" class="form-label">Password:</label>
        <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection