<?php
namespace Vendas\Factory;



use Interop\Container\ContainerInterface;

use Vendas\Controller\Plugin\CartHeader;
use Vendas\Form\ItensVendidosFilter;
use Zend\ServiceManager\Factory\FactoryInterface;

class CartItensFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @throws \Exception
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('ServiceManager')->get('Configuration');

        if (!isset($config['zendcart']))
        {
            throw new \Exception('Configuration ZendCart not set.');
        }

        if (!isset($config['zendcart']['vat']))
        {
            throw new \Exception('No vat index defined.');
        }

        $default = array(
            'on_insert_update_existing_item' => false,
            'table'=>'bs_itensvendidos'
        );
        /*if (!isset($items['id']) or
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
        }*/

        $options = array_merge($default, $config['zendcart']);

        return new CartHeader($container,$options,$container->get(ItensVendidosFilter::class));
    }
}