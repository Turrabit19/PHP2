@extends('layout.main')
@section('content')
<form action="{{ route('post-product') }}" method="POST" enctype="multipart/form-data" class="m-3">
    <select class="form-select mb-3" aria-label="Default select example" name="idcgr">
        <option selected></option>
        @foreach ($categories as $cgrs) { ?>
        <option value="{{$cgrs->id}}">{{$cgrs->name}}</option>
        @endforeach
    </select>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
        <label for="floatingInput">Tên sản phẩm</label>
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile">Ảnh</label>
        <input type="file" class="form-control" id="inputGroupFile" name="img">
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="price" name="price">
        <label for="floatingInput">Giá sản phẩm</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="description" id="floatingTextarea" name="des"></textarea>
        <label for="floatingTextarea">Mô tả sản phẩm</label>
    </div>

    <br>
    <input class="btn btn-outline-success " type="submit" name="add" value="THÊM">

    <a href="{{ route('home-product') }}"><button type="button" class="btn btn-secondary">Danh sách</button></a>
</form>

@if (isset($_SESSION['success']) && isset($_GET['msg']))
    <span style="color: green">{{ $_SESSION['success'] }}</span>
@endif

@if (isset($_SESSION['errors']) && isset($_GET['msg']))
    @foreach ($_SESSION['errors'] as $error)
        <span style="color: red">{{ $error }}</span> <br/>
    @endforeach
@endif
@endsection