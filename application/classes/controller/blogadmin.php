<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Blogadmin extends Controller_Template {

    
    public $template = 'admin/template_admin';
    
    public function before()
    {
        parent::before();
        $this->template->top_head_admin = View::factory('secretar/top_head_secretar');
        $this->template->header_admin = View::factory('blog/header_blog');
        $this->template->container_top = '';
        $this->template->content_admin = '';
        $this->template->container_right = '';
        $this->template->footer = '';
        
    }  
                
	public function action_index()
	{  
        $this->chek_blog_enter();  
        $data = array();
        $this->template->content_admin = View::factory('blog/index',$data);
	}
    
    public function action_blog_login()
	{ 
	   
       
	   if(!empty($_POST)) 
       {
           $login = $_POST['admin_login'];
           $pass = $_POST['admin_pass'];
           $chek = DB::select()->from('blogs')->where('blog_login','=',$login)->and_where('blog_pass','=',$pass)->execute()->current();
	       if(!empty($chek)) 
           {
             Session::instance()->set('blogadmin', $chek);
             $this->request->redirect('/blogadmin/index');
	       }
           else {
            
                echo 'Не верный ввод информации!';
           }
	       
	   }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('blog/blog_login');
	}
    
    public function chek_blog_enter() {
        $moderator = Session::instance()->get('blogadmin');
        if(!isset($moderator)) {
            $this->request->redirect('/blogadmin/blog_login');
        }
    }
    
    public function action_select_zver(){
        $data = array();
        $moderator = Session::instance()->get('blogadmin');
        $data['blog_zver'] = DB::select()->from('blog_zver')->where('blog_id','=',$moderator['blog_id'])->execute()->as_array();
	    $this->template->content_admin = View::factory('blog/select_zver',$data);
    } 
    
    public function action_delete_blog_zver() {
           DB::delete('blog_zver')->where('blog_z_id','=',$_GET['id'])->execute();
           $this->request->redirect('/blogadmin/select_zver');
       
    }
    
     public function action_chenge_blog_zver(){
        DB::update('blog_zver')->set(array(
                'zver_status'=>1
            ))->where('blog_z_id','=',$_GET['id'])->execute();
        $this->request->redirect('/blogadmin/select_zver');
    }
    
    public function action_ansfer_blog_zver() {
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
       $this->request->redirect('/blogadmin/select_zver');
       }
       $data = array();
       $this->template->content_admin = View::factory('blog/ansfer_blog_zver',$data);
    }
 
     public function action_select_news() {
         $moderator = Session::instance()->get('blogadmin');
         $blog_id = $moderator['blog_id'];
         $data = array();
        $data['news'] = DB::select()->from('blog_news')->where('b_n_blog_id','=',$blog_id)->execute()->as_array();
        $this->template->content_admin = View::factory('blog/all_blog_news',$data);
    }
    
    public function action_delete_blog_news() {
           DB::delete('blog_news')->where('b_n_id','=',$_GET['id'])->execute();
           $this->request->redirect('/blogadmin/select_news');   
    }
    
    public function action_add_blog_news() {
         
         $moderator = Session::instance()->get('blogadmin');
         $blog_id = $moderator['blog_id'];
           
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
            $this->request->redirect('/blogadmin/select_news');
            }
         $data = array();
         $data['blog_id'] = $blog_id;
        $this->template->content_admin = View::factory('blog/add_blog_news',$data);
    }   
    
    
    public function action_dispetcher() {
         $moderator = Session::instance()->get('blogadmin');
         $blog_id = $moderator['blog_id'];
         $data = array();
        $data['mes'] = DB::select()->from('monitoring_messege')->execute()->as_array();
        $this->template->content_admin = View::factory('blog/dispetcher',$data);
    }
    
    public function action_dispetcher_see() {
         //$moderator = Session::instance()->get('blogadmin');
         //$blog_id = $moderator['blog_id'];
         $data = array();
        $data['mess'] = DB::select()->from('monitoring_messege')->where('id','=',$_GET['id'])->execute()->current();
        $this->template->content_admin = View::factory('blog/dispetcher_see',$data);
    }

} // End Admin
