<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 00:21
 */

namespace Estoque\Controller;


use Base\Controller\AbstractController;

use Estoque\Form\ProdutosFilter;
use Estoque\Form\ProdutosForm;
use Estoque\Model\Produtos\Produtos;
use Estoque\Model\Produtos\ProdutosRepository;
use Interop\Container\ContainerInterface;

class ProdutosController extends AbstractController {

    function __construct(ContainerInterface $container)
    {
        $this->container=$container;
        $this->table=ProdutosRepository::class;
        $this->model=Produtos::class;
        $this->form=ProdutosForm::class;
        $this->filter=ProdutosFilter::class;

        $this->route="produtos";
        $this->controller="produtos";
    }
}