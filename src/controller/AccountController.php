<?php

namespace controller;

use model\Model;
use view\Template;

class AccountController
{
    public function account():void
    {
        if(empty($_SESSION['login'])){
            $params=[
                "title"=>"Account",
                "module"=>"account.php"
            ];
            Template::render($params);
        }else{
            header("Location: /account/profil");
        }

    }
    public function login():void
    {
        $mail=trim(htmlspecialchars($_POST['usermail']));
        $password =trim(htmlspecialchars($_POST['userpass']));

        $login=\model\AccountModel::login($mail,$password);

        password_verify($password,$login['password']);
        //var_dump( $login['password']);

        if($login !=false && password_verify($password,$login['password'])){

            $user=array(
                "id"=>$login['id'],
                "lastname"=>$login['lastname'],
                "firstname"=>$login['firstname'],
                'mail'=>$login['mail'],
            );
            $_SESSION['login']=$user;
            header("Location: /shop");
            exit();
        }else{

            header("Location: /account?status=login_fail");

        }
        
            
    }

     public function signin()
    {
        $lastsname = trim(htmlspecialchars($_POST['userlastname']));
        $firstsname = trim(htmlspecialchars($_POST['userfirstname']));
        $mail = trim(htmlspecialchars($_POST['usermail']));
        $password = trim(htmlspecialchars($_POST['userpass']));
        $pass= password_hash($password,PASSWORD_DEFAULT);
        //
//var_dump($pass);
        $signin = \model\AccountModel::signing($firstsname, $lastsname , $mail, $pass);

        if ($signin) {
            header("Location: /account?status=signin_success");

        }else{
            header("Location: /account?status=signin_fail");
        }

    }

    public function logout()
    {
        session_destroy();
        header("Location: /account?status=logout_success");
        // header("Location: /browser");
    }
}