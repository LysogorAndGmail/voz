<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Deputat extends Controller_Main {

                   
    public function action_index()
    {  

        $data = array();
        $data['info'] = 'Карта пошуку депутата';
        $this->template->top_head = View::factory('deputat/deputat_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('deputat/show_deputat_map',$data);
        $this->template->footer = View::factory('page/footer',$data);
    }

 public function action_search_dep()
	{  
        if($_POST) {
        $q = $_POST;
        
        foreach($q as $dep=>$key) {
            $arr[]=$dep;
        }
        $data = array();
        $res = DB::select()->from('deputats')->where('dep_short','in',$arr)->execute()->as_array();
        $data['info'] = 'Перегляд информації';
        $data['search_dep'] = $res;
        $this->template->top_head = View::factory('deputat/deputat_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('deputat/search_dep',$data);
        $this->template->footer = View::factory('page/footer',$data);
        }else {
            $this->redirect('/');
        }
            
       
	}
    
    public function action_ajax_dep()
	{  
        if($_POST) {
            if($_POST['search_ajax'] != '' && !empty($_POST['search_ajax'])) {
                    $res = DB::select()->from('deputats')->where('dep_okrug','LIKE',"%".trim($_POST['search_ajax'])."%")->execute()->as_array();
                    if(!empty($res) && count($res) > 0) {
                        foreach($res as $r) {
                           echo "<p><span style='color:blue;'>".$r['dep_okrug']."</span> - ".$r['dep_name']."</p>";
                          
                        }
                    }
                }
            
            die;
        }
            
       
       
	}
    
    public function action_dep()
	{  
        if($_GET) {
        $id = $_GET['dep_id'];
        $data = array();
        $res = DB::select()->from('dep_megi')->where('dep_id','=',$id)->execute()->current();
        $data['info'] = 'Перегляд информації';
        $data['dep'] = $res;
        $this->template->top_head = View::factory('deputat/deputat_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('deputat/dep_megi',$data);
        $this->template->footer = View::factory('page/footer',$data);
        }else {
            $this->redirect('/');
        }
            
       
	}
    
    public function action_send_dep_email()
	{  
        if($_POST) {
            if(!empty($_POST['dep_id']) && !empty($_POST['dep_user_name']) && !empty($_POST['dep_user_email']) && !empty($_POST['dep_user_text'])) {
                $res = DB::select()->from('deputats')->where('dep_id','=',$_POST['dep_id'])->execute()->current();
                $config = Kohana::$config->load('email');
                Email::connect($config);
                $to = $res['dep_email'];
                $subject = 'Voznesensk.org.ua';
                $from = $_POST['dep_user_email'];
                $message = $_POST['dep_user_text'];
                Email::send($to, $from, $subject, $message, $html = true);
                echo 'ok';
            }else {
                echo 1;
            }
            die;
        }else {
            echo 1;
        }
        die;   
	}
     
    
    

} // End Page
