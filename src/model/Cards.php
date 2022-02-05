<?php


namespace model;


class Cards
{
    //json file from API
    const DATA_FILE = "database/cards.json";

    /**
     * Read json file | decode json information
     * @return false|mixed
     */
   static function data()
    {
        $file="database/cards.json";

        if(file_exists($file)){
            $json = file_get_contents($file);
            return json_decode($json);
        }
        return false;
        //json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * Get one product by id
     * @param $id
     * @return false|mixed
     */
    static function product($id)
    {
        $data = self::data();
          foreach ($data as $i){
              if ($id === $i->id) {
                  return $i;
              }
          }
        return false;
    }

    /***
     * Get data by id from cart table
     * @param array $request data from database
     * @return array from api data before comparaison
     */

    public static function cart(array $request):array
    {
        $response=array();
        $data = self::data();
        foreach ($request as $reqValue) {
            foreach ($data as $iValue){
                if ($iValue->id === $reqValue) {
                    $response[] = $iValue;
                }
            }
       }
        return $response;
    }

}