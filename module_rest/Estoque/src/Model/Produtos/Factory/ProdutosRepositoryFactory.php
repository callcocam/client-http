<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 00:26
 */

namespace Estoque\Model\Produtos\Factory;


use Base\Model\Factory\AbstractFactory;

use Estoque\Model\Produtos\Produtos;
use Estoque\Model\Produtos\ProdutosRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ProdutosRepositoryFactory extends AbstractFactory implements FactoryInterface {

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
       return new ProdutosRepository($this->tableGateway('bs_produtos',Produtos::class,$container));
    }
}