<?php
require_once("idiorm.php");

    
    ORM::configure('mysql:host=localhost;dbname=exemplo');
    ORM::configure('username', 'root');
    ORM::configure('password', 'root');

    $database = ORM::get_db();

?>