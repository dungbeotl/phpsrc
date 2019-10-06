<?php
class Book
{
    #Begin properties
    var $id;
    var $title;
    var $price;
    var $author;
    var $year;
    #end properties
    function __construct($id, $title, $price, $author, $year)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->author = $author;
        $this->year = $year;
    }
    #Member function
    function display()
    {
        echo "ID: " . $this->id . "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
    #Mock data
    /**
     * Lấy toàn bộ cuốn sách trong dữ liệu
     */
    static function getList()
    {
        $listBook = array();
        array_push($listBook, new Book(1, "OOp in php", 5, "ddung", 2019));
        array_push($listBook, new Book(2, "OOp in c++", 5, "nhoang", 2013));
        array_push($listBook, new Book(3,  "OOp in c#", 5, "hhung", 2016));
        array_push($listBook, new Book(4,  "OOp in java", 5, "hhue", 2019));
        array_push($listBook, new Book(5, "OOp in kotlin", 5, "nquy", 2012));

        return $listBook;
    }
    /**
     * Lấy dữ liệu từ file
     */
    static function getListFromFile()
    {
        $arrData = file("vendor/data/book.txt", FILE_SKIP_EMPTY_LINES);
        $listBook = array();
        // echo "<ul>";
        foreach ($arrData as $key => $value) {
            //     echo "<li>" . $value . "</li>";
            $arrItem = explode("#", $value);
            if (count($arrItem) == 5) {
                $book = new Book($arrItem[0], $arrItem[1], $arrItem[2], $arrItem[3], $arrItem[4]);
                array_push($listBook, $book);
            }
        };
        // echo "</ul>";
        return $listBook;
    }
    static function getListFile2($search = null)
    {
        $data = file("vendor/data/book.txt", FILE_SKIP_EMPTY_LINES);
        $arrBook = [];
        foreach ($data as $key => $value) {
            $row = explode("#", $value);
            if (
                strlen(strstr($row[0], $search)) ||
                strlen(strstr($row[1], $search)) ||
                strlen(strstr($row[2], $search)) ||
                strlen(strstr($row[3], $search)) ||
                strlen(strstr($row[4], $search)) ||
                $search == null
            ) {


                $arrBook[] = new Book($row[0], $row[1], $row[2], $row[3], $row[4]);
            }
        };
        return $arrBook;
    }
    static function add($id, $title, $price, $author, $year)
    {
        $data = Book::getList();
        $check = true;
        foreach ($data as $key => $value) {
            if ($value->id == $id) {
                $check = false;
            }
        }
        if ($check) {
            $myfile = fopen("vendor/data/book.txt", "a") or die("Unable to open file!");
            $row = $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year;
            fwrite($myfile, $row . "\n");
            fclose($myfile);
        }
    }
    static function delete($id)
    {
        $data = Book::getList();
        $data_res = [];
        foreach ($data as $key => $value) {
            if ($value->id != $id) {
                $data_res[] = $value;
            }
        }
        $text_write = "";
        $myfile = fopen("vendor/data/book.txt", "w") or die("Unable to open file!");
        foreach ($data_res as $key => $value) {
            $text_write .= $value->id . "#" . $value->title . "#" . $value->price . "#" . $value->author . "#" . $value->year;
        }
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
    static function edit($id, $title, $price, $author, $year)
    {
        $data = Book::getList();
        $check = true;
        $text_write = "";
        $myfile = fopen("vendor/data/book.txt", "w") or die("Unable to open file!");
        foreach ($data as $key => $value) {
            if ($value->id == $id) {
                $text_write .= $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year . "\n";
            } else {
                $text_write .= $value->id . "#" . $value->title . "#" . $value->price . "#" . $value->author . "#" . $value->year . "\n";
            }
        }
        fwrite($myfile, $text_write);
        fclose($myfile);
    }
}
