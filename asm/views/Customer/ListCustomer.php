<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Khách hàng</title>
</head>
<body class="container text-center">
<h1>Danh sách khách hàng</h1>

<a href="index.php?url=add-customer"><button type="button" class="btn btn-primary">Thêm khách hàng</button></a>

    <table class="table table-bordered m-3">
        <thead>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>

            <th></th>
            <th></th>
        </thead>

            <?php foreach($customers as $cuss) {
                extract ($cuss);
                $editcus = "index.php?url=edit-customer&id=" . $id;
                $delcus = "index.php?url=del-customer&id=" . $id;
                ?>
                <tbody>
                    <td><?= $cuss['id'] ?></td>
                    <td><?= $cuss['name'] ?></td>
                    <td><?= $cuss['email'] ?></td>
                    <td><?= $cuss['phone'] ?></td>

                    <td><a href="<?= $editcus; ?>"><button type="button" class="btn btn-secondary">Sửa</button></a></td>
                    <td><a href="<?= $delcus; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></a></td>
                </tbody>
            <?php } ?>
        <tr>

        </tr>
    </table>


</body>
</html>
