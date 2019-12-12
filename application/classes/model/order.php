<?php defined('SYSPATH') or die('No direct script access.');

class Model_Order extends Model {

    protected $_table_name = 'orders';
    
    protected $_primary_key = 'order_id';
        
    public function insert_new_order($post) {
        $res = DB::insert('orders',array('order_user_id','order_text','order_date'))->values(
        array(
        $post['order_user'],
        $post['order_text'],
        $post['order_date']
        ))->execute();
        return $res;
    }
    
} // End User
