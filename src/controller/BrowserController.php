<?php


namespace controller;


use http\Params;
use model\Cards;
use view\Template;

class BrowserController
{

    public function browser(): void
    {

        if(empty($_SESSION['login'])) {
            $cards = Cards::data();

            $params = [
                "title" => "Browser",
                "module" => "browser.php",
                "cards" => $cards
            ];

            Template::render($params);
        }else{

            header("Location: /shop");
        }
    }

    public function product():void
    {
        //var_dump($_GET['id']);

        $id=$_GET['id'] ;
       $cards=Cards::product($id);
        //var_dump($cards->name);
        if ($cards !=null) {
            $params=[
                "title"=>"Product ".$cards->name,
                "module"=>"product.php",
               "cards"=>$cards
            ];

            Template::render($params);
        }else{

            header("Location: /browser");
        }



    }




}