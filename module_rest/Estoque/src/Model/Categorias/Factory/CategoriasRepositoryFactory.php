<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 23:56
 */

namespace Estoque\Model\Categorias\Factory;


use Base\Model\Factory\AbstractFactory;
use Estoque\Model\Categorias\Categorias;
use Estoque\Model\Categorias\CategoriasRepository;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoriasRepositoryFactory extends AbstractFactory implements FactoryInterface {

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
        return new CategoriasRepository($this->tableGateway('bs_categorias',Categorias::class,$container));
    }
}