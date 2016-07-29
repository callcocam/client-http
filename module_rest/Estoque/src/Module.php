<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 00:16
 */

namespace Estoque;




use Estoque\Form\CategoriasFilter;
use Estoque\Form\CategoriasForm;
use Estoque\Form\Factory\CategoriasFilterFactory;
use Estoque\Form\Factory\CategoriasFormFactory;
use Estoque\Form\Factory\MarcasFilterFactory;
use Estoque\Form\Factory\MarcasFormFactory;
use Estoque\Form\Factory\ProdutosFilterFactory;
use Estoque\Form\Factory\ProdutosFormFactory;
use Estoque\Form\MarcasFilter;
use Estoque\Form\MarcasForm;
use Estoque\Form\ProdutosFilter;
use Estoque\Form\ProdutosForm;
use Estoque\Model\Categorias\Categorias;
use Estoque\Model\Categorias\CategoriasRepository;
use Estoque\Model\Categorias\Factory\CategoriasFactory;
use Estoque\Model\Categorias\Factory\CategoriasRepositoryFactory;
use Estoque\Model\Marcas\Factory\MarcasFactory;
use Estoque\Model\Marcas\Factory\MarcasRepositoryFactory;
use Estoque\Model\Marcas\Marcas;
use Estoque\Model\Marcas\MarcasRepository;
use Estoque\Model\Produtos\Factory\ProdutosFactory;
use Estoque\Model\Produtos\Factory\ProdutosRepositoryFactory;
use Estoque\Model\Produtos\Produtos;
use Estoque\Model\Produtos\ProdutosRepository;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface {

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
              ProdutosRepository::class=>ProdutosRepositoryFactory::class,
              Produtos::class=>ProdutosFactory::class,
              ProdutosForm::class=>ProdutosFormFactory::class,
              ProdutosFilter::class=>ProdutosFilterFactory::class,
              Categorias::class=>CategoriasFactory::class,
              CategoriasRepository::class=>CategoriasRepositoryFactory::class,
              CategoriasForm::class=>CategoriasFormFactory::class,
              CategoriasFilter::class=>CategoriasFilterFactory::class,
              Marcas::class=>MarcasFactory::class,
              MarcasRepository::class=>MarcasRepositoryFactory::class,
              MarcasForm::class=>MarcasFormFactory::class,
              MarcasFilter::class=>MarcasFilterFactory::class


          ]
        ];
    }
}