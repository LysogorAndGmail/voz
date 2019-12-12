<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Main extends Controller_Template {

    public $template = 'template';
    
    public function before()
    {
        parent::before();
        $this->template->top_head = '';
        $this->template->header = View::factory('page/header');
        $this->template->container_top = '';
        $this->template->container_right = View::factory('page/container_right');
        $this->template->content = '';
        $this->template->footer = View::factory('page/footer'); 
        
    } 
    public function redirect($url) {
        $this->request->redirect($url);
    }
                 
	

} // End Welcome
