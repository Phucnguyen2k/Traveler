<?php
require_once ('models/category.php');
require_once ('models/member.php');
class Post
{
    const TABLENAME = 'posts';

    public $id;
    public $title;
    public $picture;
    public $content;
    public $categoryid;
    public $datecreated;
    public $createdby;

    //object 
    public $category;
    public $member;

    public function __construct($id, $title, $picture, $content, $categoryid, $datecreated, $createdby)
    {
        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->content = $content;
        $this->categoryid = $categoryid;
        $this->datecreated = date_create($datecreated);
        $this->createdby = $createdby;
        $this->category = Category::get($categoryid);
        $this->member = Member::get($createdby);

    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Post(
                $item['id'],
                $item['title'],
                $item['picture'],
                $item['content'],
                $item['categoryid'],
                $item['datecreated'],
                $item['createdby']
            );
        }

        return $list;
    }

    static function get($postId)
    {
        $db = DB::getInstance();
        $query = 'SELECT * FROM posts WHERE id = :post_id';
        $stmt = $db->prepare($query);
        $stmt->execute(['post_id' => $postId]);
        $item = $stmt->fetch();

        return new Post(
            $item['id'],
            $item['title'],
            $item['picture'],
            $item['content'],
            $item['categoryid'],
            $item['datecreated'],
            $item['createdby']
        );
    }
    static function getRecent()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts ORDER by id desc  LIMIT 3');
        foreach ($req->fetchAll() as $item) {
            $list[] = new Post(
                $item['id'],
                $item['title'],
                $item['picture'],
                $item['content'],
                $item['categoryid'],
                $item['datecreated'],
                $item['createdby']
            );
        }

        return $list;
    }
}
