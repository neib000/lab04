<?php
require_once("./entities/product.class.php");
require_once("./entities/category.class.php");
?>
<?php
if (isset($_POST["btnsubmit"])) {
    //lấy giá trị từ form collection
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtPrice"];
    $quantity = $_POST["txtQuantity"];
    $description = $_POST["txtDesc"];
    $picture = $_POST["txtPic"];
   // $picture =$_FILES["txtpic"];

    // khởi tạo đối tượng product
    $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
    // lưu xuống CSDL
    $result = $newProduct->save();
    if (!$result) {
        //truy vấn lỗi
        header("Location: add_product.php?failure");
    } else {
        header("Location: add_product.php?inserted");
    }
}
?>
<?php include_once("header.php"); ?>

<?php
if (isset($_GET["inserted"])) {
    echo "<h2> Thêm sản phẩm thành công! </h2>";
}
?>
<!-- form sản phẩm -->
<div class="container">
    <form method="post" > 
    <!-- enctype=”multipart/form-data -->

        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

        <!-- tên sản phẩm -->

        <div class="form-group">

            <label> Tên sản phẩm </label>
            <input type="text" class="form-control" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
        </div>
        <!-- mô tả sản phẩm -->
        <div class="form-group">
            <label> Mô tả sản phẩm </label>
            <textarea name="txtDesc" class="form-control" cols="21" form-groups="5" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : ""; ?> "></textarea>
        </div>

        <!-- số lượng sản phẩm -->
        <div class="form-group">
            <label> Số lượng sản phẩm</label>
            <input type="number" class="form-control" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : ""; ?>" />
        </div>
        <!-- giá sản phẩm -->
        <div class="form-group">
            <label> Giá sản phẩm</label>
         <input type="number" class="form-control" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : ""; ?>" />
        </div>
        <!-- loại sản phẩm -->
        <div class="form-group">
            <label> Loại sản phẩm</label>
            <select name="txtCateID" class="form-control" value="<?php echo isset($_POST["txtCateID"]) ? $_POST["txtCateID"] : ""; ?>">
                <?php
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                $category =  Category::list_category();
                foreach ($category as $item) {
                    echo "<option value='" . $item["CateID"] . "'>" . $item["CategoryName"] . "</option>";
                }
                ?>
            </select>
        </div>
        <!-- hình ảnh -->
        <div class="form-group">
            <label> Hình ảnh</label>
            <input type="text" class="form-control" name="txtPic" value="<?php echo isset($_POST["txtPic"]) ? $_POST["txtPic"] : ""; ?>" />
        </div>

            <!-- <div class="row">
                <div class="lbltitle">
                    <label>Đường dẫn hình</label>
                
                </div>
                <div class="lblinput">
                    <input type="file" name="txtpic" id="txtpic" accept=".PNG,.GIF,.JPG">
                </div>
            </div> -->
        <div class="form-group">
            <!-- nút gửi form -->

            <input type="submit" class="btn btn-primary" name="btnsubmit" value="Thêm sản phẩm" />

        </div>




    </form>
</div>


<?php include_once("footer.php"); ?>
<!-- Thêm dữ liệu mẫu vào bảng Category -->