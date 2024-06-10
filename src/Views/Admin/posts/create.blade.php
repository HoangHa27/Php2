@extends('layouts.master')

@section('title')
Thêm mới Sản phẩm
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
            <h1 class="m-0">Thêm Mới Bài Viết</h1>
        </div>
    </div>
</div>
<form action="{{ url('admin/posts/store') }}" enctype="multipart/form-data" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 mt-3">
                <label for="category_id" class="form-label text-body h4">Category:</label>

                <select name="category_id" id="category_id" class="form-select">
                    @foreach ($categoryPluck as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="name" class="form-label text-body h4">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="img_thumbnail" class="form-label text-body h4">Img:</label>
                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img"
                    name="image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 mt-3">
                <label for="overview" class="form-label text-body h4">Review:</label>
                <textarea class="form-control" id="review" placeholder="Enter review" name="review"></textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="content" class="form-label text-body h4">Content:</label>
                <textarea class="form-control" id="content" rows="4" placeholder="Enter content"
                    name="content"></textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-5">Submit</button>
</form>
@endsection