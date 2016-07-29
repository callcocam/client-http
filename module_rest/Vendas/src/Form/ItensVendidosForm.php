<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 11:45
 */

namespace Vendas\Form;


use Base\Form\AbstractForm;
use Base\Form\Interfaces\AbstractFormInterface;
use Estoque\Model\Produtos\ProdutosRepository;
use Interop\Container\ContainerInterface;

class ItensVendidosForm extends AbstractForm implements AbstractFormInterface{
    public function __construct(ContainerInterface $container, $name, $options = [])
    {
        $this->container = $container;
        $this->setId([]);
        $this->setAssetid([]);
        $this->setCodigo([]);
        $this->setAccess([]);
        $this->setCreated(['type' => 'hidden']);
        $this->setEmpresa([]);
        $this->setModified(['type' => 'hidden']);
        $this->setSave([]);
        $this->setCsrf([]);
        $this->setState(['type' => 'hidden']);
        $this->setDescription(['type' => 'hidden']);
        $this->getAuthservice();
        parent::__construct($container, $name, $options);
        $this->setAttributes(['action' => 'itensvendidos', 'class' => 'form-geral Manager form-inline']);
        $this->add([
            'type' => 'select',
            'name' => 'produto_id',
            'options' => [
                'label' => 'FILD_PORDUTO_ID_LABEL'
            ],
            'attributes' => [
                'id' => 'produto_id',
                'class' => 'form-control',
                'placeholder' => 'FILD_PORDUTO_ID_PLACEHOLDER',
                'title' => 'FILD_PORDUTO_ID_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);


         $this->add([
            'type' => 'hidden',
            'name' => 'venda_id',

            'attributes' => [
                'id' => 'venda_id',
                 'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'text',
            'name' => 'qtd',
            'options' => [
                'label' => 'FILD_QTD_LABEL'
            ],
            'attributes' => [
                'id' => 'qtd',
                'class' => 'form-control real',
                'placeholder' => 'FILD_QTD_PLACEHOLDER',
                'title' => 'FILD_QTD_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>'0,00'
            ]
        ]);



         $this->add([
            'type' => 'text',
            'name' => 'unitario',
            'options' => [
                'label' => 'FILD_UNITARIO_LABEL'
            ],
            'attributes' => [
                'id' => 'unitario',
                'class' => 'form-control real',
                'placeholder' => 'FILD_UNITARIO_PLACEHOLDER',
                'title' => 'FILD_UNITARIO_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>'0,00'
            ]
        ]);




         $this->add([
            'type' => 'text',
            'name' => 'valor',
            'options' => [
                'label' => 'FILD_VALOR_LABEL'
            ],
            'attributes' => [
                'id' => 'valor',
                'class' => 'form-control real',
                'placeholder' => 'FILD_VALOR_PLACEHOLDER',
                'title' => 'FILD_VALOR_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>'0,00'
            ]
        ]);



        if ($this->has('produto_id')):
            if($this->get('produto_id')->getAttribute('type')=="select"):
                $this->get('produto_id')->setOptions(['value_options' => $this->setValueOption(ProdutosRepository::class,['state'=>'0'])]);
            else:
                $this->get('produto_id')->setValue('0');
            endif;
        endif;

    }



}