<?php  // IDEA:

require_once("./config/db.class.php");

class Category
{
    public $cateID;
    public $categoryName;

    public $desc;


    public function __construct($cateID, $categoryName, $desc)
    {
        $this->cateID = $cateID;
        $this->categoryName = $categoryName;
        $this->desc = $desc;
    }
    // lưu sản phẩm
    public function save()
    {
        $db = new Db();
        // thêm category vào CSDL
        $sql = "INSERT INTO Product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES
        ('$this ->productName','$this-> cateID','$this->price','$this->quantity','$this->description','$this -> picture') ";

        $result = $db->query_execute($sql);
        return $result;
    }

    // lấy ds sản phẩm
    public static function list_category()
    {
        $db = new Db();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);

        return $result;
    }
}
