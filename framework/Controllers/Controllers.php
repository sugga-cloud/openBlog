<?php

namespace framework\Controllers;
use framework\utility\Template;
use framework\DataBase\SQLite as db;

class Controllers extends Template{
    private $comment;
    function index($req){
        $db = new db($_ENV['SQLITE_DB_NAME']);
        $rows = $db->table('blogs')->get();       
        return $this->view("index",["blogs"=>$rows]);
    }

    function blog($req){
        $db = new db($_ENV['SQLITE_DB_NAME']);
        $rows = $db->table('blogs')->where("blog_id","=",$req["id"])->get();
        $rowc = $db->table('comment')->where("blog_id","=",$req["id"])->get();
        return $this->view("blog",["blog"=>$rows[0],"comment"=>$rowc]);
    }

    function admin($req){
        return $this->view("admin",['login'=>false,'try'=>0]);
    }

    function auth($req){
        $username = $req['username'];
        $password = $req['password'];
        if($username=="root" && $password=="password"){
            return $this->view("admin",['login'=>true]);
        }
        return $this->view("admin",['login'=>false,'try'=>1]);
    }

    function post($req){
        $db = new db($_ENV['SQLITE_DB_NAME']);
        $title = $req['title'];
        $content = $req['content'];
        $file_path = $req['thumbnail']['tmp_name'];
        $name = $req['thumbnail']['name'];
        $dest = $_SERVER["DOCUMENT_ROOT"].$_ENV['UPLOAD_DIR'].$name;
        $url = $_ENV['BASE_URL'].$_ENV['UPLOAD_DIR'].$name;
        $id = count($db->table("blogs")->get());
        $db->table("blogs")->insert(["blog_id"=>$id+1,"title"=>$title,"url"=>$url,"content"=>$content]);
        move_uploaded_file($file_path,$dest);
        return $this->view("admin",['login'=>true]);
    }

    function comment($req){
        $id = $req['id'];
        $comment = $req['message'];
        if(isset($_COOKIE['comment']) && $_COOKIE['comment']==$comment){
            return $this->blog($req);
        }
        // $this->comment=$comment;
        setcookie("comment",$comment,time() + (86400 * 30));
        $db = new db($_ENV['SQLITE_DB_NAME']);
        $db->table("comment")->insert(["blog_id"=>$id,"comment"=>$comment]);
        return $this->blog($req);
    }

}