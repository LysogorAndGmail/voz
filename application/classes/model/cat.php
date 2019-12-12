<?php defined('SYSPATH') or die('No direct script access.');

class Model_Cat extends ORM {

    protected $_table_name = 'cats';
    
    protected $_primary_key = 'cat_id';
    
    public function all_mostcat_lang($lang) {
        if($lang ==  'rus'){
            $res = DB::select()->from('cats')->where('parent_id','=',0)->as_object()->execute();
        }else {
            $res = DB::select()->from('cats')->join('cats_lang')->on('cats.cat_id','=','cats_lang.cat_id')->where('parent_id','=',0)->and_where('cats_lang.langvige','=',$lang)->execute()->as_array();
        }
        return $res;
    }
    public function get_cat($cat_id) {
        $res = DB::select()->from('cats')->where('cat_id','=',$cat_id)->execute()->current();
        return $res;
    }
    public function all_cat() {
        $res = DB::select()->from('cats')->execute()->as_array();
        return $res;
    }
    public function all_cat_admin() {
        $res = DB::select()->from('cats')->where('insert','=','admin')->execute()->as_array();
        return $res;
    }
     public function all_visible_cat_admin() {
        $res = DB::select()->from('cats')->where('insert','=','admin')->and_where('visible','=',1)->execute()->as_array();
        return $res;
    }
    public function all_parent_cat() {
        $res = DB::select()->from('cats')->where('parent_id','=',0)->execute()->as_array();
        return $res;
    }
    
    public function all_chaild_cats() {
        $res = DB::select()->from('cats')->where('parent_id','!=',0)->execute()->as_array();
        return $res;
    }
    public function del_material_cat($material_id) {
        DB::delete('cat_mat')->where('material_id','=',$material_id)->execute();
    }
    public function get_children($parent_id) {
       $res = DB::select()->from('cats')->where('parent_id','=',$parent_id)->execute()->as_array();
        return $res; 
        
    }
         

} // End Cat
