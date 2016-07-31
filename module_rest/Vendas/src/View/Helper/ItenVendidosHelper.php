<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 17:21
 */

namespace Vendas\View\Helper;


use Interop\Container\ContainerInterface;
use Vendas\Form\ItensVendidosForm;
use Zend\View\Helper\AbstractHelper;

class ItenVendidosHelper extends AbstractHelper {
    /**
     * @var ContainerInterface
     */
    private $container;


    /**
     * @param ContainerInterface $container
     */
    function __construct(ContainerInterface $container)
    {

        $this->container = $container;
    }

    public function getForm()
    {
        $html=[];
        $form=$this->container->get(ItensVendidosForm::class);
        if($this->view->filtro){
            $form->setData($this->view->filtro);
        }
        $form->setAttribute('action', $this->view->url('itensvendidos',['action'=>'add']));
        $form->setAttribute('class', 'form-geral  form-inline');
        $this->view->formElementErrors()
            ->setMessageOpenFormat('<ul class="nav"><li class="erro-obrigatorio">')
            ->setMessageSeparatorString('</li>')->render($form);
        $html[]=$this->view->form()->openTag($form);
        $html[]= $this->view->Html('div')->setClass("col-md-7")->setText(PHP_EOL)->appendText(
            $this->view->Html('div')->setClass("form-group")->setText(PHP_EOL)->appendText($this->view->formElement($form->get('produto_id')))->appendText(PHP_EOL));

        $html[]= $this->view->Html('div')->setClass("col-md-2")->setText(PHP_EOL)->appendText(
            $this->view->Html('div')->setClass("form-group")->setText(PHP_EOL)->appendText($this->view->formElement($form->get('qtd')))->appendText(PHP_EOL));


        $html[]= $this->view->Html('div')->setClass("col-md-2")->setText(PHP_EOL)->appendText(
            $this->view->Html('div')->setClass("form-group")->setText(PHP_EOL)->appendText($this->view->formElement($form->get('save')))->appendText(PHP_EOL));

       $html[]=$this->view->form()->closeTag();
        return implode(PHP_EOL,$html);
    }

    public function getCart()
    {
        return $this->container->get('ItensCart');
    }
}