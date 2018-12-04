<?php
/**
 * Created by PhpStorm.
 * User: Venaca
 * Date: 04.12.2018
 * Time: 19:33
 */

namespace App\ModuleOne;

use Nette;

class ModuleTwoDatabseModel
{
    private $database;


    public function __construct(Nette\Database\Context $databaseTwo)
    {
        $this->database = $databaseTwo;
    }


    public function getData(){
        $sql = $this->database->table("user2");

        return $sql->fetchAll();

    }

}