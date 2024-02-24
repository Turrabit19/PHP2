@extends('layout.main')
@section('content')
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        @foreach($_SESSION['errors'] as $errors)
            <span style="color: red">{{ $errors }}</span>
            <br>
        @endforeach
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span style="color: green">{{ $_SESSION['success'] }}</span>
    @endif
    <form action="{{ route('edit-teacher/' . $teacher->id) }}" method="post">
        <label for="">Tên giảng viên</label>
        <input type="text" name="name" id="" value="{{ $teacher->name }}">
        <br>
        <label for="">Email giảng viên</label>
        <input type="text" name="email" id="" value="{{ $teacher->email }}">
        <br>
        <label for="">Lương giảng viên</label>
        <input type="number" name="salary" id="" value="{{ $teacher->salary }}">
        <br>
        <label for="">Nơi làm việc</label>
        <input type="text" name="school" id="" value="{{ $teacher->school }}">
        <br>

        <input type="submit" name="edit" id="" value="Chỉnh sửa">
    </form>
@endsection