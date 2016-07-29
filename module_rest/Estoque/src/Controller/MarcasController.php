<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 00:05
 */

namespace Estoque\Controller;


use Base\Controller\AbstractController;
use Estoque\Form\MarcasFilter;
use Estoque\Form\MarcasForm;
use Estoque\Model\Marcas\Marcas;
use Estoque\Model\Marcas\MarcasRepository;
use Interop\Container\ContainerInterface;

class MarcasController extends AbstractController{

    function __construct(ContainerInterface $container)
    {
       $this->container=$container;
       $this->table=MarcasRepository::class;
       $this->model=Marcas::class;
       $this->form=MarcasForm::class;
       $this->filter=MarcasFilter::class;
       $this->route="marcas";
       $this->controller="marcas";
    }
}