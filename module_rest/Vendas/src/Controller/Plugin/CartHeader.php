<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 21:09
 */

namespace Vendas\Controller\Plugin;


use Base\Form\AbstractInputFilter;
use Base\Model\AbstractModel;
use Base\Model\Result;
use Interop\Container\ContainerInterface;
use Vendas\Controller\Plugin\Interfaces\CartInterface;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Session\Container;

class CartHeader extends AbstractPlugin implements CartInterface {


    protected $_session;
    /**
     * @var ContainerInterface
     */
    private $container;

     /**
     * @var $filter AbstractInputFilter
     */
    protected $filter;

    /**
     * @var $data Result
     */
    protected $data;

    /**
     * @param array $options
     */
    public  function __construct(ContainerInterface $container, array $options,$iputFiter)
    {
        $this->_session=new Container($options['cart']);
        $this->container = $container;
        $this->filter=$iputFiter;
        $this->setData(new Result());
        $this->data->setError("NÃO EXISTEM ITENS NO CARRINHO");
        $this->data->setResult(false);
        $this->data->setClass("danger");
        $this->data->setData([]);
        $this->data->setTable($options['table']);
    }


    public function add(AbstractModel $model)
    {
        if($this->check($model)){
            if($this->isResult())
            {
                $this->update($model);
            }
            else{
                $this->_session->offsetSet($this->data->getTable(),$model->toArray());
                $this->data->setData($this->read());
                $this->data->setError("O PEDIDO FOI INICIADO COM SUCESSO");
               }
        }
        return $this->getData();
    }

    public function update(AbstractModel $model)
    {
        if($this->check($model)){
            $this->_session->offsetSet($this->data->getTable(),$model->toArray());
            $this->data->setData($this->read());
            $this->data->setError("O PEDIDO FOI ATUALIZADO COM SUCESSO");

        }
        return $this->getData();
    }

    public function remove($token)
    {
        // TODO: Implement remove() method.
    }

    public function destroy()
    {
       $this->_session->offsetUnset($this->data->getTable());
    }

    public function read()
    {
        if($this->isResult()){
            $this->data->setData($this->_session->offsetGet($this->data->getTable()));
            $this->data->setClass('success');
            $this->data->setError("O CARRINHO CONTEM ITEM");
            $this->data->setResult(true);
            return $this->data->getData();
        }
        return $this->getData();
    }

    public function total()
    {
        // TODO: Implement total() method.
    }

    public function check(AbstractModel $model)
    {
            $inputFilter=$this->filter->getInputFilter();
            $inputFilter->setData($model->toArray());
            if(!$inputFilter->isValid())
            {
                $msg=[];
                foreach($inputFilter->getMessages() as $key => $messages){
                   if(is_array($messages)):
                        foreach($messages as $message):
                            $msg[]=sprintf("%s - %s",$key,$message);
                        endforeach;
                   endif;
                }
                $this->data->setError(implode(PHP_EOL,$msg));

            }
        return $inputFilter->isValid();
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    public function isResult()
    {
        if($this->_session->offsetExists($this->data->getTable())){
            return true;
        }
        return false;
    }
}