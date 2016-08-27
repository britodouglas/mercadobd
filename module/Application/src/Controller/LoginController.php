<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\Usuario;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function cadastrarAction(){

        $request = new Request();

        if ($request->isPost()){

            $nome = $request->getPost()->nome;
            $cpf = $request->getPost()->cpf;
            $telefone = $request->getPost()->telefone;
            $email = $request->getPost()->email;
            $passwd = hash("sha256", $request->getPost()->passwd);
            $categoria = $request->getPost()->categoria;
            $sexo = $request->getPost()->sexo;

            $usuario = new Usuario($nome, $cpf, $telefone, $passwd, $email, $categoria, $sexo);

            $usuario->create();

            return new ViewModel(array('usuario' => $usuario));
        } else{
            return new ViewModel();
        }

    }
}
