<?php
namespace Home;
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 21/07/2016
 * Time: 19:21
 */

use Home\Controller\Factory\ForgottenPasswordControllerFactory;
use Home\Controller\Factory\LoginControllerFactory;
use Home\Controller\Factory\RegisterControllerFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
              'authenticate' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'authenticate',
                    ],

                ],

                ],
            'authenticate-forgotten-password' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/forgotten-password',
                    'defaults' => [
                        'controller' => Controller\ForgottenPasswordController::class,
                        'action'     => 'forgotten-password',
                    ],
                ],
            ],
            'authenticate-register' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/register',
                    'defaults' => [
                        'controller' => Controller\RegisterController::class,
                        'action'     => 'register',
                    ],
                ],
            ],
            'confirm-register' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/register/confirm-email[/:id]',
                    'defaults' => [
                        'controller' => Controller\RegisterController::class,
                        'action'     => 'confirm-email',
                        'id'=>''
                    ],
                ],
            ],
            'authenticate-logout' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/logout',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'logout',
                    ],
                ],
            ],
          ],
    ],
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => LoginControllerFactory::class,
            Controller\ForgottenPasswordController::class => ForgottenPasswordControllerFactory::class,
            Controller\RegisterController::class => RegisterControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
