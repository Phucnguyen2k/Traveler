<?php
class Member
{
    public $id;
    public $name;

    function __construct($id, $Name)
    {
        $this->id = $id;
        $this->name = $Name;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM members');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Member($item['id'], $item['name']);
        }

        return $list;
    }
    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM members WHERE id = ' . $id);
        $item = $req->fetch();
        return new Category($item['id'], $item['name']);
    }
}
