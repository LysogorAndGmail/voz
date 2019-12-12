<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Maincat extends Controller_Main {


 public function action_show_maincat()
	{  
       $most_cat_id = $this->request->param();
       $maincat = ORM::factory('mostcat',$most_cat_id);
           if(!$maincat->most_cat_id) {
               $this->request->redirect('/');
           }
       $data = array();
       $data['maincat'] = $maincat;
       $data['mostcat_all'] = ORM::factory('mostcat')->find_all();
       $data['page_all'] = ORM::factory('page')->find_all();
       $this->template->header = View::factory('components/header',$data);
       $this->template->top_head = View::factory('maincat/main_top_head',$data);
       $this->template->content = View::factory('maincat/show_mostcat',$data);
	}
    

} // End Page
