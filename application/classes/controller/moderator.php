<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Moderator extends Controller_Template {

    
    public $template = 'admin/template_admin';
    
    public function before()
    {
        parent::before();
        View::set_global('moderator', Session::instance()->get('moderator'));				
        View::set_global('description', 'Самый лучший сайт');
        $this->template->top_head_admin = View::factory('moderator/top_head_moderator');
        $this->template->header_admin = View::factory('moderator/header_moderator');
        $this->template->container_top = '';
        $this->template->content_admin = '';
        $this->template->container_right = '';
        $this->template->footer = '';
        
    }  
                
	public function action_index()
	{  
        $this->chek_moderator_enter();  
        $data = array();
        $this->template->content_admin = View::factory('moderator/content/moderator_index',$data);
	}
    
    public function action_moderator_login()
	{ 
	   
       
	   if(!empty($_POST)) 
       {
           $admin_login = $_POST['admin_login'];
           $admin_pass = $_POST['admin_pass'];
	       $res = DB::select()->from('moderators')->where('moderator_login','=',$admin_login)->and_where('moderator_pass','=',$admin_pass)->execute()->current();
    
	       if(!empty($res)) 
           {
           Session::instance()->set('moderator', $res);
             $this->request->redirect('/moderator/index');
	       }
           else {
            
                echo 'Не верный ввод информации!';
           }
	       
	   }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('moderator/moderator_login');
	}
    
    public function chek_moderator_enter() {
        $moderator = Session::instance()->get('moderator');
        if(!isset($moderator)) {
            $this->request->redirect('/moderator/moderator_login');
        }
    }
    
     //end pages
    public function action_add_cat() {
       if($_POST) {       
       DB::insert('moderator_cats',array(
            'moderator_cat_title',
            'moderator_cat_desc',
            'parent_cat'
            ))->values(array(
            $_POST['cat_title'],
            $_POST['cat_desc'],
            $_POST['parent_cat']
            ))->execute();
       $this->request->redirect('/moderator/select_cat');
       }
           $data = array();
	   $this->template->content_admin = View::factory('moderator/cat/add_cat',$data);
       
    }
    
    public function action_select_cat() {
       
           $data = array();
	   $this->template->content_admin = View::factory('moderator/cat/select_cat',$data);
       
    }//end edit cat
    
    public function action_delete_cat() {
       
           $cat_id = $_GET['cat_id'];
           DB::delete('moderator_cats')->where('moderator_cat_id','=',$cat_id)->execute();
           $this->request->redirect('/moderator/select_cat');
       
    }//end edit cat
    
    public function action_update_cat() {
            
             $cat_id = $_GET['cat_id'];
           
            if($_POST) {
            DB::update('moderator_cats')->set(array(
                'moderator_cat_title'=>$_POST['cat_title'],
                'moderator_cat_desc'=>$_POST['cat_desc']
            ))->where('moderator_cat_id','=',$cat_id)->execute();
            $this->request->redirect('/moderator/update_cat?cat_id='.$cat_id);
            }
           $data = array();
           $data['cat_id'] = $cat_id;
           $data['edit_cat'] = DB::select()->from('moderator_cats')->where('moderator_cat_id','=',$cat_id)->execute()->current();
           
	   $this->template->content_admin = View::factory('moderator/cat/update_cat',$data);
       
    }//end edit cat
    
    public function action_select_materials() {
           
        $data = array();
        
        $this->template->content_admin = View::factory('moderator/materials/select_materials',$data);
       
    }//end edit cat 
    
    public function action_add_material() {
       if($_POST) {
       $material_short = $_POST['material_short'];
       $material_title = $_POST['material_title'];
       $material_key_words = $_POST['material_key_words'];
       $material_desc = $_POST['material_desc'];
       $material_text = $_POST['material_text'];
       $material_date = $_POST['material_date'];
       $result = DB::insert('materials',array(
            'material_short',
            'material_title',
            'material_key_words',
            'material_desc',
            'material_text',
            'material_date',
            'ho_insert',
            'mod_id'
            ))->values(array(
            $material_short,
            $material_title,
            $material_key_words,
            $material_desc,
            $material_text,
            $material_date,
            'moderator',
            $_POST['mod_id']
            ))->execute();
            
       $insert_id = $result[0];
            
       $cat_mat = $_POST['cat_mat'];
       
       
            DB::insert('moderator_cat_mat',array(
            'cat_id',
            'material_id'
            ))->values(array(
            $cat_mat,
            $insert_id))
            ->execute();
      
       $this->request->redirect('/moderator/select_materials');
       }
           $data = array();
	   $this->template->content_admin = View::factory('moderator/materials/add_material',$data);
       
    }
    
    public function action_delete_material() {
       
           $material_id = $_GET['material_id'];
           DB::delete('materials')->where('material_id','=',$material_id)->execute();
           $this->request->redirect('/moderator/select_materials');
       
    }//end edit cat
    
    
     public function action_update_material() {
            
            
             $material_id = $_GET['material_id'];
           
            if($_POST) {
            print_r($_POST);
            $cat_mat = $_POST['cat_mat'];
            DB::update('moderator_cat_mat')->set(array(
            'cat_id'=>$cat_mat,
            'material_id'=>$material_id
            ))->where('material_id', '=', $material_id)->execute();
            Model::factory('material')->update_material($_POST,$material_id);
            $this->request->redirect('/moderator/update_material?material_id='.$material_id);
            }
           $data = array();
           $data['material_id'] = $material_id;
           $data['edit_material'] = Model::factory('material')->edit_material_moderator($material_id);
           //$data['edit_material_cat'] = Model::factory('material')->edit_material_cat($material_id);
           //print_r($data['edit_material']);
           //die;
           $data['cats_parent'] = Model::factory('moderatorcat')->get_children($data['edit_material']['parent_cat']);
	   $this->template->content_admin = View::factory('moderator/materials/update_material',$data);
       
    }//end edit cat
 

} // End Admin
