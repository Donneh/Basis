<?php

use Basis\Core\App;
use Basis\core\{Request, Router};

require_once '../core/bootstrap.php';

App::bind('config', require '../config/app.php');


$request = new Request();
echo Router::load('../app/routes.php')->direct($request->uri(), $request->method());
?>

<form action="home" method="POST">
    <input type="text" name="foo">
    <button type="submit">Submit</button>
</form>
