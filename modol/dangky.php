<?php
function insert_dk($name, $password, $email, $address, $sdt, $gender, $date, $role)
{
    $sql = "INSERT INTO `taikhoan`( `user`, `pass`, `email`, `address`, `tel`, `date`, `gender`,`role`) VALUES ('$name', '$password', '$email', '$address', '$sdt', '$date', '$gender','$role')";
    insertdb($sql);
}
function checkdb_dk_name($name)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM `taikhoan` WHERE user='$name'");
    $sql->execute();
    return $sql;
}
function checkdb_dk_email($email)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM `taikhoan` WHERE email='$email'");
    $sql->execute();
    return $sql;
}
function checkdb_dn_name($name_dn, $password_dn)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM `taikhoan` WHERE user='$name_dn' AND pass = '$password_dn'");
    $sql->execute();
    if (empty($name_dn) || empty($password_dn)) {
        echo '';
    } else {
        if ($sql->rowCount() > 0) {
            $_SESSION['user'] = $_POST['name_dn'];
            $loadtk = loadtk($name_dn);
            $_SESSION['role'] = $loadtk[0]['role'];

            foreach ($loadtk as $iduser) {
            }
            $_SESSION['iduser'] =  $iduser['id'];
            $_SESSION['dem_cart'] = dem_sp_cart($_SESSION['iduser']);
            header("Location: index.php?act=dangnhap");
        } else {
            echo "<i class='fas fa-exclamation-triangle' style='color: #eae31f;'></i> Tài khoản hoặc mật khẩu không chính xác";
        }
    }
}
function loadtk($key = '')
{
    $sql = "SELECT * FROM `taikhoan`";
    if ($key != '') {
        $sql .= "WHERE user LIKE '%$key%'";
    }
    $loadtk = getdb($sql);
    return $loadtk;
}
function delete_tk($id)
{
    $sql = "DELETE FROM `taikhoan` WHERE id=$id";
    insertdb($sql);
}
function check_name($name_dn)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM `taikhoan` WHERE user='$name_dn'");
    $sql->execute();
    if ($sql->rowCount() == 0) {
        return 'Tài khoản không tồn tại';
    }
}

function sendMail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email='$email'";
    $taikhoan = getdb($sql);

    if ($taikhoan != false) {
        sendMailPass($email, $taikhoan[0]['user'], $taikhoan[0]['pass']);

        return "Gửi email thành công";
    } else {
        return "Email bạn nhập ko có trong hệ thống";
    }
}
function sendMailPass($email, $username, $pass)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '1f55fd4ebd3276';                     //SMTP username
        $mail->Password   = '4d1d01e6e98b27';                               //SMTP password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duanmau2023@example.com', 'DuAnMau');
        $mail->addAddress($email, $username);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Lay lai mat khau';
        $mail->Body    = 'Mat khau cua ban la: ' . $pass;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function update_user($name, $password, $date, $gender, $email, $address, $sdt, $id,$role)
{
    $sql = "UPDATE `taikhoan` SET `user`='$name',`pass`='$password',`email`='$email',`address`='$address',`tel`='$sdt',`date`='$date',`gender`='$gender',`role`='$role' WHERE id = $id";
    insertdb($sql);
}
function select_user_id($id)
{
    $sql = "SELECT * FROM `taikhoan` WHERE id = $id";
    return getdb($sql);
}
