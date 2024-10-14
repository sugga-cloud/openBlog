<?php

use framework\Controllers\Controllers;

$router->get("/",[Controllers::class,"index"]);
$router->get("/blog",[Controllers::class,"blog"]);
$router->get("/admin",[Controllers::class,"admin"]);
$router->post("/admin-auth",[Controllers::class,"auth"]);
$router->post("/post",[Controllers::class,"post"]);
$router->get("/comment",[Controllers::class,"comment"]);
// $router->active();