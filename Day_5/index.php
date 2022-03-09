<?php

session_start();

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require_once("vendor/autoload.php");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    "driver" => _driver_,
    "host" => _host_,
    "database" => _database_,
    "username" => _username_,
    "password" => _password_,
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

if (!isset($_GET["id"])) {
    //if there is an index (url) and number and not negative
    $index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
    //stop the next from going out bounds and reset to 0 if
    $next_index = ( $index + _page_size_ >= 20)? 0 : $index+_page_size_;
    $next_link = "http://localhost/labs/Day_5/?index=$next_index";

    //previous stop if lower than 0
    $previous_index = (($index - _page_size_) >= 0) ? $index - _page_size_ : _max_pages_index_;
    $previous_link = "http://localhost/labs/Day_5/?index=$previous_index";

    $all_items = Capsule::table("items")->skip($index)->take(_page_size_)->get();
    require_once("views/items.php");
} else if (isset($_GET["id"])) {
    $item = Capsule::table("items")->find((int)$_GET["id"]);
    require_once("views/item.php");
}

