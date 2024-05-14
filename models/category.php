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

    static function listCategories($sql)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query($sql);

        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $list[] = new Category($item['id'], $item['title']);
        }

        return $list;
    }
    static function all()
    {
        $sql = 'SELECT * FROM categories order by id desc';
        return Category::listCategories($sql);
    }


    static function categoriesTag()
    {
        $sql = 'SELECT categories.id, categories.title
                FROM categories';
        return Category::listCategories($sql);

    }
    static function filter() {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM categories');
        $list = $req->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    static function get($id)
    {
        $sql = 'SELECT * FROM categories WHERE id = ' . $id;
        $db = DB::getInstance();
        $req = $db->query($sql);
        $item = $req->fetch(PDO::FETCH_ASSOC);
        return new Category($item['id'], $item['title']);
    }

    //CRUD
    static function save($category)
    {
        $sql = "UPDATE categories SET title=? WHERE id=?";
        $db = DB::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute([$category->title, $category->id]);
    }

    static function add($title)
    {
        $sql = 'INSERT INTO categories (title) VALUES (:title)';
        $database = DB::getInstance();
        $statement = $database->prepare($sql);
        $statement->execute(['title' => $title]);
    }

    static function delete($id)
    {
        $sql = 'DELETE FROM categories WHERE id = :id';
        $db = DB::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}