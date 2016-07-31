<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 11:29
 */

namespace Vendas\Controller;


use Base\Controller\AbstractController;
use Estoque\Model\Produtos\Produtos;
use Estoque\Model\Produtos\ProdutosRepository;
use Interop\Container\ContainerInterface;
use Vendas\Form\ItensVendidosFilter;
use Vendas\Form\ItensVendidosForm;
use Vendas\Model\Vendas\ItensVendidos;
use Vendas\Model\Vendas\ItensVendidosRepository;
use Zend\Debug\Debug;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ItensVendidosController extends AbstractController{

    function __construct(ContainerInterface $container)
    {
        $this->container=$container;
        $this->table=ItensVendidosRepository::class;
        $this->model=ItensVendidos::class;
        $this->form=ItensVendidosForm::class;
        $this->filter=ItensVendidosFilter::class;
        $this->route="itensvendidos";
        $this->controller="itensvendidos";
    }

    public function addAction()
    {
        /**
         * @var $model ItensVendidos
         */
        /**
         * @var $produto Produtos
         * @var $this->SigaContas SigaContas
         */
        if($this->getData()):
            $this->table=ProdutosRepository::class;
            $produto=$this->getTable()->find($this->data['produto_id']);
            $this->table=ItensVendidosRepository::class;
            if($produto->getResult()){
                $this->data['description']=$produto->getData()->getTitle();
                $this->data['unitario']=$this->SigaContas()->read($produto->getData()->getValor());
                $this->data['valor']=$this->SigaContas()->Calcular($this->data['qtd'],$this->data['unitario'],"*");
                $this->data['qtd']=(int)$this->data['qtd']?$this->data['qtd']:"1";
                $default=[
                    'id'		    => 1,
                    'codigo' 		=> md5($this->route),
                    'empresa'       => 1,
                    'asset_id'      => $this->controller,
                    'tipo'          => 1,
                    'venda_id'      => 1,
                    'produto_id'    => 1,
                    'qtd'           => '1',
                    'unitario'      => '0,00',
                    'valor'         => '0,00',
                    'description'   => '',
                    'state'         => '0',
                    'access'        => '3',
                    'created'       => date("d-m-Y"),
                    'modified'      => date("d-m-Y H:i:s")];

                $data=array_replace($default,$this->data);
                $model=$this->getModel();
                $model->exchangeArray($data);
                $this->ItensCart()->add($model,$model->getProdutoId());
                $this->ItensCart()->total();
            }
        else{
            $this->ItensCart()->read();
        }

        endif;
        $view=new JsonModel($this->ItensCart()->getData()->toArray());
        $view->setVariables($this->ItensCart()->total());
        return $view;
    }

    public function removeAction()
    {
        $token=$this->params()->fromRoute('id',null);
        if(!empty($token))
        {
            $this->ItensCart()->remove($token);
        }
        $view=new JsonModel($this->ItensCart()->getData()->toArray());
        $view->setVariables($this->ItensCart()->total());
        return $view;
    }

    public function recarregaAction()
    {
        $this->ItensCart()->read();
        $view=new ViewModel($this->ItensCart()->getData()->toArray());
        $view->setTemplate('/admin/admin/tpl/vendas/itens');
        $view->setTerminal(true);
        return $view;

    }
}