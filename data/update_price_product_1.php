<?php
require_once '/var/www/magento/app/Mage.php';

$storeId='1';

Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$productIds = array('1');

$products = Mage::getModel('catalog/product')->getCollection();
$products->addStoreFilter();
$products->addAttributeToSelect('*');
$products->addAttributeToFilter('entity_id', array('in' => $productIds));
foreach($products as $product)
{
    $price=$product->setPrice('23.50');
    Mage::app()->setCurrentStore($storeId);
    $product->save();
}
?>
