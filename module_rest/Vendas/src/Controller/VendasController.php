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
use Zend\View\Model\ViewModel;

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

    public function createAction()
    {
        $this->getForm();
        $this->VendasCart()->read();
        if($this->VendasCart()->getData()->getResult())
        {
          $venda=$this->VendasCart()->getData()->getData();
          $this->form->setData($venda['vendas']);
        }
        $this->page=$this->params()->fromRoute('page','1');
        $viewModel= new ViewModel(['form'=>$this->form]);
        $viewModel->setVariable('controller',$this->controller);
        $viewModel->setVariable('route',$this->route);
        $viewModel->setVariable('page',$this->page);
        $viewModel->setVariable('user',$this->user);
        $viewModel->setTemplate('/admin/admin/editar');
        return $viewModel;
    }

    /**
     * @return JsonModel
     */
    public function addAction()
    {
        /**
        * @var $model Vendas
        */
        if($this->getData()):
            $default=[
                'id'		    => 1,
                'codigo' 		=> md5($this->route),
                'empresa'       => 1,
                'asset_id'      => $this->controller,
                'tipo'          => 1,
                'created_by'    => $this->user->id,
                'cliente_id'    => 1,
                'fpgto'         => 1,
                'cpgto'         => 1,
                'descontos'     => '0,00',
                'juros'         => '0,00',
                'pago'          => '0,00',
                'valor'         => '0,00',
                'description'   => '',
                'state'         => '0',
                'access'        => '3',
                'created'       => date("d-m-Y"),
                'modified'      => date("d-m-Y H:i:s")];
            $data=array_replace($default,$this->data);
            $model=$this->getModel();
            $model->exchangeArray($data);
            $this->VendasCart()->add($model,"vendas");
        endif;
        return new JsonModel($this->VendasCart()->getData()->toArray());
    }
    public function updateAction()
    {

    }

    /**
     * @return JsonModel
     */
    public function readAction()
    {
        $this->VendasCart()->read();
        return new JsonModel($this->VendasCart()->getData()->toArray());
    }

    public function destroyAction()
    {
        $this->ItensCart()->destroy();
        $this->VendasCart()->destroy();
        return new JsonModel($this->VendasCart()->getData()->toArray());
    }

    public function calculaAction()
    {
        return new JsonModel($this->ItensCart()->total());
    }
}