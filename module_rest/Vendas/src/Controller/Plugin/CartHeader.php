<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 21:09
 */

namespace Vendas\Controller\Plugin;


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


    public function add(AbstractModel $vendas)
    {
        if($this->check($vendas)){

        }
        return $this->getData();
    }

    public function update(AbstractModel $vendas)
    {
        if($this->check($vendas)){

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
        if($this->_session->offsetGet($this->data->getTable())){
            return true;
        }
        return false;
    }
}