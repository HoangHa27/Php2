@extends('layouts.master')

@section('title')
Thêm mới Danh mục
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
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="main-title">
            <h1 class="m-0">Thêm Mới </h1>
        </div>
    </div>
</div>
<form action="{{ url('admin/categorys/store') }}" method="POST">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Id:</label>
        <input type="text" class="form-control" id="id" placeholder="Enter name" name="id" readonly>
    </div>
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>


</div>
@endsection