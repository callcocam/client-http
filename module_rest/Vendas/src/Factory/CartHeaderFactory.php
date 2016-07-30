<?php
namespace Vendas\Factory;



use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Vendas\Controller\Plugin\CartHeader;
use Vendas\Form\VendasFilter;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class CartHeaderFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
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
            'table'=>'bs_vendas'
        );

        $options = array_merge($default, $config['zendcart']);

        return new CartHeader($container,$options,$container->get(VendasFilter::class));
    }
}