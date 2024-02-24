@extends('layout.main')
@section('content')
    @if (count($customers) > 0)
    <table class="table table-bordered m-3">
        <thead>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>

        <th></th>
        <th></th>
        </thead>

        @foreach($customers as $cuss)
        <tbody>
        <td>{{ $cuss->id }}</td>
        <td>{{ $cuss->name }}</td>
        <td>{{ $cuss->email }}</td>
        <td>{{ $cuss->phone }}</td>

        <td><a href="{{ route("detail-customer/" . $cuss->id) }}"><button type="button" class="btn btn-secondary">Sửa</button></a></td>
        <td><a href="{{ route("delete-customer/" . $cuss->id) }}"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></a></td>
        </tbody>
        @endforeach
    </table>
    @endif

    <a href="{{ route("add-customer") }}"><button type="button" class="btn btn-primary m-5">Thêm khách hàng</button></a>
@endsection
