<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Monitoring extends Controller_Template {

    
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
            DB::update('monitoring_messege')->set(array(
            'status'=>'виконуется',
            'have_date'=>date('Y-m-d H:i:s')
            ))->where('id','=',$_GET['id'])->execute();
       }
	   //$this->template->header_admin = '';
	   $this->template->content_admin = View::factory('monitoring/see_mess',$data);
	}
    
    public function chek_enter() {
        $moderator = Session::instance()->get('monitor_user');
        if(!isset($moderator)) {
            $this->request->redirect('/monitoring/login');
        }
    }
    
    public function action_login()	{ 
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
    
    public function action_fin_doh() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_doh')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/fin/doh_see',$data);
    }
    
    public function action_fin_doh_add() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_doh')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('fin_doh',array(
                    'date',
                    'zag_fond_post',
                    'spe_fond_post',
                    'zag_fond_za_sho',
                    'spe_fond_za_sho'
                ))->values(array(
                    $_POST['date'],
                    $_POST['zag_fond_post'],
                    $_POST['spe_fond_post'],
                    $_POST['zag_fond_za_sho'],
                    $_POST['spe_fond_za_sho']
                ))->execute();
            $this->request->redirect('monitoring/fin_doh');
        }
        $this->template->content_admin = View::factory('monitoring/fin/doh_see_add',$data);
    }
    
    public function action_fin_doh_del() { 
        if($_GET){
            DB::delete('fin_doh')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/fin_doh');        
        }
        
    }
    
    public function action_fin_vit() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_vit')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/fin/vit_see',$data);
    }
    
    public function action_fin_vit_add() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_vit')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('fin_vit',array(
                    'date',
                    'zag_fond_vit',
                    'spe_fond_vit',
                    'zag_fond_za_sho',
                    'spe_fond_za_sho'
                ))->values(array(
                    $_POST['date'],
                    $_POST['zag_fond_vit'],
                    $_POST['spe_fond_vit'],
                    $_POST['zag_fond_za_sho'],
                    $_POST['spe_fond_za_sho']
                ))->execute();
            $this->request->redirect('monitoring/fin_vit');
        }
        $this->template->content_admin = View::factory('monitoring/fin/vit_see_add',$data);
    }
    
    public function action_fin_vit_del() { 
        if($_GET){
            DB::delete('fin_vit')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/fin_vit');        
        }
        
    }
    
    public function action_fin_zal() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_zal')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/fin/zal_see',$data);
    }
    
    public function action_fin_zal_add() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_zal')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('fin_zal',array(
                    'date',
                    'zag_fond_zal',
                    'spe_fond_zal'
                ))->values(array(
                    $_POST['date'],
                    $_POST['zag_fond_zal'],
                    $_POST['spe_fond_zal']
                ))->execute();
            $this->request->redirect('monitoring/fin_zal');
        }
        $this->template->content_admin = View::factory('monitoring/fin/zal_see_add',$data);
    }
    
    public function action_fin_zal_del() { 
        if($_GET){
            DB::delete('fin_zal')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/fin_zal');        
        }
        
    }
    
    public function action_fin_kontrol() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_kontrol')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/fin/kontrol_see',$data);
    }
    
    public function action_fin_kontrol_add() { 
        $data = array();
        $data['all'] = DB::select()->from('fin_kontrol')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('fin_kontrol',array(
                    'date_reest',
                    'nomber',
                    'uprav',
                    'priz',
                    'date_oplata'
                ))->values(array(
                    $_POST['date_reest'],
                    $_POST['nomber'],
                    $_POST['uprav'],
                    $_POST['priz'],
                    $_POST['date_oplata'],
                ))->execute();
            $this->request->redirect('monitoring/fin_kontrol');
        }
        $this->template->content_admin = View::factory('monitoring/fin/kontrol_see_add',$data);
    }
    
    public function action_fin_kontrol_del() { 
        if($_GET){
            DB::delete('fin_kontrol')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/fin_kontrol');        
        }
        
    }
    
    //////////// soc
    
     public function action_soc_zar() { 
        $data = array();
        $data['all'] = DB::select()->from('soc_zarplata')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/soc/zar_see',$data);
    }
    
    public function action_soc_zar_add() { 
        $data = array();
        $data['all'] = DB::select()->from('soc_zarplata')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('soc_zarplata',array(
                    'date',
                    'ustanova',
                    'narahovano',
                    'viplacheno',
                    'zaborgov'
                ))->values(array(
                    $_POST['date'],
                    $_POST['ustanova'],
                    $_POST['narahovano'],
                    $_POST['viplacheno'],
                    $_POST['zaborgov']
                ))->execute();
            $this->request->redirect('monitoring/soc_zar');
        }
        $this->template->content_admin = View::factory('monitoring/soc/zar_see_add',$data);
    }
    
    public function action_soc_zar_del() { 
        if($_GET){
            DB::delete('soc_zarplata')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/soc_zar');        
        }
        
    }
    
    
    public function action_soc_peresel() { 
        $data = array();
        $data['all'] = DB::select()->from('soc_peresel')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/soc/peresel_see',$data);
    }
    
    public function action_soc_peresel_add() { 
        $data = array();
        $data['all'] = DB::select()->from('soc_peresel')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('soc_peresel',array(
                    'date',
                    'zvidki',
                    'perelik',
                    'poseleni',
                    'problem',
                    'zromleno'
                ))->values(array(
                    $_POST['date'],
                    $_POST['zvidki'],
                    $_POST['perelik'],
                    $_POST['poseleni'],
                    $_POST['problem'],
                    $_POST['zromleno']
                ))->execute();
            $this->request->redirect('monitoring/soc_peresel');
        }
        $this->template->content_admin = View::factory('monitoring/soc/peresel_see_add',$data);
    }
    
    public function action_soc_peresel_del() { 
        if($_GET){
            DB::delete('soc_peresel')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/soc_peresel');        
        }
        
    }
    
    
    public function action_soc_likar() { 
        $data = array();
        $data['all'] = DB::select()->from('soc_likar')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/soc/likar_see',$data);
    }
    
    public function action_soc_likar_add() { 
        $data = array();
        $data['all'] = DB::select()->from('soc_likar')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        if($_POST){
            DB::insert('soc_likar',array(
                    'date',
                    'ambulatoria',
                    'likar',
                    'count',
                    'promitka'
                ))->values(array(
                    $_POST['date'],
                    $_POST['ambulatoria'],
                    $_POST['likar'],
                    $_POST['count'],
                    $_POST['promitka']
                ))->execute();
            $this->request->redirect('monitoring/soc_likar');
        }
        $this->template->content_admin = View::factory('monitoring/soc/likar_see_add',$data);
    }
    
    public function action_soc_likar_del() { 
        if($_GET){
            DB::delete('soc_likar')->where('id','=',$_GET['id'])->execute();
            $this->request->redirect('monitoring/soc_likar');        
        }
        
    }
    
    public function action_send_karta(){
        if($_POST){
            $mess = DB::select()->from('monitoring_karta')->where('mess_id','=',$_POST['id'])->execute()->current();
            if(empty($mess)){
                
                DB::update('monitoring_messege')->set(array(
                    'status'=>$_POST['rezult'],
                ))->where('id','=',$_POST['id'])->execute();
                
                DB::insert('monitoring_karta',array(
                    'mess_id',
                    'vid',
                    'prich',
                    'harakter',
                    'prinato',
                    'rezult',
                    'zakril'
                ))->values(array(
                    $_POST['id'],
                    $_POST['vid'],
                    $_POST['prich'],
                    $_POST['harakter'],
                    $_POST['prinato'],
                    $_POST['rezult'],
                    $_POST['zakril']
                ))->execute();
                $this->request->redirect('/monitoring/see_mess?id='.$_POST['id']);
            }
            
        }
    }
    
    public function action_see_senter() { 
        $data = array();
        //$data['all'] = DB::select()->from('senter')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/senter/senter',$data);
    }
    
    public function action_com_free() { 
        $data = array();
        //$data['all'] = DB::select()->from('senter')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/com_vlas/free',$data);
    }
    
    public function action_com_free_ne() { 
        $data = array();
        //$data['all'] = DB::select()->from('senter')->order_by('id','DESC')->limit(50)->execute()->as_array(); 
        $this->template->content_admin = View::factory('monitoring/com_vlas/free_ne',$data);
    }
    //////////// end soc

} // End Admin
