<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 10:35
 */

namespace Vendas\Model\Vendas;


use Base\Model\AbstractModel;

class Vendas extends AbstractModel {

    protected $tipo;
    protected $created_by;
    protected $cliente_id;
    protected $fpgto;
    protected $cpgto;
    protected $descontos;
    protected $juros;
    protected $pago;
    protected $valor;

    /**
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * @param mixed $cliente_id
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    /**
     * @return mixed
     */
    public function getCpgto()
    {
        return $this->cpgto;
    }

    /**
     * @param mixed $cpgto
     */
    public function setCpgto($cpgto)
    {
        $this->cpgto = $cpgto;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param mixed $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return mixed
     */
    public function getDescontos()
    {
        return $this->descontos;
    }

    /**
     * @param mixed $descontos
     */
    public function setDescontos($descontos)
    {
        $this->descontos = $descontos;
    }

    /**
     * @return mixed
     */
    public function getFpgto()
    {
        return $this->fpgto;
    }

    /**
     * @param mixed $fpgto
     */
    public function setFpgto($fpgto)
    {
        $this->fpgto = $fpgto;
    }

    /**
     * @return mixed
     */
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * @param mixed $juros
     */
    public function setJuros($juros)
    {
        $this->juros = $juros;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param mixed $pago
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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




} 