<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Secretar extends Controller_Template {

    
    public $template = 'admin/template_admin';
    
    public function before()
    {
        parent::before();
        View::set_global('moderator', Session::instance()->get('moderator'));				
        View::set_global('description', 'Самый лучший сайт');
        $this->template->top_head_admin = View::factory('secretar/top_head_secretar');
        $this->template->header_admin = View::factory('secretar/header_secretar');
        $this->template->container_top = '';
        $this->template->content_admin = '';
        $this->template->container_right = '';
        $this->template->footer = '';
        
    }  
                
	public function action_index()
	{  
        $this->chek_moderator_enter();  
        $data = array();
        $this->template->content_admin = View::factory('secretar/content/moderator_index',$data);
	}
    
    public function action_secretar_login()
	{ 
	   
       
	   if(!empty($_POST)) 
       {
           $login = $_POST['admin_login'];
           $pass = $_POST['admin_pass'];
	       if($login == 'secret' && $pass == 'secret') 
           {
           Session::instance()->set('secretar', array('secretar'));
             $this->request->redirect('/secretar/index');
	       }
           else {
            
                echo 'Не верный ввод информации!';
           }
	       
	   }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('secretar/secretar_login');
	}
    
    public function chek_moderator_enter() {
        $moderator = Session::instance()->get('secretar');
        if(!isset($moderator)) {
            $this->request->redirect('/secretar/secretar_login');
        }
    }
    
     //end pages
    
    public function action_select_materials() {
           
        $data = array();
        
        $this->template->content_admin = View::factory('secretar/materials/select_materials',$data);
       
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
            'secretar',
            ''
            ))->execute();
            
       $insert_id = $result[0];
            
       $cat_mat = $_POST['cat_mat'];
       
       
            DB::insert('cat_mat',array(
            'cat_id',
            'material_id'
            ))->values(array(
            $cat_mat,
            $insert_id))
            ->execute();
      
       $this->request->redirect('/secretar/select_materials');
       }
           $data = array();
	   $this->template->content_admin = View::factory('secretar/materials/add_material',$data);
       
    }
    
    public function action_delete_material() {
       
           $material_id = $_GET['material_id'];
           DB::delete('materials')->where('material_id','=',$material_id)->execute();
           $this->request->redirect('/secretar/select_materials');
       
    }//end edit cat
    
    
     public function action_update_material() {
            
            
             $material_id = $_GET['material_id'];
           
            if($_POST) {
                
            Model::factory('cat')->del_material_cat($material_id);
            $cat_mat = $_POST['cat_mat'];
               
                    DB::insert('cat_mat',array(
                    'cat_id',
                    'material_id'
                    ))->values(array(
                    $cat_mat,
                    $material_id))
                    ->execute();
            Model::factory('material')->update_material($_POST,$material_id);
            $this->request->redirect('/secretar/update_material?material_id='.$material_id);
            }
           $data = array();
           $data['material_id'] = $material_id;
           $data['edit_material'] = Model::factory('material')->edit_material($material_id);
           //$data['edit_material_cat'] = Model::factory('material')->edit_material_cat($material_id);
           //print_r($data['edit_material']);
           //die;
	   $this->template->content_admin = View::factory('secretar/materials/update_material',$data);
       
    }//end edit cat
 

} // End Admin
