<?php
namespace Web;
use PDO;

class db
{
    public $conn;// tạo ra biến kết nối

// tạo kết nối từ project php sang mysql
    public function __construct()
    {
        $this->conn = $this->getConnect();
    }

    public function getConnect()
    {
        return new PDO("mysql:host=" . DBHOST
            . ";dbname=" . DBNAME
            . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }
// nếu như không truyền gì sẽ dùng cho câu lệnh truy vấn có dạng select
// nếu truyền getAll = false sẽ dùng cho câu truy vấn có dạng thêm sửa xóa
    public function getData($query,$data = [''], $getAll = true)
    {
        $stmt = $this->conn->prepare($query);
        if($getAll === 'add' || $getAll === 'update'){
            $stmt->execute($data);
            return $this->conn->lastInsertId();
        }
        $stmt->execute();
        if ($getAll) {
            return $stmt->fetchAll();
        }
        return $stmt->fetch();
    }
}

?>