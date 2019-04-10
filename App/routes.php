<?php

$router->get('home', 'PagesController@welcome');
$router->get('test/{name}', 'PagesController@test');
$router->post('home', 'PagesController@save');