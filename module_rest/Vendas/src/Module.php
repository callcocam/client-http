<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 10:31
 */

namespace Vendas;


use Vendas\Model\Vendas\Factory\ItensVendidosFactory;
use Vendas\Model\Vendas\Factory\ItensVendidosRepositoryFactory;
use Vendas\Model\Vendas\Factory\VendasFactory;
use Vendas\Model\Vendas\Factory\VendasRepositoryFactory;
use Vendas\Model\Vendas\ItensVendidos;
use Vendas\Model\Vendas\ItensVendidosRepository;
use Vendas\Model\Vendas\Vendas;
use Vendas\Model\Vendas\VendasRepository;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface,ControllerPluginProviderInterface{

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__.'/../config/module.config.php';
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return [
            'factories'=>[
                Vendas::class=>VendasFactory::class,
                VendasRepository::class=>VendasRepositoryFactory::class,
                ItensVendidos::class=>ItensVendidosFactory::class,
                ItensVendidosRepository::class=>ItensVendidosRepositoryFactory::class,
            ]
        ];
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getControllerPluginConfig()
    {
        // TODO: Implement getControllerPluginConfig() method.
    }
}