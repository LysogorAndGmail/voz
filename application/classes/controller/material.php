<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Material extends Controller_Main {

                   
    public function action_show_material()
    {   
        $data = array();
        $lang = 'rus';
        $data['new_user'] = Session::instance()->get('new_user');
        if($_GET) {
            $reiting = $_GET['rating'];
            $mat_id = $_GET['mat_id'];
            $user_login = $_GET['user_login'];
            Model::factory('material')->reiting($reiting,$mat_id,$user_login);   
        }
        $id = $this->request->param('id');
        $data['page_all'] = Model::factory('page')->find_all_lang($lang); 
        $data['material'] = Model::factory('material')->get_material($id);
        //print_r($data['material']);
        //die;
        $data['mostcat_all'] = Model::factory('cat')->all_mostcat_lang($lang);
        $data['mat_comments'] = Model::factory('comment')->get_material_comment($id);
        //print_r($data['mat_comments']);
        Model::factory('material')->show_plus($id,$data['material']['material_views']);
        if($data['material']['ho_insert'] == 'moderator') {
            $data['ho_insert'] = 'moderator';
            $data['material_cat'] = Model::factory('material')->get_mat_cat_moderator($id);
        }else {
            $data['ho_insert'] = 'admin';
            $data['material_cat'] = Model::factory('material')->get_mat_cat($id);
        }        
        $this->template->top_head = View::factory('material/material_top_head',$data);
        $this->template->content = View::factory('material/show_material',$data);

        }
    

} // End Page
