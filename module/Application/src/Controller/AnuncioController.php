<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AnuncioController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function detalharAction(){

        $id = $this->params()->fromPost('id');

        return new ViewModel();
    }

    public function cadastrarAction(){

        return new ViewModel();
    }
}
