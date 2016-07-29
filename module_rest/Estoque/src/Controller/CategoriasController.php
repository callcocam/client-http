<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 00:06
 */

namespace Estoque\Controller;


use Base\Controller\AbstractController;
use Estoque\Form\CategoriasFilter;
use Estoque\Form\CategoriasForm;
use Estoque\Model\Categorias\Categorias;
use Estoque\Model\Categorias\CategoriasRepository;
use Interop\Container\ContainerInterface;

class CategoriasController extends AbstractController {

    function __construct(ContainerInterface $container)
    {
        $this->container=$container;
        $this->table=CategoriasRepository::class;
        $this->model=Categorias::class;
        $this->form=CategoriasForm::class;
        $this->filter=CategoriasFilter::class;
        $this->route="categorias";
        $this->controller="categorias";
    }
}