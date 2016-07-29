<?php
namespace Vendas;
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 20/07/2016
 * Time: 21:26
 */

return [
    'router' => [
        'routes' => [
           'vendas' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/vendas[/:action][/:id][/:page]',
                    'defaults' => [
                        'controller' => Controller\ClientesController::class,
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
                                'controller' => Controller\ClientesController::class,
                                'page'     => '1',
                            ],
                        ],
                    ],
                    'vendas-create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/vendas',
                            'defaults' => [
                                'controller' => Controller\ClientesController::class,
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

        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
