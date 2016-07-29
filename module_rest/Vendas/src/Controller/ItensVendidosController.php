<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 11:29
 */

namespace Vendas\Controller;


use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Vendas\Model\Vendas\ItensVendidos;
use Vendas\Model\Vendas\ItensVendidosRepository;

class ItensVendidosController extends AbstractController{

    function __construct(ContainerInterface $container)
    {
        $this->container=$container;
        $this->table=ItensVendidosRepository::class;
        $this->model=ItensVendidos::class;

        $this->route="itensvendidos";
        $this->controller="itensvendidos";
    }
}