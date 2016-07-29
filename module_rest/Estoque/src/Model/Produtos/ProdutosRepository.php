<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 00:24
 */

namespace Estoque\Model\Produtos;


use Base\Model\AbstractRepository;
use Zend\Db\TableGateway\TableGateway;

class ProdutosRepository extends AbstractRepository {

    function __construct(TableGateway $tableGateway)
    {
      $this->tableGateway=$tableGateway;
        $this->joins=[
            ['tabela' => "bs_categorias", 'w' => "bs_produtos.catid=bs_categorias.id", 'c' => ['title_categorias' => 'title'], 'predicate' => 'left'],
            ['tabela' => "bs_marcas", 'w' => "bs_produtos.marca=bs_marcas.id", 'c' => ['title_marca' => 'title'], 'predicate' => 'left'],
        ];
    }
}