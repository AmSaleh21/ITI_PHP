<?php

session_start();

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
    $index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && $_GET["index"] > 0) ? (int) $_GET["index"] : 0;
    $next_index = $index + _page_size_;
    $next_link = "http://localhost/labs/Day_4/?index=$next_index";
    $previous_index = (($index - _page_size_) >= 0) ? $index - _page_size_ : 0;
    $previous_link = "http://localhost/labs/Day_4/?index=$previous_index";

    $all_items = Capsule::table("items")->skip($index)->take(_page_size_)->get();

    require_once("views/items.php");
} else if (isset($_GET["id"])) {
    $item = Capsule::table("items")->find((int)$_GET["id"]);

    require_once("views/item.php");
}
