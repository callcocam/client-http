<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 10:31
 */

namespace Vendas;


use Interop\Container\ContainerInterface;
use Vendas\Form\Factory\ItensVendidosFilterFactory;
use Vendas\Form\Factory\ItensVendidosFormFactory;
use Vendas\Form\Factory\VendasFilterFactory;
use Vendas\Form\Factory\VendasFormFactory;
use Vendas\Form\ItensVendidosFilter;
use Vendas\Form\ItensVendidosForm;
use Vendas\Form\VendasFilter;
use Vendas\Form\VendasForm;
use Vendas\Model\Vendas\Factory\ItensVendidosFactory;
use Vendas\Model\Vendas\Factory\ItensVendidosRepositoryFactory;
use Vendas\Model\Vendas\Factory\VendasFactory;
use Vendas\Model\Vendas\Factory\VendasRepositoryFactory;
use Vendas\Model\Vendas\ItensVendidos;
use Vendas\Model\Vendas\ItensVendidosRepository;
use Vendas\Model\Vendas\Vendas;
use Vendas\Model\Vendas\VendasRepository;
use Vendas\View\Helper\ItenVendidosHelper;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerPluginProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface,ControllerPluginProviderInterface,ViewHelperProviderInterface{

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
                VendasForm::class=>VendasFormFactory::class,
                VendasFilter::class=>VendasFilterFactory::class,
                ItensVendidos::class=>ItensVendidosFactory::class,
                ItensVendidosRepository::class=>ItensVendidosRepositoryFactory::class,
                ItensVendidosForm::class=>ItensVendidosFormFactory::class,
                ItensVendidosFilter::class=>ItensVendidosFilterFactory::class
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

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getViewHelperConfig()
    {
        return [
            'factories'=>[
                'ItenVendidosHelper'=>function(ContainerInterface $container)
                {
                    return new ItenVendidosHelper($container);
                }
            ]
        ];
    }
}