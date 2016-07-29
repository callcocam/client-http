<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 23:53
 */

namespace Estoque\Model\Categorias;


use Base\Model\AbstractRepository;
use Zend\Db\TableGateway\TableGateway;

class CategoriasRepository extends AbstractRepository {

    function __construct(TableGateway $tableGateway)
    {
       $this->tableGateway=$tableGateway;
    }
}