<?php defined('SYSPATH') or die('No direct script access.');

class Model_Material extends Model {

   
    
    public function get_all_materials($cat_id) {
        
        $res = DB::select()->from('materials')
            ->join('cat_mat')
            ->on('materials.material_id','=','cat_mat.material_id')
            ->join('rating')
            ->on('materials.material_id','=','rating.mat_id')
            ->where('cat_mat.cat_id','=',$cat_id)->order_by('materials.material_id','DESC')->execute()->as_array();
            return $res;        
    } 
    public function get_all_materials_moderator($cat_id) {
        
        $res = DB::select()->from('materials')
            ->join('moderator_cat_mat')
            ->on('materials.material_id','=','moderator_cat_mat.material_id')
            ->where('moderator_cat_mat.cat_id','=',$cat_id)
            ->and_where('materials.ho_insert','=','moderator')
            ->order_by('materials.material_id','DESC')
            ->execute()->as_array();
            return $res;        
    }
    public function find_all($ho_insert) {
        
        $res = DB::select()->from('materials')->where('ho_insert','=',$ho_insert)->order_by('material_id','DESC')->execute()->as_array();
        return $res;
    }
    
    public function get_material($mat_id) {
        
        $res = DB::select()->from('materials')->where('materials.material_id','=',$mat_id)->execute()->current();
        return $res;        
    } 
    public function edit_material($mat_id) {
        
        $res = DB::select()->from('materials')
            ->join('cat_mat')->on('materials.material_id','=','cat_mat.material_id')
            ->join('cats')->on('cat_mat.cat_id','=','cats.cat_id')
            ->where('materials.material_id','=',$mat_id)->execute()->current();
            return $res;        
    }
    public function edit_material_moderator($mat_id) {
        
        $res = DB::select()->from('materials')
            ->join('moderator_cat_mat')->on('materials.material_id','=','moderator_cat_mat.material_id')
            ->join('moderator_cats')->on('moderator_cat_mat.cat_id','=','moderator_cats.moderator_cat_id')
            ->where('materials.material_id','=',$mat_id)->execute()->current();
            return $res;        
    }
    public function edit_material_cat($mat_id) {
        
        $res = DB::select('cats.cat_title','cats.cat_id')->from('materials')
            ->join('cat_mat')->on('materials.material_id','=','cat_mat.material_id')
            ->join('cats')->on('cat_mat.cat_id','=','cats.cat_id')
            ->where('materials.material_id','=',$mat_id)->execute()->as_array();
            return $res;        
    }
    
    public function get_mat_cat($mat_id) {
            $res = DB::select()->from('materials')
            ->join('cat_mat')->on('materials.material_id','=','cat_mat.material_id')
            ->join('cats')->on('cat_mat.cat_id','=','cats.cat_id')
            ->where('materials.material_id','=',$mat_id)->execute()->current();       
        return $res;
    }
    
    public function mat_all($cat_id,$offset,$per_page) {
        
        $res = DB::select()->from('materials')
            ->join('cat_mat')
            ->on('materials.material_id','=','cat_mat.material_id')
            ->join('rating')
            ->on('materials.material_id','=','rating.mat_id')
            ->where('cat_mat.cat_id','=',$cat_id)->order_by('materials.material_id','DESC')->limit($per_page)->offset($offset)->execute()->as_array();
            return $res;        
    }
    public function mat_all_moderator($cat_id,$offset,$per_page) {
        
        $res = DB::select()->from('materials')
            ->join('moderator_cat_mat')
            ->on('materials.material_id','=','moderator_cat_mat.material_id')
            ->where('moderator_cat_mat.cat_id','=',$cat_id)
            ->and_where('materials.ho_insert','=','moderator')
            ->order_by('materials.material_id','DESC')->limit($per_page)->offset($offset)->execute()->as_array();
            return $res;        
    }  
     
    public function random_mat_all() {
        $res = DB::select()->from('materials')->execute()->as_array();  
        shuffle($res);
        $random = array();
        $random[0] = $res[0];
        $random[1] = $res[1];
        $random[2] = $res[2];
        return $random;
    }   
    
    public function random_mat($cat_id) {
        $res = DB::select()->from('materials')
            ->join('cat_mat')
            ->on('materials.material_id','=','cat_mat.material_id')
            ->where('cat_mat.cat_id','=',$cat_id)->execute()->as_array();
        if(count($res) < 3) {
            return false;
        }else {
        shuffle($res);
        $random = array();
        $random[0] = $res[0];
        $random[1] = $res[1];
        $random[2] = $res[2];
        return $random;
        }
        
    }  
    
    public function show_plus($mat_id,$mat_views) {
        $new_view = $mat_views + 1;
        $res = DB::update('materials')->set(array(
            'material_views' => $new_view
            ))->where('material_id', '=', $mat_id)->execute();
    }
    
    public function update_material($post,$material_id) {
        
        DB::update('materials')->set(array(
            'material_img'=>$post['material_img'],
            'material_short'=>$post['material_short'],
            'material_title'=>$post['material_title'],
            'material_key_words'=>$post['material_key_words'],
            'material_desc'=>$post['material_desc'],
            'material_text'=>$post['material_text'],
            'material_date'=>$post['material_date']
            ))->where('material_id', '=', $material_id)->execute();
    }
    
    public function reiting($reiting,$mat_id,$user_login) {
        
        DB::insert('rating_user',array(
        'mat_id',
        'user_login',
        'user_osenka'
        ))->values(array(
           $mat_id,
           $user_login,
           $reiting
            ))->execute();
        $res = DB::select()->from('rating_user')->where('mat_id','=',$mat_id)->execute()->as_array();
        $all_ocenki = 0;
        foreach($res as $acc) {
            $all_ocenki = $all_ocenki + $acc['user_osenka'];
        }
         $srednee = $all_ocenki / count($res);
        DB::update('rating')->set(array(
        'srednee'=>$srednee
        ))->where('mat_id','=',$mat_id)->execute();
         
           
    }
    public function all_populary($limit,$lang) {
        
        if($lang ==  'rus'){
            $res = DB::select()->from('materials')->order_by('material_views','DESC')->limit($limit)->execute()->as_array();
        }else {
            $res = DB::select()->from('materials')->join('materials_lang')->on('materials.material_id','=','materials_lang.mat_id')->where('materials_lang.langvige','=',$lang)->order_by('materials.material_views','DESC')->limit($limit)->execute()->as_array();
        }
        return $res;
    }
    public function all_last_add($limit,$lang) {
        if($lang ==  'ru'){
            $res = DB::select()->from('materials')->order_by('material_id','DESC')->limit($limit)->execute()->as_array();
        }else {
            $res = DB::select()->from('materials')->join('materials_lang')->on('materials.material_id','=','materials_lang.mat_id')->where('materials_lang.langvige','=',$lang)->order_by('materials.material_views','DESC')->limit($limit)->execute()->as_array();
        }
        return $res;
    }
    public function all_comm($limit,$lang) {
        if($lang ==  'rus'){
            $res = DB::select()->from('materials')->order_by('comment_count','DESC')->limit($limit)->execute()->as_array();
        }else {
            $res = DB::select()->from('materials')->join('materials_lang')->on('materials.material_id','=','materials_lang.mat_id')->where('materials_lang.langvige','=',$lang)->order_by('materials.material_views','DESC')->limit($limit)->execute()->as_array();
        }
        return $res;
    }
    public function most_obs($limit,$lang) {
        if($lang ==  'rus'){
             $res = DB::select()->from('materials')
        ->join('rating')
        ->on('materials.material_id','=','rating.mat_id')
        ->order_by('rating.srednee','DESC')->limit($limit)->execute()->as_array();
        }else {
            $res = DB::select()->from('materials')->join('materials_lang')->on('materials.material_id','=','materials_lang.mat_id')->where('materials_lang.langvige','=',$lang)->order_by('materials.material_views','DESC')->limit($limit)->execute()->as_array();
        }
        return $res;
    }
    public function get_all_moder_mat($all_cats) {
        $res = DB::select()->from('materials')
            ->join('moderator_cat_mat')
            ->on('materials.material_id','=','moderator_cat_mat.material_id')
            ->where('moderator_cat_mat.cat_id','in',$all_cats)->order_by('materials.material_id','DESC')->execute()->as_array();
            return $res;           
    }
    
    public function get_mat_cat_moderator($id){
           $res = DB::select()->from('materials')
            ->join('moderator_cat_mat')->on('materials.material_id','=','moderator_cat_mat.material_id')
            ->join('moderator_cats')->on('moderator_cat_mat.cat_id','=','moderator_cats.moderator_cat_id')
            ->where('materials.material_id','=',$id)->execute()->current();       
        return $res;
    }
   
   public function index_pag($offset,$per_page) {
        $res = DB::select()->from('materials')->order_by('materials.material_id','DESC')->limit($per_page)->offset($offset)->execute()->as_array();
        return $res;        
    }
    
} // End Material


















