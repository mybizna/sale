<?php

$this->add_module_info("sale", [
    'title' => 'Sale',
    'description' => 'Sale',
    'icon' => 'fas fa-chart-pie',
    'path' => '/sale/admin/sale',
    'class_str'=> 'text-success border-success'
]);


//$this->add_menu("module", "key", "title","path", "icon", "position");
$this->add_menu("sale", "sales", "Sales", "/sale/admin/sale", "fas fa-cogs", 5);

//$this->add_submenu("module", "key", "title","path", "position");

