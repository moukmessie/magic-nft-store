<?php


namespace controller;

use model\Cards;
use model\CartModel;
use view\Template;

class ShopController
{
    /**
     * Get all product from Json file API and post it in shop view
     */
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

    /**
     * Get and post products from database cart table ton cart view
     */
    public function cart():void
    {
        if (isset($_SESSION['login']['id'])){
            $id_tab=array();
            $quantity=array();
            $id_account = $_SESSION['login']['id'];
            $products = CartModel::getCart($id_account);

            //Get all id product from database table cart and push it in id_table
            foreach ($products as  $id){
                $id_tab[] = $id["id_product"];
                $quantity[]=$id['quantity_prod'];

            }
            $cards = Cards::cart($id_tab);

            //var_dump($quantity[0]);

                $params=[
                    "title"=>"cart",
                    "module"=>"cart.php",
                    "cards"=>$cards,
                    "quantity"=>$quantity
                ];
                $_SESSION['cart']['quantity']=array_sum($quantity);
                $_SESSION['cart']['product_number']=count($quantity);
                Template::render($params);

        }
    }

    /**
     * Add product to cart
     */
    public function add():void
    {
        if(isset($_SESSION['login']['id'], $_POST['add'])){
           // return var_dump("true");
            $id_product = $_POST['add'];
            $id_account = $_SESSION['login']['id'];
            $quantity=1;
            //var_dump(count($id_product));
            foreach ($id_product as $iValue) {
                $send = CartModel::add($quantity, $iValue,$id_account,$quantity);
            }
            if ($send) {
                header("Location: /shop?status=add_to_cart");

            }else{

                header("Location: /shop?status=failed_to_add_to_cart");
            }

        }else{
            header("Location: /shop?status=failed_to_add_to_cart");
        }
    }

    public function update():void
    {
        if(isset($_SESSION['login']['id'], $_POST['id_product'])){
            $quantity = $_POST['quantity'];
            $id_account = $_SESSION['login']['id'];
            $id_product = $_POST['id_product'];
            //var_dump("qt= ".$quantity, "user : ".$id_account, "prod : ".$id_product);
            CartModel::updateQuantity($quantity,$id_account,$id_product);
            header("Location: /cart?status=quantity_updating");

        }else {
            header("Location: /cart?status=error_updating");
        }

    }
    public function delete():void
    {
        if(isset($_SESSION['login']['id'], $_POST['delete'])){
            $id_product=  $_POST['delete'];
            $id_account = $_SESSION['login']['id'];

            CartModel::deleteProduct($id_account,$id_product);
            header("Location: /cart?status=product_deleted");

        }

    }
}