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
use Interop\Container\ContainerInterface;

class VendasForm extends AbstractForm implements AbstractFormInterface{
    public function __construct(ContainerInterface $container, $name, $options = [])
    {
        $this->container = $container;
        $this->setId([]);
        $this->setAssetid([]);
        $this->setCodigo([]);
        $this->setAccess([]);
        $this->setCreated([]);
        $this->setEmpresa([]);
        $this->setModified([]);
        $this->setSave([]);
        $this->setCsrf([]);
        $this->setState([]);
        $this->setDescription([]);
        $this->getAuthservice();
        parent::__construct($container, $name, $options);
        $this->setAttributes(['action' => 'vendas', 'class' => 'form-horizontal']);

        $this->add([
            'type' => 'select',
            'name' => 'cliente_id',
            'options' => [
                'label' => 'FILD_CLIENTE_ID_LABEL'
            ],
            'attributes' => [
                'id' => 'cliente_id',
                'class' => 'form-control',
                'placeholder' => 'FILD_CLIENTE_ID_PLACEHOLDER',
                'title' => 'FILD_CLIENTE_ID_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'select',
            'name' => 'cpgto',
            'options' => [
                'label' => 'FILD_CPGTO_LABEL',
                'value_options'=>$this->config->cpgto
            ],
            'attributes' => [
                'id' => 'cpgto',
                'value'=>'A VISTA',
                'class' => 'form-control',
                'placeholder' => 'FILD_CPGTO_PLACEHOLDER',
                'title' => 'FILD_CPGTO_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'hidden',
            'name' => 'created_by',

            'attributes' => [
                'id' => 'created_by',
                'value'=>$this->authservice->id,
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'text',
            'name' => 'desconto',
            'options' => [
                'label' => 'FILD_DESCONTO_LABEL'
            ],
            'attributes' => [
                'id' => 'desconto',
                'class' => 'form-control real',
                'placeholder' => 'FILD_DESCONTO_PLACEHOLDER',
                'title' => 'FILD_DESCONTO_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'select',
            'name' => 'fpgto',
            'options' => [
                'label' => 'FILD_FPGTO_LABEL',
                'value_options'=>$this->config->fpgto
            ],
            'attributes' => [
                'id' => 'fpgto',
                'class' => 'form-control',
                'placeholder' => 'FILD_FPGTO_PLACEHOLDER',
                'title' => 'FILD_FPGTO_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'text',
            'name' => 'juros',
            'options' => [
                'label' => 'FILD_JUROS_LABEL'
            ],
            'attributes' => [
                'id' => 'juros',
                'class' => 'form-control real',
                'placeholder' => 'FILD_JUROS_PLACEHOLDER',
                'title' => 'FILD_JUROS_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

         $this->add([
            'type' => 'text',
            'name' => 'pago',
            'options' => [
                'label' => 'FILD_PAGO_LABEL'
            ],
            'attributes' => [
                'id' => 'pago',
                'class' => 'form-control real',
                'placeholder' => 'FILD_PAGO_PLACEHOLDER',
                'title' => 'FILD_PAGO_TITLE',
                'data-access' => '3',
                'data-position' => 'geral',
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
            ]
        ]);

        $this->add(array(
            'type' => 'radio',
            'name' => 'tipo',
            'options' => array(
                'label' => 'FILD_TIPO_LABEL',
                'label_attributes' => array(
                    'class' => 'css-label ',
                    'id' => 'sliderLabel',
                ),
                'value_options' =>  ['0'=>"ENTRADA","1"=>"SAIDA"],
                "disable_inarray_validator" => true,
            ),
            'attributes' => array(
                'id' => 'tipo',
                'value' => '1',
                'title' => 'Serviço Ou produto',
                'data-access' => '3',
                'data-position' => 'geral',
                'class' => 'css-checkbox situacao flat',
            )
        ));


    }


}