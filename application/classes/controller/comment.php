<?php defined('SYSPATH') or die('No direct script access.');

 class Controller_Comment extends Controller_Main {

   public function action_add_comment() {
        if($_POST) {
           $res = DB::insert('comments',array(
                'comment_text',
                'comment_date',
                'name',
            ))->values(array(
                htmlspecialchars($_POST['comment_text']),
                $_POST['comment_date'],
                $_POST['comm_name'],
            ))->execute();
            $new_comm_id = $res[0];
            
            DB::insert('comm_mat',array(
                'mat_id',
                'comm_id',
            ))->values(array(
                $_POST['mat_id'],
                $new_comm_id,
            ))->execute();
            /*
            DB::insert('comm_user',array(
                'user_id',
                'comm_id',
            ))->values(array(
                $_POST['user_id'],
                $new_comm_id,
            ))->execute();
            */
            $ress = DB::select()->from('comm_mat')->where('mat_id','=',$_POST['mat_id'])->execute()->as_array();
            $all_comment = count($ress);
            DB::update('materials')->set(array('comment_count'=>$all_comment))->where('material_id', '=', $_POST['mat_id'])->execute();
            $this->redirect('/material/'.$_POST['mat_id'].'#start_comm');
        }
        
   }
   
    

} // End Comment
