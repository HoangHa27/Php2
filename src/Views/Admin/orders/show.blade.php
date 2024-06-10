@extends('layouts.master')

@section('title')
    Xem chi tiết: {{ $orders['name'] }}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá Trị</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($order as $key => $value)
               <tr>
                <td>{{$key}}</td>
                <td>{{$value}}</td>
               </tr>
           @endforeach
        </tbody>
    </table>
@endsection

