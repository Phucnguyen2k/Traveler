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
        $sql = 'SELECT * FROM members';
        $list = [];
        $db = DB::getInstance();
        $req = $db->query($sql);

        foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $item) {
            $list[] = new Member($item['id'], $item['name'], $item['avatar']);
        }

        return $list;
    }
    static function get($id)
    {
        $sql = 'SELECT * FROM members WHERE id = ' . $id;
        $db = DB::getInstance();
        $req = $db->query($sql);
        $item = $req->fetch(PDO::FETCH_ASSOC);
        return new Member($item['id'], $item['name'], $item['avatar']);
    }

    //CRUD
    static function add($member)
    {
        $sql = 'INSERT INTO members (name, avatar) VALUES (:name, :avatar)';
        $db = DB::getInstance();
        $req = $db->prepare($sql);
        $req->execute([
            'name' => $member->name,
            'avatar' => $member->avatar
        ]);
    }

    static function edit($member)
    {
        $sql = 'UPDATE members SET name = :name, avatar = :avatar WHERE id = :id';
        $db = DB::getInstance();
        $req = $db->prepare($sql);
        $req->execute([
            'id' => $member->id,
            'name' => $member->name,
            'avatar' => $member->avatar
        ]);
    }

    static function delete($member)
    {
        $sql = 'DELETE FROM members WHERE id = :id';
        $db = DB::getInstance();
        $req = $db->prepare($sql);
        $req->execute([
            'id' => $member
        ]);
    }
}
