<?php
require_once ('models/member.php');
class Category
{
    public $id;
    public $title;
    public $amount;

    function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories order by id desc');

        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $amount = isset($item['amount']) ? $item['amount'] : null;
            $list[] = new Category($item['id'], $item['title'],$amount);
        }

        return $list;
    }

    static function add($title)
    {
        $database = DB::getInstance();
        $query = 'INSERT INTO categories (title) VALUES (:title)';
        $statement = $database->prepare($query);
        $statement->execute(['title' => $title]);
    }

    static function delete($id)
    {
        $db = DB::getInstance();
        $query = 'DELETE FROM categories WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->execute(['id' => $id]);
    }


    static function categoriesTag()
    {
        $list = [];
        $db = DB::getInstance();

        $req = $db->query('SELECT categories.id, categories.title, COUNT(*) as amount 
                           FROM categories LEFT JOIN posts ON categories.id = posts.categoryid 
                           GROUP BY categories.id, categories.title'
                            );

  
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
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories WHERE id = ' . $id);
        
        if ($req) {
            $item = $req->fetch();
            if ($item) {
                $amount = isset($item['amount']) ? $item['amount'] : null;
                return new Category($item['id'], $item['title'], $amount);
            } else {
                return null; // hoặc trả về một giá trị mặc định khác
            }
        } else {
            return null; // hoặc trả về một giá trị mặc định khác
        }
    }

    static function save($category)
    {
        $db = DB::getInstance();
        $sql = "UPDATE categories SET title=? WHERE id=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$category->title, $category->id]);
    }

}