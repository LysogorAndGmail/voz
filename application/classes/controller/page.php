<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Main {

                   
    public function action_index()
    {  
        $page = Model::factory('page')->get_page('index','ru');
        $data = array();
        $data['new_user'] = Session::instance()->get('new_user');
        $data['page'] = $page;
        $data['all_admin_cat'] = Model::factory('cat')->all_visible_cat_admin();
        $data['all_moderators_cats'] = Model::factory('moderatorcat')->all_moderator_cats_parent();
        $data['last_mat'] = Model::factory('material')->all_last_add(33,'ru');
        $data['all_docs_1'] = DB::select()->from('docs')->where('doc_type','=',1)->order_by('doc_date','DESC')->execute()->as_array();
        $data['all_docs_2'] = DB::select()->from('docs')->where('doc_type','=',2)->order_by('doc_date','DESC')->execute()->as_array();
        $data['all_docs_3'] = DB::select()->from('docs')->where('doc_type','=',3)->order_by('doc_date','DESC')->execute()->as_array();
        $data['all_docs_4'] = DB::select()->from('docs')->where('doc_type','=',4)->order_by('doc_date','DESC')->execute()->as_array();
        $data['pag'] = array(1,2,3,4,5,6,7,8,9,10);
        //print_r($data['all_docs_4']);
        //die;
        $this->template->top_head = View::factory('page/page_top_head',$data);
        $this->template->header = View::factory('page/header');
        $this->template->container_top = View::factory('page/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('page/index',$data);
        $this->template->footer = View::factory('page/footer',$data);
    }

 public function action_show_page()
	{  
        $alias = $this->request->param();
        $page = Model::factory('page')->get_page(trim($alias['alias']),'ru');
        $data = array();
        $data['page'] = $page;       //
        $data['svazi'] = DB::select()->from('svazi')->where('svaz_page_id','=',$page['page_id'])->execute()->as_array();
        $data['svazi_mat'] = DB::select()->from('svazi_mat')->where('page_id','=',$page['page_id'])->execute()->as_array();
        //print_r($page);
        //die;
        //print_r($data['svazi_mat']);
        $this->template->top_head = View::factory('page/page_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('page/pages/'.$alias['alias'],$data);
        $this->template->footer = View::factory('page/footer',$data);
            
       
	}
 
} // End Page
