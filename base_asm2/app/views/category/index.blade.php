@extends('layout.main')
@section('content')
    @if (count($categories) > 0)
    <table class="table table-bordered m-3">
        <thead>
        <th>ID</th>
        <th>Tên</th>

        <th></th>
        <th></th>
        </thead>

        @foreach($categories as $cgrs)
        <tbody>
        <td>{{ $cgrs->id }}</td>
        <td>{{ $cgrs->name }}</td>

        <td><a href="{{ route("detail-category/" . $cgrs->id) }}"><button type="button" class="btn btn-secondary">Sửa</button></a></td>
        <td><a href="{{ route("delete-category/" . $cgrs->id) }}"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></a></td>
        </tbody>
        @endforeach
    </table>
    @endif

    <a href="{{ route("add-category") }}"><button type="button" class="btn btn-primary m-5">Thêm danh mục</button></a>
@endsection
