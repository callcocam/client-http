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
use Vendas\Form\VendasFilter;
use Vendas\Form\VendasForm;
use Vendas\Model\Vendas\Vendas;
use Vendas\Model\Vendas\VendasRepository;
use Zend\Debug\Debug;
use Zend\View\Model\JsonModel;

class VendasController extends AbstractController{

    function __construct(ContainerInterface $container)
    {
        $this->container=$container;
        $this->table=VendasRepository::class;
        $this->model=Vendas::class;
        $this->form=VendasForm::class;
        $this->filter=VendasFilter::class;
        $this->route="vendas";
        $this->controller="vendas";
        //$this->template="admin/admin/vendas/inserir";
    }

    /**
     * @return JsonModel
     */
    public function addAction()
    {
        /**
        * @var $model Vendas
        */
        $data= array(
            'id'		    => 1,
            'codigo' 		=> md5($this->route),
            'empresa'       => 1,
            'asset_id'      => $this->controller,
            'tipo'          => 1,
            'created_by'    => $this->user->id,
            'cliente_id'    => 1,
            'fpgto'         => 1,
            'cpgto'         => 1,
            'desconto'      => '0,00',
            'juros'         => '0,00',
            'pago'          => '0,00',
            'valor'         => '50,00',
            'state'         => '0',
            'access'        => '3',
            'created'       => date("d-m-Y"),
            'modified'      => date("d-m-Y H:i:s"));
        if(!$this->getData()):
            $model=$this->getModel();
            $model->exchangeArray($data);
            $this->VendasCart()->add($model);
        endif;
        return new JsonModel($this->VendasCart()->getData()->toArray());
    }

    /**
     * @return JsonModel
     */
    public function readAction()
    {
        $this->VendasCart()->read();
        return new JsonModel($this->VendasCart()->getData()->toArray());
    }
}