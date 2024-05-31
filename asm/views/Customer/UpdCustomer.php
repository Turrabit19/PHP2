<?php
if (is_array($cus)) {
    extract($cus);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Cập nhật khách hàng</title>
</head>
<body class="container">
<h1 class="text-center">Cập nhật khách hàng</h1>
<form action="index.php?url=upd-customer" method="POST" enctype="multipart/form-data" class="m-3">

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name" value="<?= $name ?>">
        <label for="floatingInput">Tên khách hàng</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email" value="<?= $email ?>">
        <label for="floatingInput">Email khách hàng</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="phone" name="phone" value="<?= $phone ?>">
        <label for="floatingInput">Số điện thoại khách hàng</label>
    </div>

    <?php
    if (isset($thongbao) && ($thongbao != "")) { ?>
        <p class="text-center text-success"> <?= $thongbao ?></p>
    <?php } ?>

    <br>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input class="btn btn-outline-success " type="submit" name="update" value="Cập nhật">

    <a href="index.php?url=list-customer"><button type="button" class="btn btn-secondary">Danh sách</button></a>
</form>


</body>
</html>
