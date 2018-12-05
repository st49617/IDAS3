<?php
/**
 * Created by PhpStorm.
 * User: Venaca
 * Date: 04.12.2018
 * Time: 19:33
 */

namespace App\ModuleOne;

use Extend\Database\ExtendDatabase;
use Nette;

class ModuleOneDatabseModel
{
    private $database;


    public function __construct(ExtendDatabase $databaseOne)
    {
        $this->database = $databaseOne;
    }


    public function getData(){
        $sql = $this->database->table("table2");

        return $sql->fetchAll();

    }

}