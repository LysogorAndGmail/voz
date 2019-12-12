<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Main {

                   
	public function action_search() {  
        
        if(isset($_POST['search_ajax'])) {
           print_r($_POST);
           $res = DB::query(Database::SELECT, "SELECT * FROM materials WHERE material_title LIKE '%".$_POST['search_ajax']."%'")->execute()->as_array();
           
        }
        $data = array();
        $data['info'] = 'Пошукова сторінка';
        if(isset($res)) {
            $data['res'] = $res;
        }
        $this->template->top_head = View::factory('search/search_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('search/main_search',$data);
        $this->template->footer = View::factory('page/footer',$data);
             
    }
    public function action_sa() {
        if(isset($_POST['search_ajax']) && strlen($_POST['search_ajax']) > 2) {
           
           $res = DB::query(Database::SELECT, "SELECT * FROM materials WHERE material_title LIKE '%".$_POST['search_ajax']."%'")->execute()->as_array();
           foreach($res as $ser) {
            echo "<h2><a href='/material/".$ser['material_id']."'>".$ser['material_title']."</a></h2>";
           }
           die;
        }else {
            die;
        }
    }
    
    public function action_sa_ar() {
        if(isset($_POST['search_ajax']) && strlen($_POST['search_ajax']) > 2) {
           
           $res = DB::query(Database::SELECT, "SELECT * FROM docs WHERE doc_name LIKE '%".$_POST['search_ajax']."%'
           UNION 
           SELECT * FROM docs WHERE doc_n LIKE '%".$_POST['search_ajax']."%'")->execute()->as_array();
           if(empty($res)) {
            $res = DB::query(Database::SELECT, "SELECT * FROM docs WHERE doc_date LIKE '%".$_POST['search_ajax']."%'")->execute()->as_array(); 
           }
           foreach($res as $ser) {
            echo "<h2><a href='/doc/".$ser['doc_id']."'>".$ser['doc_name']."</a></h2>";
           }
           die;
        }else {
            die;
        }
    }
    
    public function action_archive() {  
        $data = array();
        $res = array();
        if($_POST){
            if(!empty($_POST['header'])){
                $res = DB::select()->from('docs')->where('doc_name','LIKE','%'.$_POST['header'].'%')->and_where('doc_type','=',$_POST['typeid'])->execute()->as_array();
            }
            if(!empty($_POST['docnum'])){
                $res = DB::select()->from('docs')->where('doc_n','LIKE','%'.$_POST['docnum'].'%')->and_where('doc_type','=',$_POST['typeid'])->execute()->as_array();
            }
            if(!empty($_POST['doctext'])){
                $res = DB::select()->from('docs')->where('doc_text','LIKE','%'.$_POST['doctext'].'%')->and_where('doc_type','=',$_POST['typeid'])->execute()->as_array();
            }
            if($_POST['days_in'] != 0 && $_POST['months_in'] != 0 && $_POST['years_in'] != 0 && $_POST['days_to'] != 0 && $_POST['months_to'] != 0 && $_POST['years_to'] != 0){
                $data_from = $_POST['years_in'].'-'.$_POST['months_in'].'-'.$_POST['days_in'];
                $data_to = $_POST['years_to'].'-'.$_POST['months_to'].'-'.$_POST['days_to'];
                $res = DB::query(Database::SELECT, "SELECT * FROM `docs` WHERE `doc_date` BETWEEN  '".$data_from."' AND '".$data_to."'")->execute()->as_array();
            }            
            if(!empty($res)){
                $data['search_info'] = 'Знайдено '.count($res).' резул.';
            }else{
                $data['search_info'] = 'Не знайдено!';
            }
            //
            //echo '<pre>';
            //print_r($_POST);
            //echo '</pre>';
            
            //echo '<pre>';
            //print_r($res);
            //echo '</pre>'; 
                       
        }
        $data['res'] = $res;
        $data['info'] = 'Пошукова сторінка архіву';
        $this->template->top_head = View::factory('search/search_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('search/search_archive',$data);
        $this->template->footer = View::factory('page/footer',$data);
             
    }

} // End Search
