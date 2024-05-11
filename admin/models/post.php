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
    public $avatar;

    public function __construct($id, $title, $picture, $content, $categoryid, $datecreated, $createdby)
    {
        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->content = $content;
        $this->categoryid = $categoryid;
        $this->datecreated = date_create($datecreated);
        // $this->datecreated = ($datecreated);
        $this->createdby = $createdby;
        $this->category = Category::get($categoryid);
        $this->member = Member::get($createdby);
        $this->avatar = Member::get($createdby);
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts order by datecreated desc');
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
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return new Post(
            $item['id'],
            $item['title'],
            $item['picture'],
            $item['content'],
            $item['categoryid'],
            $item['datecreated'],
            $item['createdby'],
        );
    }
    static function getRecent()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts ORDER by id desc  LIMIT 3');
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
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

    static function filterCategory() {
        if(isset($_GET["filter"])) {
            $filterCategory = filterCategory();
        }
        $list = [];  
        
        $db = DB::getInstance();
        $query = 'SELECT * FROM posts WHERE categoryid = :category_id';
        $stmt = $db->prepare($query);
        $stmt->execute(['category_id' => $filterCategory]);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item) {
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

    static function allPostByCate($Categoryid)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts WHERE categoryid = '.$Categoryid);
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
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

    static function allPostByMember($MemberId)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts WHERE createdby = '.$MemberId);
        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
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

    //CRUD: POST
    static function saveNew($post)
    {
        $db = DB::getInstance();
        $query = 'INSERT INTO posts (title, picture, content, categoryid, datecreated, createdby) 
        VALUES (:title, :picture, :content, :categoryid, :datecreated, :createdby)';

        $stmt = $db->prepare($query);
        $stmt->execute([
            'title' => $post->title,
            'picture' => $post->picture,
            'content' => $post->content,
            'categoryid' => $post->category->id,
            'datecreated' => date('Y-m-d'),
            'createdby' => $post->member->id,
        ]);
    }
    static function update($post)
    {
        $db = DB::getInstance();
        $query = 'UPDATE posts 
                 SET title = :title, picture = :picture, content = :content, categoryid = :categoryid, datecreated = :datecreated, createdby = :createdby 
                 WHERE id = :post_id';
        $stmt = $db->prepare($query);
        $stmt->execute([
            'title' => $post->title,
            'picture' => $post->picture,
            'content' => $post->content,
            'categoryid' => $post->category->id,
            'datecreated' => date('Y-m-d'),
            'createdby' => $post->member->id,
            'post_id' => $post->id
        ]);
    }

    //Complete
    static function delete($id)
    {
        $db = DB::getInstance();
        $query = 'DELETE FROM posts WHERE id = :post_id';
        $stmt = $db->prepare($query);
        $stmt->execute(['post_id' => $id]);
    }
}
