<?php
namespace model;

use PDO;
use SQLite3;

class Connection
{
   //private SQLite3 $db;

    static function connect()
    {
        $dsn ="sqlite:magicDB.db";
        return new \PDO($dsn);
    }

//   public function __construct(string $filename)
//   {
//       $this->db = new SQLite3($filename);
//   }
//   public function initialize():void
//   {
//        $query = "CREATE TABLE IF NOT EXISTS account
//                        (
//                            id INTEGER NOT NULL UNIQUE,
//                            firstname	varchar(80) NOT NULL,
//                            lastname	varchar(80) NOT NULL,
//                            mail	varchar(80) NOT NULL,
//                            password	varchar(80) NOT NULL,
//                            PRIMARY KEY(`id` AUTOINCREMENT)
//                        )";
//        $this->exec($query);
//   }
//    public function addUser($firstname, $lastname,  $mail, $password)
//    {
//
//       $query = " INSERT INTO account (firstname,lastname,mail,password) VALUES(?,?,?,?)";
//
//       // $stmt =$this->db->prepare($query);
//        //$stmt->bind_param($firstname, $lastname, $mail,$password);
//        $request= $db->prepare($sql);
//        $request->execute(array($firstname, $lastname, $mail, $pass));
//
//        //$this->exec($query);
//    }
//
//    public function getCart():array
//    {
//        $cart=[];
//        $query ="SELECT * FROM cart";
//        $data =$this->db->query($query);
//
//        while ($row = $data->fetchArray()){
//            $cart[]=[
//                'id'=>$row['id'],
//
//            ];
//        }
//
//    }
//
//   private function exec( $query):void
//   {
//        $this->db->prepare($query);
//        $this->db->exec($query);
//   }
   /** public function connect(){
       *if($this->pdo==null){
       *    $this->pdo = new PDO("sqlite:magicDB.db");
      * }
       *return $this->pdo;
       * }
   */

}