<?php
class Member
{
    public $id;
    public $Name;

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
}
