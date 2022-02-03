<?php

namespace model;

class Model{

    static function connect()
    {
        $dsn ="sqlite:magicDB.db";
        return new \PDO($dsn);
    }



}

    

