<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {

    
    public $template = 'admin/template_admin';
    
    public function before()
    {
        parent::before();
        View::set_global('title', 'Мой сайт');				
        View::set_global('description', 'Самый лучший сайт');
        $this->template->top_head_admin = View::factory('admin/top_head_admin');
        $this->template->header_admin = View::factory('admin/header_admin');
        $this->template->container_top = '';
        $this->template->content_admin = '';
        $this->template->container_right = '';
        $this->template->footer = '';
        
    }  
                
	public function action_index()
	{   
        $this->chek_admin_enter();
        $data = array();  
	    $this->template->content_admin = View::factory('admin/content/admin_index',$data);
	}
    
    public function action_admin_login()
	{ 
	   
       
	   if(!empty($_POST)) 
       {
           $admin_login = $_POST['admin_login'];
           $admin_pass = $_POST['admin_pass'];
	       $config = Kohana::$config->load('admin_login_pass');
           $cod_login = $config->get('admin_login');
           $cod_pass = $config->get('admin_pass');
    
	       if($admin_login == $cod_login && $admin_pass == $cod_pass) 
           {
             Cookie::set('admin_enter','ok');
             $this->request->redirect('/admin/index');
	       }
           else {
            
                echo 'Не верный ввод информации!';
           }
	       
	   }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('admin/admin_login');
	}
    
    public function chek_admin_enter() {
        if(Cookie::get('admin_enter') !== 'ok') {
            $this->request->redirect('/admin/admin_login');
        }
    }
    
    //pages
    public function action_select_page() {
       $this->chek_admin_enter();
       $lang = 'ru';
           $data = array();
           $data['pages'] = ORM::factory('page')->find_all_lang($lang);
	   $this->template->content_admin = View::factory('admin/page/select_page',$data);
       
    }//end edit cat
    
      //end pages
    public function action_add_page() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('pages',array(
            'page_title',
            'page_alias',
            'page_meta_key',
            'page_meta_desc',
            'page_text'
            ))->values(array(
            $_POST['page_title'],
            $_POST['page_alias'],
            $_POST['page_meta_key'],
            $_POST['page_meta_desc'],
            $_POST['page_text']
            ))->execute();
       $this->request->redirect('/admin/select_page');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/page/add_page',$data);
       
    }
    
     public function action_update_page() {
            $this->chek_admin_enter();
             $page_alias = $_GET['page_alias'];
           
            if($_POST) {
            DB::update('pages')->set(array(
                'page_title'=>$_POST['page_title'],
                'page_alias'=>$_POST['page_alias'],
                'page_meta_key'=>$_POST['page_meta_key'],
                'page_meta_desc'=>$_POST['page_meta_desc'],
                'page_text'=>$_POST['page_text']
            ))->where('page_alias','=',$page_alias)->execute();
            $this->request->redirect('/admin/update_page/?page_alias='.$page_alias);
            }
           $data = array();
           $data['page_alias'] = $page_alias;
           $data['edit_page'] = Model::factory('page')->get_page($page_alias,'ru');
	   $this->template->content_admin = View::factory('admin/page/update_page',$data);
       
    }//end edit cat
    
     public function action_delete_page() {
       $this->chek_admin_enter();
           $page_id = $_GET['page_id'];
           DB::delete('pages')->where('page_id','=',$page_id)->execute();
           $this->request->redirect('/admin/select_page');
       
    }//end edit cat
    
    //end pages
    public function action_add_cat() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('cats',array(
            'cat_title',
            'parent_id',
            'visible',
            'insert'
            ))->values(array(
            $_POST['cat_title'],
            $_POST['parent_id'],
            $_POST['visible'],
            $_POST['insert'],
            ))->execute();
       $this->request->redirect('/admin/select_cat');
       }
           $data = array();
           $data['cats'] = Model::factory('cat')->all_parent_cat();
	   $this->template->content_admin = View::factory('admin/cat/add_cat',$data);
       
    }
    
    public function action_select_cat() {
       $this->chek_admin_enter();
           $data = array();
           $data['cats'] = Model::factory('cat')->all_cat_admin();
           
	   $this->template->content_admin = View::factory('admin/cat/select_cat',$data);
       
    }//end edit cat
    
    public function action_delete_cat() {
       $this->chek_admin_enter();
           $cat_id = $_GET['cat_id'];
           $cat = ORM::factory('cat',$cat_id);
	   $cat->delete();
           $this->request->redirect('/admin/select_cat');
       
    }//end edit cat
    
    public function action_update_cat() {
            $this->chek_admin_enter();
             $cat_id = $_GET['cat_id'];
           
            if($_POST) {
            DB::update('cats')->set(array(
                'cat_title'=>$_POST['cat_title'],
                'parent_id'=>$_POST['parent_id'],
                'visible'=>$_POST['visible'],
                'insert'=>$_POST['insert']
            ))->where('cat_id','=',$cat_id)->execute();
            $this->request->redirect('/admin/update_cat?cat_id='.$cat_id);
            }
           $data = array();
           $data['cat_id'] = $cat_id;
           $data['edit_cat'] = Model::factory('cat')->get_cat($cat_id);
           $data['mostcats'] = Model::factory('cat')->all_parent_cat();
	   $this->template->content_admin = View::factory('admin/cat/update_cat',$data);
       
    }//end edit cat
    
    
    public function action_select_materials() {
        $this->chek_admin_enter();
       $data = array();
       $data['materials'] = Model::factory('material')->find_all('admin');
       $this->template->container_left = View::factory('admin/materials/select_materials_left');
	   $this->template->content_admin = View::factory('admin/materials/select_materials',$data);
       
    }//end edit cat 
    
    
    public function action_upload_materials_img() {
        if(isset($_FILES)) {
            $img_name = $_FILES['mat_img']['name'];
            $temp = $_FILES['mat_img']['tmp_name'];
                        
            if (move_uploaded_file($temp, "material_images/".$img_name)) {
                echo "Файл корректен и был успешно загружен.\n";
                $this->request->redirect('/admin/select_materials');
            } else {
                echo "Возможная атака с помощью файловой загрузки!\n";
                die;
            }
            
        }else {
            die;
        }
    }
    
    public function action_add_material() {
       $this->chek_admin_enter();
       if($_POST) {
       $material_img = $_POST['material_img'];
       $material_short = $_POST['material_short'];
       $material_title = $_POST['material_title'];
       $material_key_words = $_POST['material_key_words'];
       $material_desc = $_POST['material_desc'];
       $material_text = $_POST['material_text'];
       $material_date = $_POST['material_date'];
       $result = DB::insert('materials',array(
            'material_img',
            'material_short',
            'material_title',
            'material_key_words',
            'material_desc',
            'material_text',
            'material_date',
            'ho_insert'
            ))->values(array(
            $material_img,
            $material_short,
            $material_title,
            $material_key_words,
            $material_desc,
            $material_text,
            $material_date,
            $_POST['ho_insert']
            ))->execute();
            
       $insert_id = $result[0];
       
       DB::insert('rating',array(
            'mat_id'
            ))->values(array(
            $insert_id))
            ->execute();
            
       $cat_mat = $_POST['cat_mat'];
       
       foreach($cat_mat as $cat_id) {
            DB::insert('cat_mat',array(
            'cat_id',
            'material_id'
            ))->values(array(
            $cat_id,
            $insert_id))
            ->execute();
       }
       $this->request->redirect('/admin/select_materials');
       }
           $data = array();
           $data['cats_parent'] = ORM::factory('cat')->all_parent_cat();
           $data['cats'] = ORM::factory('cat')->all_chaild_cats();
	   $this->template->content_admin = View::factory('admin/materials/add_material',$data);
       
    }
    
    public function action_delete_material() {
       $this->chek_admin_enter();
           $material_id = $_GET['material_id'];
           DB::delete('materials')->where('material_id','=',$material_id)->execute();
           $this->request->redirect('/admin/select_materials');
       
    }//end edit cat
    
    
     public function action_update_material() {
          $this->chek_admin_enter();  
            
             $material_id = $_GET['material_id'];
           
            if($_POST) {
            print_r($_POST);
            Model::factory('cat')->del_material_cat($material_id);
            $cat_mat = $_POST['cat_mat'];
               foreach($cat_mat as $cat_id) {
                    DB::insert('cat_mat',array(
                    'cat_id',
                    'material_id'
                    ))->values(array(
                    $cat_id,
                    $material_id))
                    ->execute();
               }
            Model::factory('material')->update_material($_POST,$material_id);
            $this->request->redirect('/admin/update_material?material_id='.$material_id);
            }
           $data = array();
           $data['material_id'] = $material_id;
           $data['edit_material'] = Model::factory('material')->edit_material($material_id);
           $data['edit_material_cat'] = Model::factory('material')->edit_material_cat($material_id);
           $data['cats_parent'] = ORM::factory('cat')->all_parent_cat();
           $data['cats'] = Model::factory('cat')->all_chaild_cats();
	   $this->template->content_admin = View::factory('admin/materials/update_material',$data);
       
    }//end edit cat
    
    //users
    public function action_select_users() {
       $this->chek_admin_enter();
           $data = array();
           $data['users'] = Model::factory('user')->get_all_users();
	   $this->template->content_admin = View::factory('admin/users/select_users',$data);
       
    }//end edit cat
    
    public function action_delete_user() {
       
        $this->chek_admin_enter();   
           DB::delete('user')->where('user_id','=',$_GET['user_id'])->execute();
	       $this->request->redirect('/admin/select_users');
       
    }//end edit cat
    //end users
    
   public function action_add_mat_lang() {
        $this->chek_admin_enter();
        if($_POST) {
            print_r($_POST);
          
       $material_id = $_POST['material_id'];
       $material_short = $_POST['material_short'];
       $material_title = $_POST['material_title'];
       $material_key_words = $_POST['material_key_words'];
       $material_desc = $_POST['material_desc'];
       $material_text = $_POST['material_text'];
       $lang = $_POST['lang'];
       $result = DB::insert('materials_lang',array(
            'mat_id',
            'mat_lang_title',
            'mat_lang_meta_key',
            'mat_lang_meta_desc',
            'mat_lang_desc',
            'mat_lang_text',
            'langvige'
            ))->values(array(
            $material_id,
            $material_title,
            $material_key_words,
            $material_desc,
            $material_short,
            $material_text,
            $lang
            ))->execute();
            $this->request->redirect('/admin/select_materials');
       
   }
    $data = array();
           $data['cats_parent'] = ORM::factory('cat')->all_parent_cat();
           $data['cats'] = ORM::factory('cat')->all_chaild_cats();
	   $this->template->content_admin = View::factory('admin/materials/add_mat_lang',$data);
   }
   public function action_del_mat_lang() {
       $this->chek_admin_enter();
           $material_id = $_GET['mat_id'];
           $lang = $_GET['lang'];
           DB::delete('materials_lang')->where('mat_id','=',$material_id)->and_where('langvige','=',$lang)->execute();
           $this->request->redirect('/admin/select_materials');
       
    }//end edit cat
    
    public function action_select_lang() {
      $this->chek_admin_enter(); 
       $data = array();
       $this->template->content_admin = View::factory('admin/langvige/select_lang',$data);
       
    }//end edit cat
    
    public function action_look_images() {
        $this->chek_admin_enter();
        $data = array();
        $this->template->content_admin = View::factory('admin/content/folder_content',$data);     
    }
    
    public function action_delete_files() {
        unlink($_SERVER['DOCUMENT_ROOT'].'/material_images/'.$_GET['file_name']);
        $this->request->redirect('/admin/look_images');    
    }
///////////////////////////////////////////////////////////////moderators
    //pages
    public function action_select_moderators() {
        $this->chek_admin_enter();
           $data = array();
           $data['moderators'] = ORM::factory('moderator')->all_moderators();
	   $this->template->content_admin = View::factory('admin/moderators/select_moderators',$data);
       
    }//end edit cat
    
      //end pages
    public function action_add_moderator() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('moderators',array(
            'moderator_login',
            'moderator_pass',
            'moderator_category'
            ))->values(array(
            $_POST['moderator_login'],
            $_POST['moderator_pass'],
            $_POST['moderator_category']
            ))->execute();
       $this->request->redirect('/admin/select_moderators');
       }
       $data = array();
       $data['moderator_cats'] = Model::factory('moderatorcat')->all_moderator_cats_parent();
	   $this->template->content_admin = View::factory('admin/moderators/add_moderator',$data);
       
    }
    
     public function action_update_moderator() {
            $this->chek_admin_enter();
             $page_alias = $_GET['page_alias'];
           
            if($_POST) {
            DB::update('pages')->set(array(
                'page_title'=>$_POST['page_title'],
                'page_alias'=>$_POST['page_alias'],
                'page_meta_key'=>$_POST['page_meta_key'],
                'page_meta_desc'=>$_POST['page_meta_desc'],
                'page_text'=>$_POST['page_text']
            ))->where('page_id','=',$_POST['page_id'])->execute();
            $this->request->redirect('/admin/update_page/?page_alias='.$_POST['page_alias']);
            }
           $data = array();
           $data['page_alias'] = $page_alias;
           $data['edit_page'] = Model::factory('page')->get_page($page_alias,'rus');
	   $this->template->content_admin = View::factory('admin/page/update_page',$data);
       
    }//end edit cat
    
     public function action_delete_moderator() {
       $this->chek_admin_enter();
           $moderator_id = $_GET['moderator_id'];
           DB::delete('moderators')->where('moderator_id','=',$moderator_id)->execute();
           $this->request->redirect('/admin/select_moderators');
       
    }//end edit cat
    public function action_select_cat_moderators() {
        $this->chek_admin_enter();
           $data = array();
           $data['moderators_cat'] = Model::factory('moderatorcat')->all_moderator_cats();
	   $this->template->content_admin = View::factory('admin/moderators/select_cat_moderators',$data);
       
    }//end edit cat

    public function action_add_moderator_cat() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('moderator_cats',array(
            'moderator_cat_title'
            ))->values(array(
            $_POST['moderator_cat_title']
            ))->execute();
       $this->request->redirect('/admin/select_cat_moderators');
       }
       $data = array();
       $data['moderators_cat'] = Model::factory('moderatorcat')->all_moderator_cats_parent();
	   $this->template->content_admin = View::factory('admin/moderators/add_moderator_cat',$data);
       
    }
    
    public function action_delete_moderator_cat() {
       $this->chek_admin_enter();
           DB::delete('moderator_cats')->where('moderator_cat_id','=',$_GET['mod_cat_id'])->execute();
           $this->request->redirect('/admin/select_cat_moderators');
       
    }//end edit cat
    /////////////////////////
    //dep
    public function action_select_deputats() {
        $this->chek_admin_enter();
           $data = array();
           $data['deputats'] = DB::select()->from('deputats')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/deputat/select_deputats',$data);
       
    }//end edit dep
    
     public function action_update_deputats() {
            $this->chek_admin_enter();
             $dep_id = $_GET['dep_id'];
           
            if($_POST) {
            DB::update('deputats')->set(array(
                'dep_okrug'=>$_POST['dep_okrug'],
                'dep_name'=>$_POST['dep_name'],
                'dep_foto'=>$_POST['dep_foto'],
                'dep_email'=>$_POST['dep_email'],
                'dep_text'=>$_POST['dep_text']
            ))->where('dep_id','=',$dep_id)->execute();
            $this->request->redirect('/admin/update_deputats/?dep_id='.$dep_id);
            }
           $data = array();
           $data['edit_dep'] = DB::select()->from('deputats')->where('dep_id','=',$dep_id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/deputat/update_dep',$data);
       
    }//end edit cat
    
    public function action_add_event_dep() {
            $this->chek_admin_enter();
             $dep_id = $_GET['dep_id'];
           
            if($_POST) {
            DB::insert('deputats_events',array(
                'dep_id',
                'event_title',
                'event_date',
                'event_text'
            ))->values(array(
                $dep_id,
                $_POST['event_title'],
                $_POST['event_date'],
                $_POST['event_text'],
                
            ))->execute();
            $this->request->redirect('/admin/select_deputats');
            }
           $data = array();
	   $this->template->content_admin = View::factory('admin/deputat/add_event_dep',$data);
       
    }//end edit cat
    ////////////////////////
    public function action_event_dep() {
            $this->chek_admin_enter();
    $dep_id = $_GET['dep_id'];
    $data = array();
    $data['all'] = DB::select()->from('deputats_events')->where('dep_id','=',$dep_id)->execute()->as_array();
    $this->template->content_admin = View::factory('admin/deputat/event_dep',$data);
       
    }//end edit cat
    
    public function action_update_event() {
            $this->chek_admin_enter();
    $id = $_GET['event_id'];
    if($_POST) {
        DB::update('deputats_events')->set(array(
            'event_title'=>$_POST['event_title'],
            'event_date'=>$_POST['event_date'],
            'event_text'=>$_POST['event_text'],
        ))->where('event_id','=',$id)->execute();
        $this->request->redirect('/admin/update_event/?event_id='.$id);
    }
    $data = array();
    $data['event'] = DB::select()->from('deputats_events')->where('event_id','=',$id)->execute()->current();
    $this->template->content_admin = View::factory('admin/deputat/update_event',$data);
       
    }//end edit cat
    /////////////////////////
    
    public function action_del_event() {
        $this->chek_admin_enter();
        $id = $_GET['event_id'];
        DB::delete('deputats_events')->where('event_id','=',$id)->execute();
        $this->request->redirect('/admin/select_deputats');
       
    }//end edit cat
    //video
    public function action_select_video() {
        $this->chek_admin_enter();
           $data = array();
           $data['videos'] = DB::select()->from('videos')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/video/select_videos',$data);
       
    }
    public function action_add_video() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('videos',array(
            'video_title',
            'video_icon',
            'video_href'
            ))->values(array(
            $_POST['video_title'],
            $_POST['video_icon'],
            $_POST['video_href']
            ))->execute();
       $this->request->redirect('/admin/select_video');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/video/add_video');
       
    }
    
     public function action_delete_video() {
       $this->chek_admin_enter();
           DB::delete('videos')->where('video_id','=',$_GET['video_id'])->execute();
           $this->request->redirect('/admin/select_video');
       
    }//end edit cat
    //galery
    //video
    public function action_select_galery() {
        $this->chek_admin_enter();
       $data = array();
       $data['folders'] = DB::select()->from('galery_folders')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/galery/select_galery_folders',$data);
       
    }
    public function action_add_galery() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('galery',array(
            'folder_id',
            'galery_name',
            'galery_type',
            'galery_desc'
            ))->values(array(
            $_POST['folder'],
            $_POST['galery_name'],
            $_POST['galery_type'],
            $_POST['galery_desc']
            ))->execute();
       $this->request->redirect('/admin/select_galery');
       }
       $data = array();
       $data['folders'] = DB::select()->from('galery_folders')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/galery/add_galery',$data);
       
    }
    
    public function action_update_folder() {
        $this->chek_admin_enter();
       $id = $_GET['id'];
       if($_POST) {       
       DB::update('galery_folders')->set(array(
                'name'=>$_POST['name'],
            ))->where('id','=',$id)->execute();     
            
       $this->request->redirect('/admin/select_galery');
       }
       $data = array();
       $data['all'] = DB::select()->from('galery')->where('folder_id','=',$id)->execute()->as_array();
       $data['folder'] = DB::select()->from('galery_folders')->where('id','=',$id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/galery/update_folder',$data);
       
    }
    
    public function action_add_galery_folder() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('galery_folders',array(
            'name'
            ))->values(array(
            $_POST['name']
            ))->execute();
       $this->request->redirect('/admin/select_galery');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/galery/add_galery_folder');
       
    }
    
    public function action_delete_galery() {
        $this->chek_admin_enter();
        DB::delete('galery_folders')->where('id','=',$_GET['id'])->execute();
        $this->request->redirect('/admin/select_galery');
    }//end edit cat
    
    public function action_del_gal_img() {
        $this->chek_admin_enter();
        DB::delete('galery')->where('folder_id','=',$_GET['folder_id'])->and_where('galery_id','=',$_GET['img_id'])->execute();
        $this->request->redirect('/admin/update_folder?id='.$_GET['folder_id']);
    }//end edit cat
    
    
    
     //video
    public function action_select_docs() {
        $this->chek_admin_enter();
       $data = array();
       $data['docs'] = DB::select()->from('docs')->order_by('doc_id','DESC')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/doc/select_doc',$data);
       
    }
    public function action_add_doc() {
        $this->chek_admin_enter();
       if($_POST) {
       DB::insert('docs',array(
            'doc_n',
            'doc_name',
            'doc_date',
            'doc_text',
            'doc_type'
            ))->values(array(
            $_POST['doc_n'],
            $_POST['doc_name'],
            $_POST['doc_date'],
            $_POST['doc_text'],
            $_POST['doc_type']
            ))->execute();
       $this->request->redirect('/admin/select_docs');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/doc/add_doc');
       
    }
    
    
     public function action_update_doc() {
            $this->chek_admin_enter();
             $doc_id = $_GET['doc_id'];
           
            if($_POST) {
            DB::update('docs')->set(array(
                'doc_n'=>$_POST['doc_n'],
                'doc_name'=>$_POST['doc_name'],
                'doc_date'=>$_POST['doc_date'],
                'doc_text'=>$_POST['doc_text'],
                'doc_type'=>$_POST['doc_type']
            ))->where('doc_id','=',$doc_id)->execute();
            $this->request->redirect('/admin/update_doc/?doc_id='.$doc_id);
            }
           $data = array();
           $data['edit_doc'] = DB::select()->from('docs')->where('doc_id','=',$doc_id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/doc/update_doc',$data);
       
    }//end edit cat
    
     public function action_delete_doc() {
       $this->chek_admin_enter();
           DB::delete('docs')->where('doc_id','=',$_GET['doc_id'])->execute();
           $this->request->redirect('/admin/select_docs');
       
    }//end edit cat
    
    //video
    public function action_select_svazi() {
        $this->chek_admin_enter();
           $data = array();
           $data['svazi'] = DB::select()->distinct(true)->from('svazi')->execute()->as_array();
           
	   $this->template->content_admin = View::factory('admin/svazi/select_svazi',$data);
       
    }
    public function action_add_svaz() {
        $this->chek_admin_enter();
       if($_POST) {
        foreach($_POST['cat_id'] as $item) {
            DB::insert('svazi',array(
            'svaz_page_id',
            'svaz_cat_id'
            ))->values(array(
            $_POST['page_id'],
            $item
            ))->execute();
        }
       
       $this->request->redirect('/admin/select_svazi');
       }
       $data = array();
       $data['pages'] = Model::factory('page')->find_all_lang('ru');
       $data['cats'] = DB::select()->from('cats')->order_by('cat_title')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/svazi/add_svazi',$data);
       
    }
    
     public function action_delete_svaz() {
       $this->chek_admin_enter();
           DB::delete('svazi')->where('svaz_id','=',$_GET['svaz_id'])->execute();
           $this->request->redirect('/admin/select_svazi');
       
    }//end edit cat
    
    ////////////////////////////////////
    public function action_select_zver() {
        $this->chek_admin_enter();
           $data = array();
           $data['zvernenna'] = DB::select()->distinct(true)->from('zvernenna')->order_by('date','DESC')->execute()->as_array();
           
	   $this->template->content_admin = View::factory('admin/zvernenna/select_zver',$data);
       
    }
    
    public function action_show_zver() {
        $this->chek_admin_enter();
           $data = array();
           $data['zver'] = DB::select()->from('zvernenna')->where('zver_id','=',$_GET['zver_id'])->execute()->current();
           if($data['zver']['zver_status'] == 0) {
                DB::update('zvernenna')->set(array(
                'zver_status'=>1
                ))->where('zver_id','=',$_GET['zver_id'])->execute();
           }
	   $this->template->content_admin = View::factory('admin/zvernenna/show_zver',$data);
       
    }
    
    
    
     public function action_delete_zver() {
       $this->chek_admin_enter();
           DB::delete('zvernenna')->where('zver_id','=',$_GET['zver_id'])->execute();
           $this->request->redirect('/admin/select_zver');
       
    }//end edit cat
    ////////////////////////////////////
    
    
     ////////////////////////////////////
    public function action_select_publinfo() {
        $this->chek_admin_enter();
           $data = array();
           $data['zvernenna'] = DB::select()->distinct(true)->from('publinfo')->order_by('zver_status')->execute()->as_array();
           
	   $this->template->content_admin = View::factory('admin/publinfo/select_zver',$data);
       
    }
    
    public function action_show_publinfo() {
        $this->chek_admin_enter();
           $data = array();
           $data['zver'] = DB::select()->from('publinfo')->where('id','=',$_GET['zver_id'])->execute()->current();
           if($data['zver']['zver_status'] == 0) {
                DB::update('publinfo')->set(array(
                'zver_status'=>1
                ))->where('id','=',$_GET['zver_id'])->execute();
           }
	   $this->template->content_admin = View::factory('admin/publinfo/show_zver',$data);
       
    }
    
     public function action_delete_publinfo() {
       $this->chek_admin_enter();
           DB::delete('publinfo')->where('id','=',$_GET['zver_id'])->execute();
           $this->request->redirect('/admin/select_publinfo');
       
    }//end edit cat
    ////////////////////////////////////
    
    
    ////////////////////////////////////
    public function action_select_dep_simple() {
        $this->chek_admin_enter();
           $data = array();
           $data['deputats'] = DB::select()->from('dep_megi')->execute()->as_array();
           
	   $this->template->content_admin = View::factory('admin/deputat/select_deputats_megi',$data);
       
    }
    
    public function action_add_dep() {
       $this->chek_admin_enter();
       if($_POST) {
        
            DB::insert('dep_megi',array(
            'dep_name',
            'dep_foto',
            'dep_text'
            ))->values(array(
            $_POST['dep_name'],
            $_POST['dep_foto'],
             $_POST['dep_text']
            ))->execute();
       
       
       $this->request->redirect('/admin/select_dep_simple');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/deputat/add_dep',$data);
       
    }
    
     public function action_update_deputats_simple() {
            $this->chek_admin_enter();
             $dep_id = $_GET['dep_id'];
           
            if($_POST) {
            DB::update('dep_megi')->set(array(
                'dep_name'=>$_POST['dep_name'],
                'dep_foto'=>$_POST['dep_foto'],
                'dep_text'=>$_POST['dep_text']
            ))->where('dep_id','=',$dep_id)->execute();
            $this->request->redirect('/admin/update_deputats_simple/?dep_id='.$dep_id);
            }
           $data = array();
           $data['edit_dep'] = DB::select()->from('dep_megi')->where('dep_id','=',$dep_id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/deputat/update_dep_simple',$data);
       
    }
    
     public function action_del_dep() {
       $this->chek_admin_enter();
           DB::delete('dep_megi')->where('dep_id','=',$_GET['dep_id'])->execute();
           $this->request->redirect('/admin/select_dep_simple');
       
    }
    ////////////////////////////////////
    
    public function action_select_blogs() {
        $this->chek_admin_enter();
        $data = array();
        $data['blogs'] = DB::select()->from('blogs')->execute()->as_array();
        $this->template->content_admin = View::factory('admin/blogs/select_blogs',$data);
    }
    
    public function action_add_blog() {
        $this->chek_admin_enter();
        if($_POST) {
            DB::insert('blogs',array(
            'blog_name',
            'blog_foto',
            'blog_text',
            'blog_email'
            ))->values(array(
            $_POST['blog_name'],
            $_POST['blog_foto'],
            $_POST['blog_text'],
            $_POST['blog_email']
            ))->execute();
       $this->request->redirect('/admin/select_blogs');
       }
       $data = array();
       $this->template->content_admin = View::factory('admin/blogs/add_blog',$data);
    }
    
     public function action_update_blog() {
            $this->chek_admin_enter();
             $blog_id = $_GET['blog_id'];
           
            if($_POST) {
            DB::update('blogs')->set(array(
                'blog_login'=>$_POST['blog_login'],
                'blog_pass'=>$_POST['blog_pass'],
                'blog_name'=>$_POST['blog_name'],
                'blog_foto'=>$_POST['blog_foto'],
                'blog_email'=>$_POST['blog_email'],
                'weight'=>$_POST['weight'],
                'blog_text'=>$_POST['blog_text']
            ))->where('blog_id','=',$blog_id)->execute();
            $this->request->redirect('/admin/update_blog?blog_id='.$blog_id);
            }
           $data = array();
           $data['edit_blog'] = DB::select()->from('blogs')->where('blog_id','=',$blog_id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/blogs/update_blog',$data);
       
    }
    
    public function action_all_blog_news() {
         $this->chek_admin_enter();
         $blog_id = $_GET['blog_id'];
         $data = array();
        $data['news'] = DB::select()->from('blog_news')->where('b_n_blog_id','=',$blog_id)->execute()->as_array();
        $this->template->content_admin = View::factory('admin/blogs/all_blog_news',$data);
    }
    
    public function action_delete_blog_news() {
           $this->chek_admin_enter();
           DB::delete('blog_news')->where('b_n_id','=',$_GET['id'])->execute();
           $this->request->redirect('/admin/select_blogs');   
    }
    
    public function action_add_blog_news() {
         $this->chek_admin_enter();
         $blog_id = $_GET['blog_id'];
           
            if($_POST) {
            DB::insert('blog_news',array(
                'b_n_blog_id',
                'b_n_title',
                'b_n_date',
                'b_n_text'
            ))->values(array(
                $blog_id,
                $_POST['blog_title'],
                $_POST['blog_date'],
                $_POST['blog_text'],
                
            ))->execute();
            $this->request->redirect('/admin/select_blogs');
            }
         $data = array();
        $this->template->content_admin = View::factory('admin/blogs/add_blog_news',$data);
    }
    
    public function action_delete_blog() {
       $this->chek_admin_enter();
           DB::delete('blogs')->where('blog_id','=',$_GET['blog_id'])->execute();
           $this->request->redirect('/admin/select_blogs');
       
    }    
    ////////////////////////////////////
     public function action_select_comments() {
        $this->chek_admin_enter();
        $data = array();
        $data['comments'] = DB::select()->from('comments')->join('comm_mat')->on('comments.comment_id','=','comm_mat.comm_id')->order_by('comment_date','DESC')->execute()->as_array();
        $this->template->content_admin = View::factory('admin/comments/select_comments',$data);
    }
    
     public function action_com_publish() {
        $this->chek_admin_enter();
        $data = array();
       DB::update('comments')->set(array(
       'comment_status'=>1
       ))->where('comment_id','=',$_GET['com_id'])->execute();
       $this->request->redirect('/admin/select_comments');
    }
    
     public function action_delete_comment() {
       $this->chek_admin_enter();
           DB::delete('comments')->where('comment_id','=',$_GET['com_id'])->execute();
           $this->request->redirect('/admin/select_comments');
       
    }
    
    ////////////////////////////////////
     //video
    public function action_select_svazi_mat() {
        $this->chek_admin_enter();
        $data = array();
        $data['svazi_mat'] = DB::select()->distinct(true)->from('svazi_mat')->execute()->as_array();
	    $this->template->content_admin = View::factory('admin/svazi_mat/select_svazi_mat',$data);
       
    }
    public function action_add_svaz_mat() {
      $this->chek_admin_enter();
       if($_POST) {
        foreach($_POST['mat_id'] as $item) {
            DB::insert('svazi_mat',array(
            'page_id',
            'mat_id'
            ))->values(array(
            $_POST['page_id'],
            $item
            ))->execute();
        }
       
       $this->request->redirect('/admin/select_svazi_mat');
       }
       $data = array();
       $data['pages'] = Model::factory('page')->find_all_lang('ru');
       $data['mats'] = DB::select()->from('materials')->order_by('material_title')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/svazi_mat/add_svazi_mat',$data);
       
    }
    
     public function action_delete_svaz_mat() {
       $this->chek_admin_enter();
           DB::delete('svazi_mat')->where('s_m_id','=',$_GET['svaz_mat_id'])->execute();
           $this->request->redirect('/admin/select_svazi_mat');
       
    }//end edit cat
    ///////////////////////////////////
    
    public function action_select_footer_menu() {
        $this->chek_admin_enter();
        $data = array();
        $data['all_footer_menu'] = DB::select()->from('footer_menu')->execute()->as_array();
	    $this->template->content_admin = View::factory('admin/footer_menu/select_footer_menu',$data);
    }
    
    public function action_add_footer_menu() {
       $this->chek_admin_enter();
       if($_POST) {
            DB::insert('footer_menu',array(
            'menu_title',
            'menu_link',
            'blok_id'
            ))->values(array(
            $_POST['menu_title'],
            $_POST['menu_link'],
            $_POST['blok_id']
            ))->execute(); 
                  
            $this->request->redirect('/admin/select_footer_menu');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/footer_menu/add_footer_menu',$data);
       
    }
    
    public function action_update_footer_menu() {
       $this->chek_admin_enter();
       $id = $_GET['menu_id'];
       if($_POST) {
            DB::update('footer_menu')->set(array(
                'menu_title'=>$_POST['menu_title'],
                'menu_link'=>$_POST['menu_link'],
                'blok_id'=>$_POST['blok_id'],
                ))->where('menu_id','=',$id)->execute();
                  
            $this->request->redirect('/admin/select_footer_menu');
       }
       $data = array();
       $data['link'] = DB::select()->from('footer_menu')->where('menu_id','=',$id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/footer_menu/update_footer_menu',$data);
       
    }
    
    
     public function action_delete_footer_menu() {
       $this->chek_admin_enter();
           DB::delete('footer_menu')->where('menu_id','=',$_GET['menu_id'])->execute();
           $this->request->redirect('/admin/select_footer_menu');
       
    }//end edit cat
    
    ///////////////////////////////// end footer menu
    
    public function action_select_votes() {
        $this->chek_admin_enter();
        $data = array();
        $data['all_votes'] = DB::select()->from('vote')->execute()->as_array();
	    $this->template->content_admin = View::factory('admin/votes/select_votes',$data);
    }
    
    public function action_add_vote() {
        $this->chek_admin_enter();
        if($_POST) {
            DB::insert('vote',array(
            'vote_title'
            ))->values(array(
            $_POST['vote_title']
            ))->execute(); 
            $this->request->redirect('/admin/select_votes');
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/votes/add_vote',$data);
    }
    
    public function action_add_vote_label() {
       $this->chek_admin_enter();
       if($_POST) {
            DB::insert('vote_label',array(
            'text',
            'vote_id'
            ))->values(array(
            $_POST['text'],
            $_POST['vote_id']
            ))->execute(); 
       }
       $data = array();
	   $this->template->content_admin = View::factory('admin/votes/add_vote_label',$data);
       
    }
    
    public function action_del_vote_label() {
       $this->chek_admin_enter();
       DB::delete('vote_label')->where('id','=',$_GET['id'])->execute();
       $this->request->redirect('/admin/add_vote_label?vote_id='.$_GET['vote_id']);
    }
    
    public function action_change_vote_status() {
        $this->chek_admin_enter();
        if($_POST){
            $res = DB::select()->from('vote')->where('vote_id','=',$_POST['id'])->execute()->current();
            if($res['status'] == 0) {
                DB::update('vote')->set(array(
                'status'=>1
                ))->where('vote_id','=',$_POST['id'])->execute();
            }else {
                DB::update('vote')->set(array(
                'status'=>0
                ))->where('vote_id','=',$_POST['id'])->execute();
            }
            echo 'ok';
        }
        die;
    }
    
    /////////
    
    ////////afisha
    public function action_select_afisha() {
        $this->chek_admin_enter();
        $data = array();
        $data['afisha_all'] = DB::select()->from('afisha')->execute()->as_array();
        $this->template->content_admin = View::factory('admin/afisha/select_afisha',$data);
    }
    
    public function action_add_afisha() {
        $this->chek_admin_enter();
        if($_POST) {
            DB::insert('afisha',array(
            'title',
            'text'
            ))->values(array(
            $_POST['title'],
            $_POST['text']
            ))->execute();
       $this->request->redirect('/admin/select_afisha');
       }
       $data = array();
       $this->template->content_admin = View::factory('admin/afisha/add_afisha',$data);
    }
    
     public function action_update_afisha() {
           $this->chek_admin_enter();
            $id = $_GET['id'];
            if($_POST) {
            DB::update('afisha')->set(array(
                'title'=>$_POST['title'],
                'text'=>$_POST['text']
            ))->where('id','=',$id)->execute();
            $this->request->redirect('/admin/update_afisha?id='.$id);
            }
           $data = array();
           $data['edit_afisha'] = DB::select()->from('afisha')->where('id','=',$id)->execute()->current();
	   $this->template->content_admin = View::factory('admin/afisha/update_afisha',$data);
       
    }
    
    public function action_delete_afisha() {
          $this->chek_admin_enter();
           DB::delete('afisha')->where('id','=',$_GET['id'])->execute();
           $this->request->redirect('/admin/select_afisha');
       
    }  
    
    public function action_select_blog_zver(){
       $this->chek_admin_enter();
        $data = array();
        $data['blog_zver'] = DB::select()->from('blog_zver')->order_by('zver_date','DESC')->execute()->as_array();
	    $this->template->content_admin = View::factory('admin/blog_zver/select',$data);
    }  
    
    public function action_edit_blog_zver() {
          $this->chek_admin_enter();
           if($_POST){
               DB::update('blog_zver')->set(array(
                    'zver_text'=>$_POST['text']
                ))->where('blog_z_id','=',$_GET['id'])->execute();
                $this->request->redirect('/admin/select_blog_zver');
           }
           $data['zver'] = DB::select()->from('blog_zver')->where('blog_z_id','=',$_GET['id'])->execute()->current();
           $this->template->content_admin = View::factory('admin/blog_zver/edit_blog_zver',$data);
       
    }
    
    public function action_delete_blog_zver() {
          $this->chek_admin_enter();
           DB::delete('blog_zver')->where('blog_z_id','=',$_GET['id'])->execute();
           $this->request->redirect('/admin/select_blog_zver');
       
    }
    
    public function action_chenge_blog_zver(){
        $this->chek_admin_enter();
        DB::update('blog_zver')->set(array(
                'zver_status'=>1
            ))->where('blog_z_id','=',$_GET['id'])->execute();
        $this->request->redirect('/admin/select_blog_zver');
    }
    
    public function action_ansfer_blog_zver() {
        $this->chek_admin_enter();
        if($_POST) {
            DB::insert('ansfer_blog_zver',array(
            'blog_zver_id',
            'name',
            'date',
            'text'
            ))->values(array(
            $_GET['id'],
            $_POST['name'],
            $_POST['date'],
            $_POST['text']
            ))->execute();
       $this->request->redirect('/admin/select_blog_zver');
       }
       $data = array();
       $this->template->content_admin = View::factory('admin/blog_zver/ansfer_blog_zver',$data);
    }
    
    ///////end afisha
    //// stroka
    public function action_stroka(){
       $this->chek_admin_enter();
        $data = array();
        $data['all'] = DB::select()->from('stroka')->execute()->as_array();
	    $this->template->content_admin = View::factory('admin/stroka/select',$data);
    } 
    
    public function action_add_stroka() {
       $this->chek_admin_enter();
        if($_POST) {
            DB::insert('stroka',array(
            'title'
            ))->values(array(
            $_POST['title'],
            ))->execute();
       $this->request->redirect('/admin/stroka');
       }
       $data = array();
       $this->template->content_admin = View::factory('admin/stroka/add_stroka',$data);
    }
    
    public function action_delete_stroka() {
         $this->chek_admin_enter();
           DB::delete('stroka')->where('id','=',$_GET['id'])->execute();
           $this->request->redirect('/admin/stroka');
       
    }
    
    public function action_secretar_cats() {
       $this->chek_admin_enter();
       if($_POST) {
       //print_r($_POST);
       //die;
       DB::delete('secretar_cat')->execute();
       foreach($_POST['cats'] as $cat){
            DB::insert('secretar_cat',array(
            'cat_id'
            ))->values(array(
            $cat
            ))->execute();
       }
       $this->request->redirect('/admin');
       }
       $data = array();
       $data['cats_parent'] = ORM::factory('cat')->all_parent_cat();
       $data['cats'] = ORM::factory('cat')->all_chaild_cats();
       $data['secretar_cats'] = DB::select()->from('secretar_cat')->execute()->as_array();
	   $this->template->content_admin = View::factory('admin/secretar/secretar_cats',$data);
    }
    
    public function action_bord(){
        $this->chek_admin_enter();
        $data = array();
        $data['all_no'] = DB::select()->from('bord')->where('activ','=',0)->order_by('id','DESC')->execute()->as_array();
        $data['all'] = DB::select()->from('bord')->where('activ','=',1)->order_by('id','DESC')->execute()->as_array();
	    $this->template->content_admin = View::factory('admin/bord/all',$data);
    } 
    
    public function action_activ_bord(){
        $this->chek_admin_enter();
        if($_POST){
            foreach($_POST['array'] as $a){
                DB::update('bord')->set(array(
                'activ'=>1
                ))->where('id','=',$a)->execute();
            }
        die;
        }
    } 
    
    public function action_dell_bord(){
        $this->chek_admin_enter();
        if($_POST){
            foreach($_POST['array'] as $a){
                DB::delete('bord')->where('id','=',$a)->execute();
            }
        die;
        }
    } 
    
    public function action_dell_one_bord(){
       $this->chek_admin_enter();
        if($_GET){
            DB::delete('bord')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('/admin/bord');
        }
    } 
    
    public function action_edit_one_bord(){
        $this->chek_admin_enter();
        if($_POST){
            DB::update('bord')->set(array(
                'cat'=>$_POST['cat'],
                'text'=>$_POST['text'],
                'tel'=>$_POST['tel'],
                'price'=>$_POST['price'],
            ))->where('id','=',$_POST['id'])->execute();
            $this->request->redirect('/admin/bord');
        }
        $data = array();
        $data['bord'] = DB::select()->from('bord')->where('id','=',$_GET['id'])->execute()->current();
        $this->template->content_admin = View::factory('admin/bord/edit',$data);
            
    } 

} // End Admin
