<?php
class Member 
{
    public $id;
    public $name;
    public $avatar;

    function __construct($id, $Name, $Avatar)
    {
        $this->id = $id;
        $this->name = $Name;
        $this->avatar = $Avatar;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM members');

        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $list[] = new Member($item['id'], $item['name'], $item['avatar']);
        }

        return $list;
    }
    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM members WHERE id = ' . $id);
        $item = $req->fetch(PDO::FETCH_ASSOC);

        return new Member($item['id'], $item['name'], $item['avatar']);
    }

    static function add($member)
    {
        $db = DB::getInstance();
        $req = $db->prepare('INSERT INTO members (name, avatar) VALUES (:name, :avatar)');
        $req->execute([
            'name' => $member->name,
            'avatar' => $member->avatar
        ]);
    }

    static function edit($member)
    {
        $db = DB::getInstance();
        $req = $db->prepare('UPDATE members SET name = :name, avatar = :avatar WHERE id = :id');
        $req->execute([
            'id' => $member->id,
            'name' => $member->name,
            'avatar' => $member->avatar
        ]);
    }

    static function delete($member)
    {
        $db = DB::getInstance();
        $req = $db->prepare('DELETE FROM members WHERE id = :id');
        $req->execute([
            'id' => $member
        ]);
    }
}
