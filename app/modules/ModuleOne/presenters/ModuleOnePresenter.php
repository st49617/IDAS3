<?php
/**
 * Created by PhpStorm.
 * User: Venaca
 * Date: 04.12.2018
 * Time: 18:26
 */

namespace App\Presenters;

use Nette;
use App\ModuleOne\ModuleOneDatabseModel;

class ModuleOnePresenter extends BasePresenter
{

    /** @var ModuleOneDatabseModel */
    private $databaseModel;

    public function __construct(ModuleOneDatabseModel $databaseModel)
    {
        $this->databaseModel = $databaseModel;
    }


    public function renderDefault()
    {
//        dump($this->databaseModel->getData());
        $this->template->setFile(__DIR__ . "/../templates/moduleOneTemplate.latte");
    }

}