<?php  // IDEA:

require_once("./config/db.class.php");

class Product
{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture)
    {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity  = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }
    // lưu sản phẩm
    public function save()
    {
        //xử lí upload hình ảnh
        // $file_temp = $this -> picture['tmp_nam'];
        // $user_file = $this -> picture['name'];
        // $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
        // $filepath ="uploads/".$timestamp.$user_file;
        // if(move_uploaded_file($file_temp, $filepath) ==false)
        // {
        //     return false;
        // }
        $db = new Db();
        // thêm sản phẩm vào CSDL

        $sql = "INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES (NULL, '$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$this->picture')";

        $result = $db->query_execute($sql);
        return $result;
    }

    // lấy ds sản phẩm
    public static function list_product()
    {
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
