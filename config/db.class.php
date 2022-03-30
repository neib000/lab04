<?php //   IDEA:
class Db
{
    // biến kết nối CSDL
    protected static $connection;
    // hàm khởi tạo kết nối
    public function  connect()
    {
        // lấy thông tin kết nối từ tập tin config.inl
        if (!isset(self::$connection)) {
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["database"], $config["port"]);
            // echo ("Kết nối thành công!");
        }
        if (self::$connection == false) {
            // xữ lý ghi file tại đây
            echo ("Kết nối thất bại!");
            return false;
        }
        return self::$connection;
    }
    // xử lí lỗi nếu không kết nối được tới CSDL

    public function query_execute($queryString)
    {
        // khởi tạo kết nối
        $connection = $this->connect();
        // thực hiện excute truy vấn
        $connection -> query("SET NAMES utf8");
        $result  = $connection->query($queryString);
        $connection->close();
        return $result;
    }
    // hàm thực hiện trả về một mảng danh sách kết quả
    public function select_to_array($queryString)
    {
        $rows = array();
        $result = $this->query_execute($queryString);
        if ($result == false) return false;
        while ($item = $result->fetch_assoc()) {
            $rows[] = $item;
        }
        return $rows;
    }
}
