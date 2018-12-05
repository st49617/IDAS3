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

class ModuleTwoDatabseModel
{
    /** @var  ExtendDatabase*/
    private $database;


    public function __construct(Nette\Database\Context $databaseTwo)
    {
        $this->database = new ExtendDatabase($databaseTwo);
    }


    public function getData(){
        $sql = $this->database->table("user2");

        return $sql->fetchAll();

    }

}