<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dovidnik extends Controller_Template {

    
    public $template = 'monitoring/template_admin';
    
    public function before()
    {
        parent::before();
        $this->template->top_head_admin = View::factory('monitoring/top_head_secretar');
        $this->template->header_admin = View::factory('monitoring/header_blog');
        $this->template->container_top = '';
        $this->template->content_admin = '';
        $this->template->container_right = '';
        $this->template->footer = '';
        
    }  
                
	public function action_index()
	{  
        $this->chek_enter();
        $data = array();
        $monitoring_users = Session::instance()->get('monitor_user');
        if($monitoring_users['group'] == 'gor'){
            if($_POST){
                DB::insert('monitoring_messege',array(
                    'disp_name',
                    'status',
                    'zayava_user',
                    'zayava_date',
                    'zayava_street',
                    'zayava_dom',
                    'zayava_kv',
                    'zayava_short',
                    'zayava_com'
                ))->values(array(
                    $_POST['dispetcher'],
                    'новое',
                    $_POST['zayava_name'],
                    $_POST['zayava_date'],
                    $_POST['strit'],
                    $_POST['zayava_bud'],
                    $_POST['zayava_kv'],
                    $_POST['short'],
                    $_POST['kom_pid']
                ))->execute();
            }
            $last_id = DB::select()->from('monitoring_messege')->execute()->as_array();
            $data['last_id'] = count($last_id)+1;
            $this->template->content_admin = View::factory('monitoring/index',$data);
        }else{
            $data['all_mess'] = DB::select()->from('monitoring_messege')->where('zayava_com','=',$monitoring_users['group'])->order_by('id','DESC')->execute()->as_array();
            $this->template->content_admin = View::factory('monitoring/index_com',$data);
        }
	} 
    
    public function action_see_mess() { 
       $data = array();
       $data['mess'] = DB::select()->from('monitoring_messege')->where('id','=',$_GET['id'])->execute()->current();
       if($data['mess']['status'] == 'новое'){
            DB::update('monitoring_messege')->set(array('status'=>'виконуется'))->where('id','=',$_GET['id'])->execute();
       }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('monitoring/see_mess',$data);
	}
    
    public function chek_enter() {
        $moderator = Session::instance()->get('monitor_user');
        if(!isset($moderator)) {
            $this->request->redirect('/monitoring/login');
        }
    }
    
    public function action_login()
	{ 
	   if(!empty($_POST)) {
           $login = $_POST['login'];
           $pass = $_POST['pass'];
           $chek = DB::select()->from('monitoring_users')->where('login','=',$login)->and_where('pass','=',$pass)->execute()->current();
	       if(!empty($chek)) {
             //$chek = array('monitoring','');
             Session::instance()->set('monitor_user', $chek);
             $this->request->redirect('/monitoring');
	       } else {
                echo 'Не верный ввод информации!';
           }
	       
	   }
	   $this->template->header_admin = '';
	   $this->template->content_admin = View::factory('monitoring/login');
	}
    
    
    
    public function action_logout() {
        Session::instance()->delete('monitor_user');
        $this->request->redirect('/monitoring');
    }
    
    public function action_fin_doh()
	{ 
	   $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/fin/doh');
	}
    
    public function action_fin_vit()
	{ 
	  $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/fin/vit');
	}
    
    public function action_fin_zal()
	{ 
	  $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/fin/zal');
	}
    
    public function action_fin_kontrol()
	{ 
	   $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/fin/kontrol');
	}
    
    public function action_soc_zarplata()
	{ 
	   //$this->template->header_admin = '';
       $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/soc/zarplata');
	}
    
    public function action_soc_peresel()
	{ 
	   //$this->template->header_admin = '';
       $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/soc/peresel');
	}
    
    public function action_soc_likar()
	{ 
	   //$this->template->header_admin = '';
       $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/soc/likar');
	}
    
    public function action_senter()
	{ 
	   //$this->template->header_admin = '';
       $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/senter/senter');
	}
    
    public function action_com_vlas_free()
	{ 
	   //$this->template->header_admin = '';
       $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/com_vlas/free');
	}
    
    public function action_com_vlas_free_ne()
	{ 
	   //$this->template->header_admin = '';
       $this->template->header_admin = View::factory('blog/header_blog');
	   $this->template->content_admin = View::factory('monitoring/com_vlas/free_ne');
	}

} // End Admin
