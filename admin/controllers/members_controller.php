<?php
require_once ('controllers/base_controller.php');
require_once('../models/member.php');

class MembersController extends BaseController
{
    function __construct()
    {
        $this->folder = 'members';
    }

    public function home()
    {
        $members = Member::all();
        $data = array('members' => $members);
        $this->render('home', $data);
    }

    public function add()
    {
        $this->render('add');
    }

    public function saveAdd()
    {
        $target_dir = "../assets/img/avatar/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

        $name = $_POST['name'];
        $avatar = $_FILES["avatar"]["name"];
        
        $member = new Member(null, $name, $avatar);

        Member::add($member);
        header("location:?controller=members&action=home");
    }

    public function edit()
    {
        $id = $_GET['id'];
        $member = Member::get($id);
        $data = array('member' => $member);
        $this->render('edit', $data);
    }

    public function saveUpdate()
    {
        $target_dir = "../assets/img/avatar/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $avatar = $_FILES["avatar"]["name"] ? $_FILES["avatar"]["name"] : $_POST['old_avatar'];
        
        $member = new Member($id, $name, $avatar);

        Member::edit($member);
        header("location:?controller=members&action=home");
    }

    public function delete(){
        $id = $_GET["id"];
        Member::delete($id);
        header("location: index.php?controller=members");
      }
}