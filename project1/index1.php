<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
<?php
$maSinhVien = $ho = $ten = $ngaySinh = $email = "";
//var_dump($_SERVER); //mo bien ra xem chua cai gi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho = $_REQUEST["txtHosinhvien"];
    $ten = $_REQUEST["txtTensinhvien"];
    $ngaySinh = $_REQUEST["daNgaySinh"];
    $email = $_REQUEST["emailSinhVien"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    //lọc xem email có đsung không
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "thành công!!!";
    } else {
        echo "bạn nhập không đúng định dạng của Email";
    }
    // var_dump($_FILES);//mở biến xem
    if ($_FILES["fileAnhdaidien"]["name"] != "")
        move_uploaded_file($_FILES["fileAnhdaidien"]["tmp_name"], "upload/avatar.jpg");
}
?>

<body>

    <form method="post" enctype="multipart/form-data">
        <div>
            <div>
                <table>Ma sinh vien</table>
            </div>
            <div>
                <input required type="text" name="txtMasinhvien" value="<?php echo $maSinhVien; ?>">
            </div>
            <div>
                <table>Ho sinh vien</table>
            </div>
            <div>
                <input required type="text" name="txtHosinhvien" value="">
            </div>
            <div>
                <table>Ten sinh vien</table>
            </div>
            <div>
                <input required type="text" name="txtTensinhvien" value="">
            </div>
            <div>
                <table>Ngay sinh sinh vien</table>
            </div>
            <div>
                <input required type="date" name="daNgaySinh" value="">
            </div>
            <div>
                <table>Email sinh sinh vien</table>
            </div>
            <div>
                <input required type="email" name="emailSinhVien" value="">
            </div>
            <div>
                <table>Anh dai dien sinh vien</table>
            </div>
            <div>
                <input type="file" name="fileAnhdaidien" value="">
            </div>
            <div>
                <br>
            </div>
            <div>
                <input type="submit" name="bntSave" value="Save">
            </div>
        </div>

    </form>
</body>

</html>