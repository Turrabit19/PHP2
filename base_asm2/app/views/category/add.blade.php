@extends('layout.main')
@section('content')
    <form action="{{ route("post-category") }}" method="POST" class="m-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
            <label for="floatingInput">Tên danh mục</label>
        </div>

        <br>
        <input class="btn btn-outline-success " type="submit" name="add" value="THÊM">

        <a href="{{BASE_URL}}home-category"><button type="button" class="btn btn-secondary">Danh sách</button></a>
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