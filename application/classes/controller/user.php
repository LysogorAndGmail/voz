<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Main {

                   
    public function action_home() {  
	   if(is_null(Session::instance()->get('new_user'))) {
	       $this->request->redirect('/user/user_login');
	   }
	   $data = array();
	   $data['new_user'] = Session::instance()->get('new_user');
       $data['info'] = 'Користувач - '.$data['new_user']['user_login'];       
       $this->template->top_head = View::factory('user/user_top_head',$data);
       $this->template->header = View::factory('page/header',$data);
       $this->template->container_right = View::factory('page/container_right',$data);
       $this->template->slider = '';
       $this->template->content = View::factory('user/home',$data);
       
	}
    public function action_show_user() {
       $user_id = $this->request->param('id');
       $data = array();
	   $data['show_user'] = Model::factory('user')->get_user($user_id);
       $this->template->top_head = View::factory('user/user_top_head',$data);
       $this->template->header = View::factory('components/header',$data);
       $this->template->container_left = View::factory('components/container_right',$data);
       $this->template->slider = '';
       $this->template->content = View::factory('user/show_user',$data);
    
    }
    
    public function action_user_regist() {
        
       $data = array();
       $data['info'] = 'Реєстрація користувача';
       $this->template->top_head = View::factory('user/user_top_head',$data);
       $this->template->content = View::factory('user/user_regist',$data);
    }
    
    public function action_user_regist_function() {
        
        if($_POST) {
            if(strlen($_POST['user_login']) < 4 || strlen($_POST['user_login']) > 20 || $_POST['user_login'] == 'Admin' || $_POST['user_login'] == 'admin') {
                echo 'Невірний Login';
                die;
            }
            if(strlen($_POST['user_pass']) < 4 || strlen($_POST['user_pass']) > 20) {
                echo 'Невірний Пароль';
                die;
            }
            if(strlen($_POST['user_email']) < 4 || strlen($_POST['user_email']) > 30 || stripos($_POST['user_email'], '@') === FALSE) {
                echo 'Невірний Email';
                die;
            }
            
            $ch_user = DB::select()->from('user')->where('user_email','=',$_POST['user_email'])->execute()->current();
            if($ch_user) {
                echo 'Email зайнятий!';
                die;
            }
            
            
            DB::insert('user',array(
                'user_login',
                'user_pass',
                'user_email',
                'user_status'
            ))->values(array(
                $_POST['user_login'],
                $_POST['user_pass'],
                $_POST['user_email'],
                0            
            ))->execute();
                       
            $this->send_user_mail($_POST['user_email'],$_POST['user_login'],$_POST['user_pass']);
            echo 'ok';
            die; 
        }
        
        //print_r($_POST);
           
        
    }
    
   public function mail_utf8($to, $from, $subject, $message) {
    
    $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/plain; charset=utf-8\r\n";
    $headers .= "From: $from\r\n";
    return mail($to, $subject, $message, $headers);
    }
 

    public function send_user_mail($to,$user_login,$user_pass) {
     //   if($_POST) {
    $config = Kohana::$config->load('email');
    Email::connect($config);
    $subject = 'Регистрация на Voznesensk.org';
    $from = 'no-reply@voznesensk.org';
    $message = "Для активации вашей учетной записи перейдите по ссылке - <a href=".Kohana::$base_url."user/activ_user?user_login=".$user_login."&key=".md5($user_pass).">активация</a>";
    Email::send($to, $from, $subject, $message, $html = true);
    
    }
    

    public function action_chek_user_login(){
           
        $user = new Model_User();
        $user_new = $user->get_user_login($_POST['user_login']);
        if(empty($user_new) === true and strlen($_POST['user_login'])>4){
            echo 'ok';
        }else {
            echo 'her';
        }
        die;
           
    }     
    
    public function action_user_login() {
        $data = array();
        $data['error'] = '';
        if($_POST) {
            $user = new Model_User();
            $new_user = $user->user_login($_POST);
            if(empty($new_user)) {
                //$this->request->redirect('/user/user_login');
                $data['error'] = 'Не вірний логін або пароль!';
            }else {
                if($new_user['user_status'] == 1){
                    Session::instance()->set('new_user', $new_user);
                    $this->request->redirect('/user/home'); 
                }else{
                $data['error'] = 'Ваш акаунт не активовано!';    
                }
                
            }
        }
       $data['info'] = 'Вхід користувача';
       $this->template->top_head = View::factory('user/user_top_head',$data);
       $this->template->content = View::factory('user/user_login',$data);
    }
    
    public function action_complate_regist() {
       $data = array();
       $data['info'] = 'Вхід користувача';
       $this->template->top_head = View::factory('user/user_top_head',$data);
       $this->template->content = View::factory('user/complate_regist',$data);
    }
     
    public function action_user_logout() {
        Session::instance()->destroy('new_user');
        $this->redirect('/');
        
    }
    
    public function action_change_lang() {
        Session::instance()->set('leng',$_POST['leng']);
        echo 'ok';
        die;
    }
    public function action_order_materials() {
        if($_POST) {
            $res = Model::factory('order')->insert_new_order($_POST);
        }
            $data = array();
            $this->template->top_head = View::factory('user/user_top_head',$data);
            $this->template->header = View::factory('page/rus/header',$data);
            $this->template->container_top = View::factory('page/rus/container_top');
            $this->template->container_right = View::factory('page/rus/container_right');
            $this->template->slider = '';
            $this->template->content = View::factory('user/order',$data);
    }
    
    public function action_activ_user() {
        if($_GET) {
            if(isset($_GET['key']) && isset($_GET['user_login'])) {
                $user = DB::select()->from('user')->where('user_login','=',$_GET['user_login'])->execute()->current();
                if(!empty($user) && $user['user_status'] == 0) {
                    DB::update('user')->set(array(
                    'user_status'=>1,
                    ))->where('user_login','=',$_GET['user_login'])->execute();
                    $this->redirect('/user/complate_regist');
                }else {
                    echo 'Ошибка URL';
                    die;
                }
                die;
            }else {
               echo 'Ошибка URL';
            die; 
            }
        }else {
            echo 'Ошибка URL';
            die;
        }
    }
    
    public function action_add_zvernenna() {
        if($_POST) {
            DB::insert('zvernenna',array(
                'zver_pib',
                'zver_adress',
                'zver_email',
                'zver_tel',
                'zver_text',
                'zver_status',
                'vidpovid',
                'date'
            ))->values(array(
                $_POST['zver_pib'],
                $_POST['zver_adress'],
                $_POST['zver_email'],
                $_POST['zver_tel'],
                $_POST['zver_text'],
                0,
                $_POST['vidpov'],
                Date('d.m.Y')
            ))->execute();
            $this->redirect('/');
        }
    }
    
    public function action_add_publ_info() {
        if($_POST) {
            DB::insert('publinfo',array(
                'zver_pib',
                'zver_adress',
                'zver_email',
                'zver_tel',
                'zver_text',
                'zver_status',
                'nadati'
            ))->values(array(
                $_POST['zver_pib'],
                $_POST['zver_adress'],
                $_POST['zver_email'],
                $_POST['zver_tel'],
                $_POST['zver_text'],
                0,
                $_POST['vidpov']
            ))->execute();
            $this->redirect('/');
        }
    }
    
    public function action_add_new_bord() {
        if($_POST) {
            
            $user = Session::instance()->get('new_user');
            //print_r($_POST);
            //die;
            DB::insert('bord',array(
                'text',
                'date',
                'cat',
                'price',
                'tel',
                'user',
                'views'
            ))->values(array(
                $_POST['text'],
                date('Y-m-d'),
                $_POST['cat'],
                $_POST['price'],
                $_POST['tel'],
                $user['user_id'],
                0
            ))->execute();
            $this->redirect('/user/home');
        }
    }
    
    
    public function action_del_bord() {
        if($_GET) {
            $id = $_GET['id'];
            
            $user = Session::instance()->get('new_user');
            
            $check_bord = DB::select()->from('bord')->where('user','=',$user['user_id'])->and_where('id','=',$id)->execute()->current();
            
            if(!empty($check_bord)){
                DB::delete('bord')->and_where('id','=',$id)->execute();
            }else{
                $this->redirect('/user/home');
            }
            //print_r($check_bord);
            //die;
            $this->redirect('/user/home');
        }
    }
    

} // End Page
