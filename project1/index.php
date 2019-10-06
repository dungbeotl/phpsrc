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

<body>
    <h1> kdjasdlasd </h1>
    <br>
    <?php
    echo "Dang beo";
    $x = 5; //field
    $y = 6;
    $txt1 = "Dang";
    $txt2 = "Anh";
    $txt3 = "Beo";
    echo "<h2>" . $txt1 .   $txt2 . " ??????????" . $txt3 . "</h2>"; // . de nối chhuỗi
    echo $y + $x;   // echo sum x+y
    echo ("<br>"); //in ra xuong hang
    echo strlen("Dang ANh DUng"); //ouput length
    echo ("<br>");
    echo strrev("Dang anh dung"); //Reverse String(đảo ngược chuỗi)
    $oldString = "Dang Anh Beo";
    echo ("<br>");
    $newString = str_replace("Beo", "Dung", $oldString); // đổi chuỗi Beo thành Dung (Replace)
    echo ("$newString");
    echo ("<br>");
    var_dump($x == $y);
    if ($x != $y) {
        echo "$x bang $y";
    }
    ?>
</body>

</html>