<?php
namespace Estoque;
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 28/07/2016
 * Time: 00:16
 */

use Estoque\Controller\CategoriasController;
use Estoque\Controller\Factory\CategoriasControllerFactory;
use Estoque\Controller\Factory\MarcasControllerFactory;
use Estoque\Controller\Factory\ProdutosControllerFactory;

use Estoque\Controller\MarcasController;
use Estoque\Controller\ProdutosController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
             'produtos' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/produtos[/:action][/:id][/:page]',
                    'defaults' => [
                        'controller' => Controller\ProdutosController::class,
                        'action'     => 'index',
                        'id'=>'0',
                        'page'=>'1'
                    ],

                ],
                'may_terminate' => true,
                'child_routes' => [
                    'list' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '[/:page]',
                            'defaults' => [
                                'controller' => Controller\ProdutosController::class,
                                'page'     => '1',
                            ],
                        ],
                    ],
                    'produtos-create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/produtos',
                            'defaults' => [
                                'controller' => Controller\ProdutosController::class,
                                'action'     => 'create',
                            ],
                        ],
                    ],
                ]
            ],
            'categorias' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/categorias[/:action][/:id][/:page]',
                    'defaults' => [
                        'controller' => Controller\CategoriasController::class,
                        'action'     => 'index',
                        'id'=>'0',
                        'page'=>'1'
                    ],

                ],
                'may_terminate' => true,
                'child_routes' => [
                    'list' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '[/:page]',
                            'defaults' => [
                                'controller' => Controller\CategoriasController::class,
                                'page'     => '1',
                            ],
                        ],
                    ],
                    'categorias-create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/categorias',
                            'defaults' => [
                                'controller' => Controller\CategoriasController::class,
                                'action'     => 'create',
                            ],
                        ],
                    ],
                ]
            ],
            'marcas' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/marcas[/:action][/:id][/:page]',
                    'defaults' => [
                        'controller' => Controller\MarcasController::class,
                        'action'     => 'index',
                        'id'=>'0',
                        'page'=>'1'
                    ],

                ],
                'may_terminate' => true,
                'child_routes' => [
                    'list' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '[/:page]',
                            'defaults' => [
                                'controller' => Controller\MarcasController::class,
                                'page'     => '1',
                            ],
                        ],
                    ],
                    'marcas-create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/marcas',
                            'defaults' => [
                                'controller' => Controller\MarcasController::class,
                                'action'     => 'create',
                            ],
                        ],
                    ],
                ]
            ],


        ],
    ],
    'controllers' => [
        'factories' => [
            ProdutosController::class=>ProdutosControllerFactory::class,
            CategoriasController::class=>CategoriasControllerFactory::class,
            MarcasController::class=>MarcasControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
