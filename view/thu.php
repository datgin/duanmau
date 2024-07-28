<?php
function validate($name, $pass)
{
    $error = [];
    if (empty($name)) {
        $error['name'] = 'Ten khong dc trong';
    } else if (strlen($name) < 8) {
        $error['name'] = 'Khong du 8 ky tu';
    }
    if (empty($pass)) {
        $error['pass'] =  'pass khong dc trong';
    }
    return $error;
}
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $error = validate($name, $pass);
    echo empty($error) ? 'dang nhap thanh cong' : 'dang nhap that bai';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" id="">
        <span><?= isset($error['name']) ? $error['name'] : '' ?></span><br>
        <input type="password" name="pass" id="">
        <span><?= isset($error['pass']) ? $error['pass'] : '' ?></span><br>
        <input type="submit" value="dang nhap" name="btn">
    </form>
</body>

</html>
