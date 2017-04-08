<?php
namespace core\lib;

class model extends \PDO
{
    public function __construct()
    {
        $database =  conf::all('database');
        $dsn = $database['dsn'];
        $username = $database['username'];
        $passwd = $database['passwd'];

        try{
            parent::__construct($dsn, $username ,$passwd);
        }catch (\PDOException $e){
            print_r($e->getMessage());
        }
    }
}