<?php
/**
 * Created by PhpStorm.
 * User: Venaca
 * Date: 04.12.2018
 * Time: 18:26
 */

namespace App\Presenters;

use App\ModuleOne\ModuleTwoDatabseModel;
use Nette;

class ModuleTwoPresenter extends BasePresenter
{

    /** @var ModuleTwoDatabseModel*/
    private $databaseModel;

    public function __construct(ModuleTwoDatabseModel $databaseModel)
    {
        $this->databaseModel = $databaseModel;
    }

    public function renderDefault()
    {
//        dump($this->databaseModel->getData());
        $this->template->setFile(__DIR__ . "/../templates/moduleTwoTemplate.latte");
    }

}