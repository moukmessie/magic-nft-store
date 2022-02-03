<?php
namespace controller;

class IndexController{
    public function index():void
    {
        $parms = [
            "title"=>"Home",
            "module"=>"home.php"
        ];

        // view render
        \view\Template::render($parms);
    }
}