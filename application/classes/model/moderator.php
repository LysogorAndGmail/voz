<?php defined('SYSPATH') or die('No direct script access.');

class Model_Moderator extends Model {

        
    public function get_moderator($moderator_id) {
        $res = DB::select()->from('moderators')->where('moderator_id','=',$moderator_id)->execute()->current();
        return $res;
    }
    public function all_moderators() {
        $res = DB::select()->from('moderators')->execute()->as_array();
        return $res;
    }
    public function user_regist($post) {
        
        $res = DB::insert('user',array('user_login','user_pass','user_email'))->values(
        array(
        $post['user_login'],
        $post['user_pass'],
        $post['user_email']
        ))->execute();
        return $res;
    }
    
    public function user_login($post) {
        
        $res = DB::select()->from('user')->
            where('user_login','=',$post['user_login'])->
            and_where('user_pass','=',$post['user_pass'])->limit(1)->execute()->as_array();
        if($res) {
           return $res[0]; 
        }else {
           return $res;
        }
        
    }
    
    public function get_user_login($user_login) {
        $res = DB::select()->from('user')->where('user_login','=',$user_login)->execute()->current();
        return $res;
    }
} // End User
