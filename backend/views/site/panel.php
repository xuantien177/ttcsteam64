<?php
//echo \yiister\gentelella\widgets\Panel::widget([
//    'header'=>'hello',
//    'icon'=>'fa fa-user',
//    'expandable'=>'true'
//]);
$menuItems = [ ["label" => "Home", "url" => ["site/index"], "icon" => "home"],
    ["label" => "User", "url" => ["user/index"], "icon" => "user"],
    ["label" => "Sản phẩm", "url" => ["san-pham/index"], "icon" => "square"],
    ["label" => "Đơn hàng", "url" => ["don-hang/index"], "icon" => "shopping-cart"],];


echo \yiister\gentelella\widgets\Menu::widget([
    'items'=>$menuItems
]);

?>