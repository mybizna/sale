<?php

/** @var \Modules\Base\Classes\Fetch\Menus $this */


$this->add_module_info("sale", [
    'title' => 'Sale',
    'description' => 'Sale',
    'icon' => 'fas fa-chart-pie',
    'path' => '/sale/admin/sale',
    'class_str'=> 'text-success border-success'
]);


//$this->add_menu("module", "key", "title","path", "icon", "position");
$this->add_menu("sale", "sale", "Sales", "/sale/admin/sale", "fas fa-cogs", 5);
$this->add_menu("sale", "order", "Order", "/sale/admin/order", "fas fa-cogs", 5);
$this->add_menu("sale", "cart", "Cart", "/sale/admin/cart", "fas fa-cogs", 5);
$this->add_menu("sale", "shipping", "Shipping", "/sale/admin/shipping", "fas fa-cogs", 5);
