<?php defined('SYSPATH') or die('No direct script access.');

class Model_ModeratorCat extends Model {

    public function all_moderator_cats() {
        $res = DB::select()->from('moderator_cats')->execute()->as_array();
        return $res;
    }
    public function all_moderator_cats_parent() {
        $res = DB::select()->from('moderator_cats')->where('parent_cat','=',NULL)->and_where('visible','=',1)->execute()->as_array();
        return $res;
    }
    
     public function get_cat($cat_id) {
        $res = DB::select()->from('moderator_cats')->where('moderator_cat_id','=',$cat_id)->execute()->current();
        return $res;
    }
    public function get_children($cat_id) {
        $res = DB::select()->from('moderator_cats')->where('parent_cat','=',$cat_id)->execute()->as_array();
        return $res;
    }
} // End User
