@extends('layout.main')
@section('content')

    <form action="{{ route("edit-customer/" . $cus->id) }}" method="POST" class="m-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name" value="{{ $cus->name }}">
            <label for="floatingInput">Tên khách hàng</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email" value="{{ $cus->email }}">
            <label for="floatingInput">Email khách hàng</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="phone" name="phone" value="{{ $cus->phone }}">
            <label for="floatingInput">Số điện thoại khách hàng</label>
        </div>

        <br>
        <input class="btn btn-outline-success " type="submit" name="update" value="Cập nhật">

        <a href="{{ route("home-customer") }}"><button type="button" class="btn btn-secondary">Danh sách</button></a>
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
