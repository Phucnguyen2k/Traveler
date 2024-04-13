<?php
require_once ('models/category.php');
require_once ('models/member.php');
class Category
{
    public $id;
    public $title;

    function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Category($item['id'], $item['title']);
        }

        return $list;
    }


    static function categoriesTag()
    {
        $list = [];
        $db = DB::getInstance();

        $req = $db->query('SELECT categories.title, COUNT(*) as "Amount" FROM categories INNER JOIN posts ON categories.id = posts.categoryid GROUP BY title');


        foreach ($req->fetchAll() as $item) {
            $list[] = new Category(
                $item['title'],
                $item['Amount']
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
                return new Category($item['id'], $item['title']);
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
