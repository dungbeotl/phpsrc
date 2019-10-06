<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>
<?php include_once("model/book.php") ?>
<?php

// xu ly add
if ($_REQUEST['action'] == 'add') {
    if ($_REQUEST['id'] && $_REQUEST['title'] && $_REQUEST['price'] && $_REQUEST['author'] && $_REQUEST['year']) {
        Book::add($_REQUEST['id'], $_REQUEST['title'], $_REQUEST['price'], $_REQUEST['author'], $_REQUEST['year']);
    }
}
// xu ly request del
if ($_REQUEST['action'] == 'delete') {
    Book::delete($_REQUEST['id']);
}
//xu ly request edit
if ($_REQUEST['action'] == 'edit') {
    if ($_REQUEST['id'] && $_REQUEST['title'] && $_REQUEST['price'] && $_REQUEST['author'] && $_REQUEST['year']) {
        Book::edit($_REQUEST['id'], $_REQUEST['title'], $_REQUEST['price'], $_REQUEST['author'], $_REQUEST['year']);
    }
}
$lsFromFileData = Book::getListFromFile();
#Code bài số 4
//     include_once("model/book.php");
//     $book::Book();
//     $book->display();
//     $listBook = $Book::getList();
// var_dump($list);
//xac nhan yeu cau khi chon tim kiem voi name=search

$keyWord = null;
$keyWord = $_REQUEST['search'];
$lsFromFileData = Book::getListFile2($keyWord);
?>
<div class="container pt-5">
    <div class="modal" id="form-add">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm thôgn tin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" type="text" name="id">
                        </div>
                        <div class="form-group">
                            <label>Tên Sách</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" type="number" name="price">
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input class="form-control" type="text" name="author">
                        </div>
                        <div class="form-group">
                            <label>Năm xuất bản</label>
                            <input class="form-control" type="text" name="year">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="container">
        <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#form-add"><i class="fas fa-plus-circle"></i> Thêm</button>
        <form action="" method="GET" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input name="search" type="text" value="<?php echo $keyWord; ?>" class=" form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div>
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

                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $value->title ?></td>
                        <td><?php echo $value->price . "$" ?></td>
                        <td><?php echo $value->author ?></td>
                        <td><?php echo $value->year ?></td>
                        <td>
                            <div class="modal" id="form-edit-<?php echo $value->id ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">form edit with id: <?php echo $value->id ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="action" value="edit">
                                                <input type="hidden" name="id" value="<?php echo $value->id ?>">
                                                <div class="form-group">
                                                    <label>title</label>
                                                    <input class="form-control" type="text" value="<?php echo $value->title ?>" name="title">
                                                </div>
                                                <div class="form-group">
                                                    <label>price</label>
                                                    <input class="form-control" type="number" value="<?php echo $value->price ?>" name="price">
                                                </div>
                                                <div class="form-group">
                                                    <label>author</label>
                                                    <input class="form-control" type="text" value="<?php echo $value->author ?>" name="author">
                                                </div>
                                                <div class="form-group">
                                                    <label>year</label>
                                                    <input class="form-control" type="text" value="<?php echo $value->year ?>" name="year">
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#form-edit-<?php echo $value->id ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                            <form action="" style=" display: inline-block;" method="POST">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $value->id ?>">
                                <button class="btn btn-outline-success "><i class="far fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <?php include_once("footer.php") ?>