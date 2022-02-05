<?php
namespace model;

class CartModel
{
    public static function add($quantity, $id_product, $id_account, $total_amount):bool
    {
        //connexion to database
        $db = \model\Model::connect();

        $sql = "SELECT * FROM cart WHERE  cart.id_product='$id_product' and cart.id_account='$id_account'";
        $req = $db->prepare($sql);
        $req->execute();
        $response=$req->fetch();
        if ($response != null) {
            $quantity=$response['quantity_prod'] + $quantity;
            $total_amount=$response['total_amount']+$total_amount;
            $sql= "UPDATE cart SET quantity_prod= :quantity, total_amount=:total_amount WHERE id_product=:id_product AND id_account =:id_account";
            $request= $db->prepare($sql);
            $request->execute(compact('quantity','id_product','id_account', 'total_amount'));
            return true;
        }else {//add sql request
            $sql = "INSERT INTO cart (quantity_prod, id_product, id_account, total_amount) VALUES (:quantity, :id_product, :id_account, :total_amount)"; //Execution sql request
            $request = $db->prepare($sql);
            $request->execute(compact('quantity', 'id_product', 'id_account', 'total_amount'));
            return true;

        }
        return false;
    }

    public static function getCart($id_account){
        //connexion to database
        $db = \model\Model::connect();
        $sql = "SELECT * FROM cart WHERE cart.id_account='$id_account'";
        $req = $db->prepare($sql);
        $req->execute();

        return $req->fetchAll();

    }

    public static function updateQuantity($quantity, $id_account,$id_product){
        //connexion to database
        $db = \model\Model::connect();
        $sql= "UPDATE cart SET quantity_prod = :quantity WHERE id_product=:id_product AND id_account =:id_account";
        $request=$db->prepare($sql);
        $request->execute(compact('quantity','id_account','id_product'));
    }

    public static function deleteProduct($id_account,$id_product){
        $db = \model\Model::connect();
        $sql= "DELETE FROM cart WHERE id_product=:id_product AND id_account =:id_account";
        $request=$db->prepare($sql);
        $request->execute(compact('id_account','id_product'));
    }



}