<?php
/**
 * Created by PhpStorm.
 * User: Call
 * Date: 29/07/2016
 * Time: 21:13
 */

namespace Vendas\Controller\Plugin\Interfaces;



use Base\Model\AbstractModel;


interface CartInterface {

    public function add(AbstractModel $vendas);
    public function update(AbstractModel $vendas);
    public function remove($token);
    public function destroy();
    public function read();
    public function total();
    public function check(AbstractModel $filter);
    public function isResult();

} 