<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Gazetaadmin extends Controller_Template {

    
    public $template = 'gazeta_admin/template_admin';
    
    public function before()
    {
        parent::before();
        View::set_global('gazeta_admin', Session::instance()->get('gazeta_admin'));				
        View::set_global('description', 'Самый лучший сайт');
        $this->template->top_head_admin = View::factory('gazeta_admin/top_head_gazeta_admin');
        $this->template->header_admin = View::factory('gazeta_admin/header_gazeta_admin');
        $this->template->container_top = '';
        $this->template->content_admin = '';
        $this->template->container_right = '';
        $this->template->footer = '';
        
    }  
                
	public function action_index()
	{  
        $this->chek_moderator_enter();  
        $data = array();
        $this->template->content_admin = View::factory('gazeta_admin/content/gazeta_admin_index',$data);
	}
    
    public function action_gazeta_login()
	{ 
	   
       
	   if(!empty($_POST)) 
       {    
	       if($_POST['admin_login'] == 'gazeta' && $_POST['admin_pass'] == 'gazeta_pass') 
           {
           Session::instance()->set('gazeta_admin', $_POST['admin_login']);
             $this->request->redirect('/gazetaadmin/index');
	       }
           else {
            
                echo 'Не верный ввод информации!';
           }
	       
	   }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('gazeta_admin/gazeta_login');
	}
    
    public function chek_moderator_enter() {
        $moderator = Session::instance()->get('gazeta_admin');
        if(!isset($moderator)) {
            $this->request->redirect('/gazetaadmin/gazeta_login');
        }
    }
    
     //end pages
    public function action_add_gazeta_cat() {
       if($_POST) {       
       DB::insert('gazeta_cat',array(
            'g_c_title'
            ))->values(array(
            $_POST['cat_title']
            ))->execute();
       $this->request->redirect('/gazetaadmin/select_gazeta_cat');
       }
           $data = array();
	   $this->template->content_admin = View::factory('gazeta_admin/cat/add_gazeta_cat',$data);
       
    }
    
    public function action_select_gazeta_cat() {
       
           $data = array();
	   $this->template->content_admin = View::factory('gazeta_admin/cat/select_gazeta_cat',$data);
       
    }//end edit cat
    
    public function action_delete_gazeta_cat() {
       
           $cat_id = $_GET['cat_id'];
           DB::delete('gazeta_cat')->where('g_c_id','=',$cat_id)->execute();
           $this->request->redirect('/gazetaadmin/select_gazeta_cat');
       
    }//end edit cat
 
    
    public function action_select_gazeta_materials() {
           
        $data = array();
        $data['gazeta_materials'] = DB::select()->from('gazeta_materials')->execute()->as_array();
        $this->template->content_admin = View::factory('gazeta_admin/materials/select_gazeta_materials',$data);
       
    }//end edit cat 
    
    public function action_add_gazeta_material() {
        
       if($_POST) {
       DB::insert('gazeta_materials',array(
            'g_m_title',
            'g_m_meta_key',
            'g_m_meta_desc',
            'g_m_text',
            'g_m_cat_id'
            ))->values(array(
            $_POST['material_title'],
            $_POST['material_meta_key'],
            $_POST['material_meta_desc'],
            $_POST['material_text'],
            $_POST['material_cat_id']
            ))->execute();
      
       $this->request->redirect('/gazetaadmin/select_gazeta_materials');
       }
           $data = array();
	   $this->template->content_admin = View::factory('gazeta_admin/materials/add_gazeta_material',$data);
       
    }
    
    public function action_delete_gazeta_material() {
       
           $material_id = $_GET['material_id'];
           DB::delete('gazeta_materials')->where('g_m_id','=',$material_id)->execute();
           $this->request->redirect('/gazetaadmin/select_gazeta_materials');
       
    }//end edit cat
    
    
     public function action_update_gazeta_material() {
                       
            if($_POST) {
            
            DB::update('gazeta_materials')->set(array(
            'g_m_title'=>$_POST['material_title'],
            'g_m_meta_key'=>$_POST['material_meta_key'],
            'g_m_meta_desc'=>$_POST['material_meta_desc'],
            'g_m_text'=>$_POST['material_text'],
            'g_m_cat_id'=>$_POST['material_cat_id']
            ))->where('g_m_id', '=', $_GET['material_id'])->execute();
            $this->request->redirect('/gazetaadmin/update_gazeta_material?material_id='.$_GET['material_id']);
            }
           $data = array();
           $data['material_id'] = $_GET['material_id'];
           $data['edit_material'] = DB::select()->from('gazeta_materials')->where('g_m_id','=',$_GET['material_id'])->execute()->current();
           $data['cats'] =  DB::select()->from('gazeta_cat')->execute()->as_array();
	   $this->template->content_admin = View::factory('gazeta_admin/materials/update_gazeta_material',$data);
       
    }//end edit cat
 
    public function action_upload_materials_img() {
        if(isset($_FILES)) {
            $img_name = $_FILES['mat_img']['name'];
            $temp = $_FILES['mat_img']['tmp_name'];
                        
            if (move_uploaded_file($temp, "gazeta_images/".$img_name)) {
                echo "Файл корректен и был успешно загружен.\n";
            } else {
                echo "Возможная атака с помощью файловой загрузки!\n";
                die;
            }
            
        }else {
            die;
        }
    }
    
     public function action_look_images_gazeta() {
        $data = array();
        $this->template->content_admin = View::factory('gazeta_admin/content/folder_content',$data);     
    }
    
    public function action_delete_files() {
        unlink($_SERVER['DOCUMENT_ROOT'].'/gazeta_images/'.$_GET['file_name']);
        $this->request->redirect('/gazetaadmin/look_images_gazeta');    
    }

} // End Admin
