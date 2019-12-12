<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comment extends Model {
    
    public function get_material_comment($mat_id) {
        
        $res = DB::select('comments.comment_text','comments.comment_date','comments.name')->from('comments')
            ->join('comm_mat')
            ->on('comments.comment_id','=','comm_mat.comm_id')
            ///->join('comm_user')
            //->on('comments.comment_id','=','comm_user.comm_id')
            ->where('comm_mat.mat_id','=',$mat_id)
            ->and_where('comments.comment_status','=',1)
            ->execute()->as_array();
            return $res;        
    } 
    
} // End Comment


















