<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 10:41
 */

namespace Vendas\Model\Vendas;


use Base\Model\AbstractModel;

class ItensVendidos extends AbstractModel{

    protected $venda_id;
    protected $produto_id;
    protected $unitario;
    protected $qtd;
    protected $valor;

    /**
     * @return mixed
     */
    public function getProdutoId()
    {
        return $this->produto_id;
    }

    /**
     * @param mixed $produto_id
     */
    public function setProdutoId($produto_id)
    {
        $this->produto_id = $produto_id;
    }

    /**
     * @return mixed
     */
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * @param mixed $qtd
     */
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }

    /**
     * @return mixed
     */
    public function getUnitario()
    {
        return $this->unitario;
    }

    /**
     * @param mixed $unitario
     */
    public function setUnitario($unitario)
    {
        $this->unitario = $unitario;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getVendaId()
    {
        return $this->venda_id;
    }

    /**
     * @param mixed $venda_id
     */
    public function setVendaId($venda_id)
    {
        $this->venda_id = $venda_id;
    }

} 