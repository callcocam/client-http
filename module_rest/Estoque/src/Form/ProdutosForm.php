<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 13:11
 */

namespace Estoque\Form;


use Base\Form\AbstractForm;
use Base\Model\Cache;
use Base\Services\Client;
use Estoque\Model\Categorias\CategoriasRepository;
use Estoque\Model\Marcas\MarcasRepository;
use Interop\Container\ContainerInterface;

class ProdutosForm extends AbstractForm{

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
            'type' => 'select',
            'name' => 'catid',
            'options' => [
                'label' => 'FILD_CATID_LABEL'
            ],
            'attributes' => [
                'id' => 'catid',
                'class' => 'form-control',
                'placeholder' => 'FILD_CATID_PLACEHOLDER',
                'title' => 'FILD_CATID_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);




        $this->add([
            'type' => 'select',
            'name' => 'clfiscal',
            'options' => [
                'label' => 'FILD_CLFISCAL_LABEL'
            ],
            'attributes' => [
                'id' => 'clfiscal',
                'class' => 'form-control',
                'placeholder' => 'FILD_CLFISCAL_PLACEHOLDER',
                'title' => 'FILD_CLFISCAL_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>$this->config->clfiscal
            ]
        ]);



        $this->add([
            'type' => 'text',
            'name' => 'cst',
            'options' => [
                'label' => 'FILD_CST_LABEL'
            ],
            'attributes' => [
                'id' => 'cst',
                'class' => 'form-control',
                'placeholder' => 'FILD_CST_PLACEHOLDER',
                'title' => 'FILD_CST_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>$this->config->cst
            ]
        ]);

        $this->add([
            'type' => 'select',
            'name' => 'ecfop',
            'options' => [
                'label' => 'FILD_ECFOP_LABEL'
            ],
            'attributes' => [
                'id' => 'ecfop',
                'class' => 'form-control',
                'placeholder' => 'FILD_ECFOP_PLACEHOLDER',
                'title' => 'FILD_ECFOP_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>$this->config->ecfop
            ]
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'estoque',
            'options' => [
                'label' => 'FILD_ESTOQUE_LABEL'
            ],
            'attributes' => [
                'id' => 'estoque',
                'class' => 'form-control',
                'placeholder' => 'FILD_ESTOQUE_PLACEHOLDER',
                'title' => 'FILD_ESTOQUE_DESC',
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

        $this->add([
            'type' => 'text',
            'name' => 'lucro',
            'options' => [
                'label' => 'FILD_LUCRO_LABEL'
            ],
            'attributes' => [
                'id' => 'lucro',
                'class' => 'form-control',
                'placeholder' => 'FILD_LUCRO_PLACEHOLDER',
                'title' => 'FILD_LUCRO_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

        $this->add([
            'type' => 'select',
            'name' => 'marca',
            'options' => [
                'label' => 'FILD_MARCA_LABEL'
            ],
            'attributes' => [
                'id' => 'marca',
                'class' => 'form-control',
                'placeholder' => 'FILD_MARCA_PLACEHOLDER',
                'title' => 'FILD_MARCA_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'minimo',
            'options' => [
                'label' => 'FILD_MINIMO_LABEL'
            ],
            'attributes' => [
                'id' => 'minimo',
                'class' => 'form-control',
                'placeholder' => 'FILD_MINIMO_PLACEHOLDER',
                'title' => 'FILD_MINIMO_DESC',
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
                'class' => 'form-control',
                'placeholder' => 'FILD_PAGO_PLACEHOLDER',
                'title' => 'FILD_PAGO_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'peso',
            'options' => [
                'label' => 'FILD_PESO_LABEL'
            ],
            'attributes' => [
                'id' => 'peso',
                'class' => 'form-control',
                'placeholder' => 'FILD_PESO_PLACEHOLDER',
                'title' => 'FILD_PESO_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

        $this->add([
            'type' => 'select',
            'name' => 'scfop',
            'options' => [
                'label' => 'FILD_SCFOP_LABEL'
            ],
            'attributes' => [
                'id' => 'scfop',
                'class' => 'form-control',
                'placeholder' => 'FILD_SCFOP_PLACEHOLDER',
                'title' => 'FILD_SCFOP_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>$this->config->scfop
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
                'value_options' =>  ['Produto'=>"Produto","Serviço"=>"Serviço"],
                "disable_inarray_validator" => true,
            ),
            'attributes' => array(
                'id' => 'tipo',
                'value' => 'Produto',
                'title' => 'Serviço Ou produto',
                'data-access' => '3',
                'data-position' => 'geral',
                'class' => 'css-checkbox situacao flat',
            )
        ));



        $this->add([
            'type' => 'text',
            'name' => 'unidade',
            'options' => [
                'label' => 'FILD_UNIDADE_LABEL'
            ],
            'attributes' => [
                'id' => 'unidade',
                'class' => 'form-control',
                'placeholder' => 'FILD_UNIDADE_PLACEHOLDER',
                'title' => 'FILD_UNIDADE_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
                'value'=>$this->config->unidade
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
                'class' => 'form-control',
                'placeholder' => 'FILD_VALOR_PLACEHOLDER',
                'title' => 'FILD_VALOR_DESC',
                'data-access' => '3',
                'data-position' => 'geral',
            ]
        ]);

        $cache=new Cache(['ttl'=>9000]);
        if ($this->has('clfiscal')):
            if($this->get('clfiscal')->getAttribute('type')=="select"):

                $arrayclfiscal=[];

                if($cache->hasItem("Ncm")){
                    $arrayclfiscal=$cache->getItem("Ncm");
                }
                else{
                    /**
                     * @var $client ClientHttp
                     */
                    $client = $this->container->get(Client::class);
                    $client->setOptions([
                        'maxredirects' => 0,
                        'timeout'      => 60,
                    ]);
                    $client->setUri(sprintf("%s/%s",$this->config->serverHost,'ncm'));
                    $response = $client->send();
                    if ($response->isSuccess()) {

                        $data=json_decode($response->getBody(),true);

                        foreach($data['data'] as $o){
                            $arrayclfiscal[$o['id']]=sprintf("%s - %s",$o['title'],$o['description']);
                        }

                        $cache->addItem("Ncm",$arrayclfiscal);
                    }
                }
                $this->get('clfiscal')->setOptions(['value_options' => $arrayclfiscal]);
           endif;
        endif;

         if ($this->has('scfop')):
            if($this->get('scfop')->getAttribute('type')=="select"):
                $arrayScfop=[];
                if($cache->hasItem("Scfop")){
                    $arrayScfop=$cache->getItem("Scfop");
                }
                else{
                    /**
                     * @var $client ClientHttp
                     */
                    $client = $this->container->get(Client::class);
                    $client->setOptions([
                        'maxredirects' => 0,
                        'timeout'      => 30,
                    ]);
                    $client->setUri(sprintf("%s/%s",$this->config->serverHost,'cfop'));
                    $response = $client->send();
                    if ($response->isSuccess()) {

                        $data=json_decode($response->getBody(),true);

                        foreach($data['data'] as $o){
                            $arrayScfop[$o['id']]=sprintf("%s - %s",$o['title'],$o['description']);
                        }

                        $cache->addItem("Scfop",$arrayScfop);
                    }
                }
                $this->get('scfop')->setOptions(['value_options' => $arrayScfop]);
            endif;
        endif;

        if ($this->has('ecfop')):
            if($this->get('ecfop')->getAttribute('type')=="select"):
                $arrayScfop=[];
                if($cache->hasItem("Scfop")){
                    $arrayScfop=$cache->getItem("Scfop");
                }
                $this->get('ecfop')->setOptions(['value_options' => $arrayScfop]);
            endif;
        endif;

        if ($this->has('catid')):
            if($this->get('catid')->getAttribute('type')=="select"):
               $this->get('catid')->setOptions(['value_options' => $this->setValueOption(CategoriasRepository::class)]);

            else:
                $this->get('catid')->setValue('1');
            endif;
        endif;

        if ($this->has('marca')):
            if($this->get('marca')->getAttribute('type')=="select"):
                $this->get('marca')->setOptions(['value_options' => $this->setValueOption(MarcasRepository::class)]);

            else:
                $this->get('marca')->setValue('1');
            endif;
        endif;



    }

    }