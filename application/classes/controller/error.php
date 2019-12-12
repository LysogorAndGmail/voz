<?php defined('SYSPATH') or die('No direct script access.');



class Controller_Error extends Controller_Main {
    
    public function action_404()
    {
        $data = array();
        $data['info'] = 'Сторінку не знайдено!';
        $this->template->top_head = View::factory('error/error_top_head',$data);
        $this->template->content = View::factory('error/show_errors',$data);

    }

    public function action_503()
    {
        $this->template->title = 'Service Temporarily Unavailable';
    }

    public function action_500()
    {
        $this->template->title = 'Internal Server Error';
    }
    public function action_regist_info()
    {
        $data = array();
        $data['info'] = 'На Ваш email відправлено повідомлення для активації акаунта!';
        $this->template->top_head = View::factory('error/error_top_head',$data);
        $this->template->content = View::factory('error/show_errors',$data);

    }

}