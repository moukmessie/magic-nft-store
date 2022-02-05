<?php


namespace model;


class AccountModel
{
    /**
     * Check forms
     * @param $firstname
     * @param $lastname
     * @param $mail
     * @param $password
     * @return bool
     */
    public static function check($firstname, $lastname, $mail, $password): bool
    {

        if(strlen($firstname)>=2 &&  strlen($lastname)>=2  && filter_var($mail, FILTER_VALIDATE_EMAIL) && (strlen($password) >= 6)) {
            $db = \model\Model::connect();
            $sql = "SELECT * FROM account WHERE `mail`='$mail'";
            $req = $db->prepare($sql);
            $req->execute();
            $response=$req->fetch();
            if (!$response) {
                return true;
            }
        }
        return false;
    }

    /**
     * signing push form to database account table
     * @param $firstname
     * @param $lastname
     * @param $mail
     * @param $password
     * @return bool
     */
    public static function signing($firstname, $lastname, $mail, $password):bool
    {
        if(self::check($firstname, $lastname, $mail, $password)){
            //connexion to database
            $db = \model\Model::connect();
            //add sql request

            $sql= "INSERT INTO account (firstname,lastname,mail,password) VALUES (:firstname,:lastname,:mail,:password)";

            //Execution sql request
            $request= $db->prepare($sql);
            //$request->execute(array($firstname, $lastname, $mail, $pass));
            $request->execute(compact('firstname','lastname','mail','password'));
            return true;
        }
        return false;
    }

    /**
     *
     * @param $mail
     * @param $password
     * @return mixed
     */
    public static function login($mail, $password)
    {
        //connexion to database
        $db = \model\Model::connect();
        //add sql request
        $sql= "SELECT * FROM account WHERE account.mail='$mail' ";
        $request = $db->prepare($sql);
        $request->execute();
        return $request->fetch();
    }
}