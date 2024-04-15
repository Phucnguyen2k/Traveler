<?php
require_once ('models/category.php');
require_once ('models/member.php');
class Category
{
    public $id;
    public $title;
    public $amount;

    function __construct($id, $title, $amount)
    {
        $this->id = $id;
        $this->title = $title;
        $this->amount = $amount;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories');

        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $amount = isset($item['amount']) ? $item['amount'] : null;
            $list[] = new Category($item['id'], $item['title'],$amount);
        }

        return $list;
    }


    static function categoriesTag()
    {
        $list = [];
        $db = DB::getInstance();

        $req = $db->query('SELECT categories.id, categories.title, COUNT(*) as amount FROM categories INNER JOIN posts ON categories.id = posts.categoryid GROUP BY categories.id, categories.title');

  
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {

            $list[] = new Category(
                $item['id'],
                $item['title'],
                $item['amount']
            );
        }

        return $list;

    }
    static function filter() {
        $listCate = [];
        $db = DB::getInstance();

        $req = $db->query('SELECT * FROM categories');
        $listCate = $req->fetchAll();
        
        return $listCate;
    }

    static function get($id)
    {
        // $db = DB::getInstance();
        // $req = $db->query('SELECT * FROM categories WHERE id = ' . $id);
        // $item = $req->fetch();
        // return new Category($item['id'], $item['title']);
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories WHERE id = ' . $id);
        
        // Kiểm tra xem truy vấn có trả về kết quả không
        if ($req) {
            $item = $req->fetch();
            // Kiểm tra xem có dữ liệu trả về không
            if ($item) {
                $amount = isset($item['amount']) ? $item['amount'] : null;
                return new Category($item['id'], $item['title'], $amount);
            } else {
                // Trả về giá trị mặc định hoặc xử lý lỗi khác
                return null; // hoặc trả về một giá trị mặc định khác
            }
        } else {
            // Xử lý lỗi nếu có
            return null; // hoặc trả về một giá trị mặc định khác
        }
    }

}
