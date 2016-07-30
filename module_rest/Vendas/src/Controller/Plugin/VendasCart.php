<?php
/**
 * VendasCart
*/
namespace Vendas\Controller\Plugin;

use Vendas\Event\CartEvent;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Session\Container;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;


class VendasCart extends AbstractPlugin implements EventManagerAwareInterface
{

    /**
     * @var $_session
     */
    private $_session;

    /**
     * @var $_config
     */
    private $_config;

    /**
     * @var $eventManager
     */
    protected $eventManager;

    /**
     * __construct
     *
     * @param array $config
     */
    public function __construct($config = array())
    {
        $this->_config = $config;
        $this->_session = new Container('VendasCart');
        $this->setEventManager(new EventManager());
    }

    /**
     * Create the array of cart
     *
     * @param array $items
     * @access private
     * @return item vendas
     */
    private function _cart($items = array())
    {
    	return array(
            'id'		    => $items['id'],
            'codigo' 		=> $items['codigo'],
            'empresa'       => $items['empresa'],
            'asset_id'      => $items['asset_id'],
            'tipo'          => $items['tipo'],
            'created_by'    => $items['created_by'],
            'cliente_id'    => $items['cliente_id'],
            'fpgto'         => $items['fpgto'],
            'cpgto'         => $items['cpgto'],
            'desconto'      => $items['desconto'],
            'juros'         => $items['juros'],
            'pago'          => $items['pago'],
            'valor'         => $items['valor'],
            'state'         => $items['state'],
            'access'        => $items['access'],
            'created'       => $items['created'],
            'modified'      => $items['modified'],
            'options'	    => isset($items['options']) ? $items['options'] : 0,
            'date' 	  	    => date('Y-m-d H:i:s', time()),
            'vat'           => isset($items['vat']) ? $items['vat'] : $this->_config['vat']
        );
    }

    /**
     * Checks if the parameter is an array
     * and different from zero
     *
     * @param array $items
     * @access private
     * @return boolean
     */
    private function _isArray($items)
    {
        $items = (array) $items;
        if (!is_array($items) or count($items) == 0)
        {
            throw new \Exception('The method takes an array.');
            return FALSE;
        }
    }

    /**
     * Checks if the parameter is an array
     * and different from zero
     *
     * @param array $items
     * @access private
     * @return boolean
     */
    private function _isCartArray($items = array())
    {
        if (!is_array($items) or count($items) == 0)
        {
            return FALSE;
        }
        return TRUE;
    }

  
    /**
     * Verifies that the parameters are
     *
     * @param array $items
     * @access private
     * @return boolean
     */
    private function _checkCartInsert($items)
    {
        $this->_isArray($items);
         if (!isset($items['id']) or 
            ! isset($items['codigo']) or 
            ! isset($items['asset_id']) or 
            ! isset($items['empresa']) or 
            ! isset($items['tipo']) or 
            ! isset($items['created_by']) or 
            ! isset($items['cliente_id']) or 
            ! isset($items['fpgto']) or 
            ! isset($items['cpgto']) or 
            ! isset($items['desconto']) or 
            ! isset($items['juros']) or 
            ! isset($items['pago']) or 
            ! isset($items['valor']) or 
            ! isset($items['state']) or 
            ! isset($items['access']) or 
            ! isset($items['created']) or 
            ! isset($items['modified'])
            )
        {
            throw new \Exception('The Insert method takes an array that must contain id, codigo, asset_id, empresa,
                tipo, created_by, cliente_id, fpgto, cpgto, desconto, juros, pago, valor, state, access, created ou modified.');
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Verifies that the token,qtd
     * parameters exists
     *
     * @param array $items
     * @param $key
     * @throws \Exception
     * @accessprivate
     * @return boolean
     */
    private function _checkCartUpdate($items)
    {
        $this->_isArray($items);
      
        if (!isset($items['token']) or ! isset($items["key"]))
        {
            throw new \Exception("The Update method takes an array that must contain token or {$items["key"]}.");
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Verifies that the token
     * parameter exists
     *
     * @param array $items
     * @throws \Exception
     * @access private
     * @return boolean
     */
    private function _checkCartRemove($items)
    {
        if (!isset($items['token']))
        {
            throw new \Exception('The Remove method takes an array that must contain token.');
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Check if there are options
     *
     * @param $token
     * @internal param array $items
     * @access    private
     * @return boolean
     */
    private function _checkHasOption($token)
    {
    	if (!isset($this->_session['vendas'][$token]['options']) OR count($this->_session['vendas'][$token]['options']) == 0)
		{
			return FALSE;
		}
		return TRUE;
    }

    /**
     * Number_format for the price,
     * total, sub-total, vat.
     *
     * @param $number
     * @internal param array $items
     * @access    private
     * @return    integer
     */
    private function _formatNumber($number)
    {
        if ($number == '')
        {
        	return FALSE;
        }
        return number_format($number, 2, '.', ',');
    }

    /**
     * Add a product to cart
     *
     * @example $this->VendasCart()->insert($request->getPost());
     * @example $this->VendasCart()->insert(array(id => '', 'qtd' => '', 'price' => '', 'name' => ''));
     * @param array $items
     * @access public
     * @return null
     */
    public function insert($items = array())
    {
        if ($this->_checkCartInsert($items) === TRUE)
        {
            $token = 'cabecalho';
            $isNew = true;
            $shouldUpdate = $this->_config['on_insert_update_existing_item'];
            //check if should update existing product
            if($shouldUpdate){
                     if(!isset($this->_session['vendas'][$token])){
                        //fount same product already on cart
                        $isNew = false;
                    }
            }

            if($isNew){


                if (is_array($this->_session['vendas']))
                {
                    $this->_session['vendas'][$token] = $this->_cart($items);
                } else {
                    //creo il carrello in sessione
                    $this->_session['vendas'] = array();
                    $this->_session->cartId = $this->_session->getManager()->getId();
                    $this->getEventManager()->trigger(CartEvent::EVENT_CREATE_CART_POST, $this, array('cart_id'=>$this->_session->cartId));
                    //aggiungo elemento
                    $this->_session['vendas'][$token] = $this->_cart($items);
                }
                //evento per elemento aggiunto
                $this->trigger(CartEvent::EVENT_ADD_ITEM_POST, $token, $this->_session['vendas'][$token], $this);
            }else{
                //update existing product
                $this->update($items);
            }

        }
    }

    /**
     * Update the item of a header
     *
     * @example $this->VendasCart()->update(array('token' => '', 'qtd' => ''));
     * @param array $items
     * @access public
     * @return null
     */
    public function update($items = array())
    {
        if ($this->_checkCartUpdate($items) === TRUE)
        {
			$this->_session['vendas'][$items['token']]['index'] = $items['value'];
            $this->trigger(CartEvent::EVENT_UPDATE_QUANTITY_POST, $items['token'], $this->_session['vendas'][$items['token']], $this);
        }
    }

     /**
     * Delete all items from the cart
     *
     * @access public
     * @return null
     */
    public function destroy()
    {
        $this->_session->offsetUnset('vendas');
        $this->getEventManager()->trigger(CartEvent::EVENT_DELETE_CART_POST, $this, ['cart_id'=>$this->_session->cartId]);
    }

    /**
     * Extracts all items from the cart
     *
     * @access public
     * @return array
     */
    public function cart()
    {
        $items = $this->_session->offsetGet('vendas');
        if ($this->_isCartArray($items) === TRUE)
        {
            $items = array();
            foreach ($this->_session->offsetGet('vendas') as $key => $value)
            {
                $items[$key] = array(
                    'id'            => $value['id'],
                    'codigo'        => $value['codigo'],
                    'empresa'       => $value['empresa'],
                    'asset_id'      => $value['asset_id'],
                    'tipo'          => $value['tipo'],
                    'created_by'    => $value['created_by'],
                    'cliente_id'    => $value['cliente_id'],
                    'fpgto'         => $value['fpgto'],
                    'cpgto'         => $value['cpgto'],
                    'desconto'      => $value['desconto'],
                    'juros'         => $value['juros'],
                    'pago'          => $value['pago'],
                    'valor'         => $value['valor'],
                    'state'         => $value['state'],
                    'access'        => $value['access'],
                    'created'       => $value['created'],
                   	'options' 	    => $value['options'],
                    'date' 		    => $value['date'],
                    'vat'           => $value['vat']
                );
            }
            return $items;
        }
    }


    /**
     * Counts the total number of
     * items in cart
     *
     * @access public
     * @return array
     */
    public function total()
    {
        if ($this->_isCartArray($this->cart()) === TRUE)
        {
            return array(
                'sub-desconto'  => $this->_formatNumber($price),
                'vat' 		    => $this->_formatNumber($vat),
                'total' 	    => $this->_formatNumber($price + $vat)
            );
        }
    }

    /**
     * item_options
     *
     * Returns the an array of options, for a particular product token.
     *
     * @access	public
     * @return	array
     */
    public function item_options($token)
    {
    	if($this->_checkHasOption($token) === TRUE)
    	{
    		return $this->_session['vendas'][$token]['options'];
    	}
    }

    public function getEventManager()
    {
        return $this->eventManager;
    }

    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(
            'VendasCart\Service\Cart',
            __CLASS__,
            get_called_class(),
            'zendcart'
        );
        // $eventManager->setEventClass('VendasCart\Service\Cart');

        $this->eventManager = $eventManager;
        return $this;
    }


    private function trigger($name, $token, $cartItem, $target=null)
    {
        $cartId = $this->_session->cartId;
        $event = new CartEvent();
        $event->setCartId($cartId)
            ->setItemToken($token)
            ->setCartItem($cartItem);

        if ($target)
            $event->setTarget($target);

        $this->getEventManager()->trigger($name, $event);
    }
}
