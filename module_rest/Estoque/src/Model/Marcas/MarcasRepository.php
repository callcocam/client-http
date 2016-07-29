<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 00:01
 */

namespace Estoque\Model\Marcas;


use Base\Model\AbstractRepository;
use Zend\Db\TableGateway\TableGateway;

class MarcasRepository extends AbstractRepository {

    function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway=$tableGateway;
    }
}