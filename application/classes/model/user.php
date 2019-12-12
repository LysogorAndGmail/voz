<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends Model {

    protected $_table_name = 'user';
    
    protected $_primary_key = 'user_id';
        
    public function get_user($user_id) {
        $res = DB::select()->from('user')->where('user_id','=',$user_id)->execute()->current();
        return $res;
    }
    public function get_all_users() {
        $res = DB::select()->from('user')->execute()->as_array();
        return $res;
    }
    public function user_regist($post) {
        
        $res = DB::insert('user',array('user_login','user_pass','user_email','user_status'))->values(
        array(
        $post['user_login'],
        $post['user_pass'],
        $post['user_email'],
        0
        ))->execute();
        return $res;
    }
    
    public function user_login($post) {
        
        $res = DB::select()->from('user')->
            where('user_login','=',$post['user_login'])->
            and_where('user_pass','=',$post['user_pass'])
            ->execute()->current();
           return $res;
        
        
    }
    
    public function get_user_login($user_login) {
        $res = DB::select()->from('user')->where('user_login','=',$user_login)->execute()->current();
        return $res;
    }
} // End User
