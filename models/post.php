<?php
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

    public function __construct($id, $title, $picture, $content, $categoryid, $datecreated, $createdby)
    {
        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->content = $content;
        $this->categoryid = $categoryid;
        $this->datecreated = date_create($datecreated);
        $this->createdby = $createdby;
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
}
