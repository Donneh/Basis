<?php

namespace Basis\App\controller;


class PagesController
{
    public function welcome()
    {
        return 'welcome';
    }

    public function save()
    {
        var_dump($_POST);
        return 'save';
    }

    public function test($name)
    {
        echo $name;
    }
}