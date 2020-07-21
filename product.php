<?php

class Product extends Db_object {
    protected static $db_table = 'products';
    protected static $db_table_fields = array('product_id', 'product_name', 'cost'); // from database table called 'products'


    public $product_id,
           $product_name,
           $cost;
}
?>