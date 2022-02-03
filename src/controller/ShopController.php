<?php


namespace controller;


use model\Cards;
use view\Template;

class ShopController
{
    public function shop(): void
    {
        $cards=Cards::data();

        $params=[
            "title"=>"Shop",
            "module"=>"shop.php",
            "cards"=>$cards
        ];

        Template::render($params);

    }

    public function cart():void
    {
        $params=[
            "title"=>"cart",
            "module"=>"cart.php"
        ];
        Template::render($params);
    }

}