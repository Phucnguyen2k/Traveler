<?php

class DB
{
    private static $instance = NULl;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=travelerdb', 'root', '');
                // self::$instance = new PDO('mysql:host=sql109.infinityfree.com;dbname=if0_36259204_travelerdb', 'if0_36259204', '091316425p');
                self::$instance->exec("SET NAMES 'utf8'");
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        return self::$instance;
    }
}