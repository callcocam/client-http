<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 20/07/2016
 * Time: 23:03
 */
return [
    'zf-config'=>[
                'staticsalt'=>'aFGQ475SDsdfsaf2342',
                'sessao'=>'funcionarios',
                'serverHost'=>'http://rest.callcocam.com.br',
                'captchaImage'=>[
                            'wordLen' => 5,
                            'width' => 200,
                            'height' => 100,
                            'dirdata' => './data/fonts/arial.ttf',
                            'urlcaptcha'=>''
                            ],
                'ecfop'=>'555',
                'scfop'=>'666',
                'cst'=>'102',
                'clfiscal'=>'000000',
                'unidade'=>'UN',
                'cpgto'=>['A VISTA'=>'A VISTA','CREDIARIO'=>'CREDIARIO'],
                //'fpgto'=>['1'=>"A VISTA",'2'=>"UMA MAIS UMA (2 OU 1 + 1)",'3'=>"UMA MAIS DUAS (3 VZ OU 1 + 2)",'4'=>"UMA MAIS TREZ (4 OU 1 +3)",'5'=>"UMA MAIS QUATRO (5 OU 1 + 4)"],
                'fpgto'=>['1'=>"A VISTA",'2'=>'<span class="fa fa-barcode"></span>','3'=>"UMA MAIS DUAS (3 VZ OU 1 + 2)",'4'=>"UMA MAIS TREZ (4 OU 1 +3)",'5'=>"UMA MAIS QUATRO (5 OU 1 + 4)"]
                ]
];

