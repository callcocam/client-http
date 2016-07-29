<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 10:43
 */

namespace Vendas\Model\Vendas;


use Base\Model\AbstractRepository;
use Zend\Db\TableGateway\TableGateway;

class ItensVendidosRepository extends AbstractRepository
{

    function __construct(TableGateway $tableGateway)
    {
       $this->tableGateway=$tableGateway;
    }
}