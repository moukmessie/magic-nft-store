<?php


namespace model;


class Cards
{
   static function data()
    {
        $file="database/cards.json";

        if(file_exists($file)){
            $json = file_get_contents($file);
            return json_decode($json);
        }else{
            return false;
        }
        //json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    static function product($id){
        $file="database/cards.json";

        if(file_exists($file)){
            $json = file_get_contents($file);
           $data= json_decode($json);

          foreach ($data as $i){
              if ($id === $i->id) {
                  return $i;
              }
          }

        }else{
            return false;
        }
    }

}