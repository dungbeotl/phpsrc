<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/book.php") ?>
<?php

$lsFromFileData = Book::getList();
#Code bài số 4
//include_once("model/book.php");
//$book::Book();
//$book->display();
// $listBook = $Book::getList();
//var_dump($list);

?>

<button type="button" class="btn btn-outline-primary mr-3 mt-3 float-md-right">Thêm</button>

<table class="table">

    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sách</th>
            <th scope="col">Giá</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Năm xuất bản</th>
            <th scope="col">Thao Tác</th>

        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($lsFromFileData as $key => $value) {

            ?>
            <tr>

                <td><?php echo $key; ?></td>
                <td><?php echo $value->title; ?></td>
                <td><?php echo $value->price; ?></td>
                <td><?php echo $value->author; ?></td>
                <td><?php echo $value->year; ?></td>
                <td>
                    <button type="button" class="btn btn-outline-primary">Sửa</button>
                    <button type="button" class="btn btn-outline-success ">Xóa
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>

    </tbody>

    <?php include_once("footer.php") ?>