<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 11:27
 */

namespace Vendas\Controller;


use Base\Controller\AbstractController;
use Interop\Container\ContainerInterface;
use Vendas\Model\Vendas\Vendas;
use Vendas\Model\Vendas\VendasRepository;

class VendasController extends AbstractController{

    function __construct(ContainerInterface $container)
    {
        $this->container=$container;
        $this->table=VendasRepository::class;
        $this->model=Vendas::class;

        $this->route="vendas";
        $this->controller="vendas";
    }
}