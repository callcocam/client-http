<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 11:24
 */

namespace Vendas\Model\Vendas\Factory;


use Base\Model\Factory\AbstractFactory;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Vendas\Model\Vendas\Vendas;
use Vendas\Model\Vendas\VendasRepository;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class VendasRepositoryFactory extends AbstractFactory implements FactoryInterface{

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
        return new VendasRepository($this->tableGateway('bs_vendas',Vendas::class,$container));
    }
}