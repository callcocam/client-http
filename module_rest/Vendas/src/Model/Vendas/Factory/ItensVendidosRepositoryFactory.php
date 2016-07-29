<?php
namespace Vendas\Model\Vendas\Factory;
use Base\Model\Factory\AbstractFactory;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Vendas\Model\Vendas\ItensVendidos;
use Vendas\Model\Vendas\ItensVendidosRepository;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 11:21
 */

class ItensVendidosRepositoryFactory extends AbstractFactory implements FactoryInterface {

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
        return new ItensVendidosRepository($this->tableGateway('bs_itensvendidos',ItensVendidos::class,$container));
    }
}