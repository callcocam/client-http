<?php
namespace Vendas;
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 20/07/2016
 * Time: 21:26
 */

use Vendas\Controller\Factory\ItensVendidosControllerFactory;
use Vendas\Controller\Factory\VendasControllerFactory;
use Vendas\Controller\ItensVendidosController;
use Vendas\Controller\VendasController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
           'vendas' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/vendas[/:action][/:id][/:page]',
                    'defaults' => [
                        'controller' => Controller\VendasController::class,
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
                                'controller' => Controller\VendasController::class,
                                'page'     => '1',
                            ],
                        ],
                    ],
                    'vendas-create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/vendas',
                            'defaults' => [
                                'controller' => Controller\VendasController::class,
                                'action'     => 'create',
                            ],
                        ],
                    ],
                ]
            ],

            'itensvendidos' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/itensvendidos[/:action][/:id][/:page]',
                    'defaults' => [
                        'controller' => Controller\ItensVendidosController::class,
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
                                'controller' => Controller\ItensVendidosController::class,
                                'page'     => '1',
                            ],
                        ],
                    ],
                    'itensvendidos-create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/itensvendidos',
                            'defaults' => [
                                'controller' => Controller\ItensVendidosController::class,
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
            VendasController::class=>VendasControllerFactory::class,
            ItensVendidosController::class=>ItensVendidosControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
