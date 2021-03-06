<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 13:11
 */

namespace Estoque\Form;


use Base\Form\AbstractForm;
use Interop\Container\ContainerInterface;

class CategoriasForm extends AbstractForm{

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
        parent::__construct($container, $name);
        $this->setAttributes(['action' => 'produtos', 'class' => 'form-geral Manager  form-horizontal form-label-left']);

        $this->add([
            'type' => 'text',
            'name' => 'title',
            'options' => [
                'label' => 'Nome Completo'
            ],
            'attributes' => [
                'id' => 'title',
                'class' => 'form-control',
                'placeholder' => 'Nome Completo',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);


        $this->add([
            'type' => 'text',
            'name' => 'url',
            'options' => [
                'label' => 'FILD_URL_LABEL'
            ],
            'attributes' => [
                'id' => 'url',
                'class' => 'form-control',
                'placeholder' => 'FILD_URL_PLACEHOLDER',
                'title' => 'FILD_URL_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

        $this->add([
            'type' => 'hidden',
            'name' => 'images',
            'attributes' => [
                'id' => 'images',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

      }

    }