<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Board extends Controller_Main {

                   
    public $template = 'template_board';
    
    public function before()
    {
        parent::before();
        $data = array();
        $data['info'] = 'Оголошення Вознесенськ';
        $this->template->top_head = View::factory('board/top_head',$data);
        $this->template->header = View::factory('page/header');
        $this->template->container_top = '';
        $this->template->container_right = '';
        $this->template->content = '';
        $this->template->footer = ''; 
        
    }
    
    public function action_index()
    {  

        $data = array();
        $this->template->container_top = View::factory('board/top');
        $this->template->content = View::factory('board/index');
    }

 public function action_show_cat()
	{  
        $cat = $this->request->param();
        //$page = Model::factory('page')->get_page(trim($alias['category']),'ru');
        $cat = $cat['category'];
        $all = array();
        $data = array();
        switch($cat){
            case'nedvig':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'trans':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'rabota':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'elek':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'biznes':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'mir':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'sad':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'giv':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'moda':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'sport':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'obmin':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            case'viddam':
            $all = DB::select()->from('bord')->where('cat','=',$cat)->order_by('date','DESC')->execute()->as_array();
            break;
            default:
            $this->redirect('/board');
        }
        //print_r($all);
        //die;
        
        
        $data['all'] = $all;       //
        $data['cat'] = $cat;
        //print_r($page);
        //die;
        //print_r($data['svazi_mat']);
        $this->template->container_top = '';
        $this->template->content = View::factory('board/show_cat',$data);
            
       
	}
 
} // End Page
