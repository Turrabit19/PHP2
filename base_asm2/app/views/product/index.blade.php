@extends('layout.main')
@section('content')
    @if (count($products) > 0)
        <table class="table table-bordered m-3">
            <thead>
            <th>ID</th>
            <th>Tên</th>
            <th class="w-50">Ảnh</th>
            <th>Giá</th>
            <th>Mô tả</th>

            <th></th>
            <th></th>
            </thead>

            @foreach($products as $pros)
                <tbody>
                <td>{{ $pros->id }}</td>
                <td>{{ $pros->name }}</td>
                <td><img src="{{BASE_URL}}public/images/{{ $pros->img }}" class='w-25 rounded'></td>
                <td>{{ number_format($pros->price) }}₫</td>
                <td>{{ $pros->des }}</td>

                <td><a href="{{ route('detail-product/' . $pros->id) }}"><button type="button" class="btn btn-secondary">Sửa</button></a></td>
                <td><a href="{{ route('delete-product/' . $pros->id) }}"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></a></td>
                </tbody>
            @endforeach
        </table>
    @endif

<a href="{{ route('add-product') }}"><button type="button" class="btn btn-primary m-5">Thêm sản phẩm</button></a>
@endsection
