<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\Anuncio;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AnuncioController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function cadastrarAction(){

        $request = new Request();

        if ($request->isPost()){

            $titulo = $request->getPost()->titulo;
            $descricao = $request->getPost()->descricao;
            $categoria = $request->getPost()->categoria;

            $preco = $request->getPost()->preco;
            $vendedor_nome = $request->getPost()->vendedor_nome;
            $vendedor_email = $request->getPost()->vendedor_email;
            $vendedor_telefone = $request->getPost()->vendedor_telefone;
            $vendedor_estado = $request->getPost()->vendedor_estado;
            $vendedor_cidade = $request->getPost()->vendedor_cidade;
            $categoria_grupo = $request->getPost()->categoria_grupo;

            $anuncio = new Anuncio();

            $anuncio->criar($titulo, $descricao, $categoria, $preco, $vendedor_nome, $vendedor_email,
                                    $vendedor_telefone, $vendedor_estado, $vendedor_cidade, $categoria_grupo);

            $anuncio->save();


            return new ViewModel(array('anuncio' => $anuncio));
        } else{
            return new ViewModel();
        }
    }

    public function detalharAction(){

        $request = new Request();

        if ($request->isGet()){

            $id = $request->getQuery('id');


        }

    }
}
