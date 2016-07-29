<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 00:23
 */

namespace Estoque\Model\Produtos;


use Base\Model\AbstractModel;

class Produtos extends AbstractModel{

    protected $tipo;
    protected $title;
    protected $catid;
    protected $marca;
    protected $clfiscal;
    protected $ecfop;
    protected $scfop;
    protected $cst;
    protected $unidade;
    protected $pago;
    protected $lucro;
    protected $valor;
    protected $peso;
    protected $estoque;
    protected $minimo;
    protected $images;

    /**
     * @return mixed
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * @param mixed $catid
     */
    public function setCatid($catid)
    {
        $this->catid = $catid;
    }

    /**
     * @return mixed
     */
    public function getClfiscal()
    {
        return $this->clfiscal;
    }

    /**
     * @param mixed $clfiscal
     */
    public function setClfiscal($clfiscal)
    {
        $this->clfiscal = $clfiscal;
    }

    /**
     * @return mixed
     */
    public function getCst()
    {
        return $this->cst;
    }

    /**
     * @param mixed $cst
     */
    public function setCst($cst)
    {
        $this->cst = $cst;
    }

    /**
     * @return mixed
     */
    public function getEcfop()
    {
        return $this->ecfop;
    }

    /**
     * @param mixed $ecfop
     */
    public function setEcfop($ecfop)
    {
        $this->ecfop = $ecfop;
    }

    /**
     * @return mixed
     */
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * @param mixed $estoque
     */
    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getLucro()
    {
        return $this->lucro;
    }

    /**
     * @param mixed $lucro
     */
    public function setLucro($lucro)
    {
        $this->lucro = $lucro;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getMinimo()
    {
        return $this->minimo;
    }

    /**
     * @param mixed $minimo
     */
    public function setMinimo($minimo)
    {
        $this->minimo = $minimo;
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
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return mixed
     */
    public function getScfop()
    {
        return $this->scfop;
    }

    /**
     * @param mixed $scfop
     */
    public function setScfop($scfop)
    {
        $this->scfop = $scfop;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * @param mixed $unidade
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;
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