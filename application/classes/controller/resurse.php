<?php defined('SYSPATH') or die('No direct script access.');



class Controller_Resurse extends Controller_Main {
    
    public function action_karta_voznesenska()
    {
        $data = array();
        $data['info'] = 'Карта';
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_resurse',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
    public function action_karta_voznesenska_1859()
    {
        $data = array();
        $data['info'] = 'Карта';
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/karta_1859',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
    public function action_galery()
    {
        if(isset($_GET['folder'])){
        $data = array();
        $data['info'] = 'фото';
        $data['gall_name'] = DB::select()->from('galery_folders')->where('id','=',$_GET['folder'])->execute()->current();
        if(!empty($data['gall_name'])){
            $data['all_img'] = DB::select()->from('galery')->where('folder_id','=',$_GET['folder'])->execute()->as_array();
        //print_r($data['gall_name']);
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_galerry',$data);
        $this->template->footer = View::factory('page/footer',$data);
        }else{
            $this->redirect('/');
        }
        }else{
            $this->redirect('/');
        }
              
    }
    
    public function action_galery_folders()
    {
        $data = array();
        $data['info'] = 'фото';
        $data['folders'] = DB::select()->from('galery_folders')->order_by('id','DESC')->execute()->as_array();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_galerry_folders',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
     public function action_video()
    {
        $data = array();
        $data['info'] = 'Відео';
        $data['videos'] = DB::select()->from('videos')->execute()->as_array();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_video',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
     public function action_docs()
    {
        $data = array();
        $data['info'] = 'Архів';
        $data['archiv'] = DB::query(Database::SELECT,"SELECT * FROM docs WHERE YEAR(`doc_date`) = ".$_GET['year']." AND `doc_type` = ".$_GET['type']." ORDER BY  `docs`.`doc_date` ASC")->execute()->as_array();
        //print_r($data['archiv']);
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_archiv',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
     public function action_doc_m()
    {
        $data = array();
        $data['info'] = 'Архів';
        $data['archiv_m'] = DB::query(Database::SELECT,"SELECT * FROM docs WHERE `doc_date` LIKE '".$_GET['year']."-".$_GET['mon']."-%' AND `doc_type` = ".$_GET['type']."")->execute()->as_array();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_archiv_m',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
    public function action_doc_day()
    {
        $data = array();
        $data['info'] = 'Архів';
        $new_date = explode('.',$_GET['date']);
        $new_date = $new_date[2].'-'.$new_date[1].'-'.$new_date[0];
        $data['archiv_m'] = DB::query(Database::SELECT,"SELECT * FROM docs WHERE `doc_date` = '".$new_date."' AND `doc_type` = ".$_GET['type']."")->execute()->as_array();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        $this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_archiv_date',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
     public function action_doc()
    {
        $id = $this->request->param('id');
        $data = array();
        $data['info'] = 'Перегляд архіву';
        $data['doc'] = DB::select()->from('docs')->where('doc_id','=',$id)->execute()->current();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/show_doc',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
   
    
     public function action_blogs()
    {
    
        $data = array();
        $data['info'] = 'Блоги';
        $data['blogs'] = DB::select()->from('blogs')->order_by('weight','ASC')->execute()->as_array();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/blogs',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
    public function action_blog()
    {
        $id = $this->request->param('id');
        $data = array();
        $data['info'] = 'Перегляд блога';
        $data['blog_news'] = DB::select()->from('blog_news')->where('b_n_blog_id','=',$id)->order_by('b_n_date','DESC')->limit(3)->execute()->as_array();
        $data['blog'] = DB::select()->from('blogs')->where('blog_id','=',$id)->execute()->current();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/one_blog',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
    public function action_all_blog_news()
    {
        $id = $this->request->param('id');
        $data = array();
        $data['info'] = 'Перегляд блога';
        $data['blog_news'] = DB::select()->from('blog_news')->where('b_n_blog_id','=',$id)->order_by('b_n_date','DESC')->limit(3)->execute()->as_array();
        $data['blog'] = DB::select()->from('blogs')->where('blog_id','=',$id)->execute()->current();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/one_blog',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
     public function action_gazeta_cat()
    {
        $id = $this->request->param('id');
       
        $data = array();
        $data['info'] = 'Перегляд категорії';
        $data['mat_all'] = DB::select()->from('gazeta_materials')->where('g_m_cat_id','=',$id)->execute()->as_array();
        $data['cat'] = DB::select()->from('gazeta_cat')->where('g_c_id','=',$id)->execute()->current();
        ///////
        $total_items = count($data['mat_all']);
        $page = $this->request->param('page');
           if(!$page) {
                $page = 1;
           } 
       //    print_r($page);
       $per_page = 5;
       $offset = $per_page * ($page-1);
       $pagination = new Pagination();
       $pagination = Pagination::factory(array(
       'total_items' => $total_items,
       'current_page' => array(
       'source' => 'route',
       'key' => 'page'
       ),
       'items_per_page' => $per_page,
       'view' => 'pagination/basic',
       'auto_hide'         => TRUE,
       'first_page_in_url' => FALSE,      
       ));
      
       $data['pagination'] = $pagination;
       $data['materials_all'] = DB::select()->from('gazeta_materials')->where('g_m_cat_id','=',$id)->order_by('g_m_id','DESC')->limit($per_page)->offset($offset)->execute()->as_array();
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('gazeta/show_gazeta_cat',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }
    
     public function action_gazeta_mat()
    {
        $id = $this->request->param('id');
        $data = array();
        $data['mat'] = DB::select()->from('gazeta_materials')->where('g_m_id','=',$id)->execute()->current();
        $data['mat_cat'] = DB::select()->from('gazeta_cat')->where('g_c_id','=',$data['mat']['g_m_cat_id'])->execute()->current();
        $data['info'] =  $data['mat']['g_m_title'];
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('gazeta/gazeta_mat',$data);
        $this->template->footer = View::factory('page/footer',$data);      
    }


    public function action_503()
    {
        $this->template->title = 'Service Temporarily Unavailable';
    }

    public function action_500()
    {
        $this->template->title = 'Internal Server Error';
    }
    
    public function action_send_blog_zver(){
         if($_POST) {
            if(!empty($_POST['blog_id']) && !empty($_POST['zver_date']) && !empty($_POST['user_name']) && !empty($_POST['zver_text'])) {
                DB::insert('blog_zver',array(
                'blog_id',
                'user_name',
                'zver_date',
                'zver_text'
            ))->values(array(
                $_POST['blog_id'],
                $_POST['user_name'],
                $_POST['zver_date'],
                $_POST['zver_text']       
            ))->execute();
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
    
    public function action_vote(){
        if($_POST){
            $user_ip = $_SERVER['REMOTE_ADDR'];
            //die;
            $res = DB::select()->from('vote_label')->where('id','=',$_POST['label_id'])->execute()->current();
            $user_vote = DB::select()->from('vote_user')->where('user_id','=',$user_ip)->and_where('vote_id','=',$res['vote_id'])->execute()->current();
            if(empty($user_vote)){
                DB::insert('vote_user',array(
                'user_id',
                'vote_id'
                ))->values(array(
                $user_ip,
                $res['vote_id']
                ))->execute();
                $label_count = $res['event_count']+1;
                DB::update('vote_label')->set(array(
                'event_count'=>$label_count
                ))->where('id','=',$_POST['label_id'])->execute();
                echo 'Ваш відповідь прийнята!';
            }else{
                echo 'Ви вже голосували!';
            }
            //
            die;
        }
    }
    
    public function action_vote_results() {
        if($_POST){
            $data = array();
            $res = DB::select()->from('vote_label')->where('vote_id','=',$_POST['vote_id'])->execute()->as_array();   
            $all_count = 0;
            foreach($res as $vot){
                $all_count += $vot['event_count']; 
            }
            if($all_count == 0){
                DB::update('vote_label')->set(array('event_count'=>1))->and_where('id','=',$res[0]['id'])->execute();
                $res = DB::select()->from('vote_label')->where('vote_id','=',$_POST['vote_id'])->execute()->as_array();
                foreach($res as $vot){
                $all_count += $vot['event_count']; 
                }
            }
            $one = (round(100/$all_count,2));
            $new_arr = array();
            foreach($res as $votes) {
                $new_arr[$votes['id']][] = $votes['text'];
                $new_arr[$votes['id']][] = $votes['event_count'] * $one;
            }
            $data['array'] = $new_arr;
            echo View::factory('resurse/vote_results',$data);
            die;
        }
    }
    
    public function action_camera(){
        $data = array();
        $data['info'] =  'проверка камеры';
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/camera',$data);
        $this->template->footer = View::factory('page/footer',$data); 
    
    }
    
    public function action_ajax_pag(){
        if($_POST){
            $page = $_POST['page'];
            $per_page = 33;
            $offset = $per_page * ($page-1);
            $data['all'] = Model::factory('material')->index_pag($offset,$per_page);
            echo View::factory('page/ajax_pag',$data);
            die;
        }
    }
    
    public function action_old_docs(){
        $data = array();
        $data['info'] =  'проверка';
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        //$this->template->container_top = View::factory('page/rus/container_top');
        //$this->template->container_right = View::factory('page/container_right',$data);
        $this->template->content = View::factory('resurse/old_docs',$data);
        $this->template->footer = View::factory('page/footer',$data); 
    
    }
    
    public function action_old_docs_year(){
        $data = array();
        $data['info'] =  'проверка';
        $id = $this->request->param('id');
        $data['year'] = $id;
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        $this->template->content = View::factory('resurse/old_docs_year',$data);
        $this->template->footer = View::factory('page/footer',$data);  
    }
    
    public function action_old_docs_dir(){
        $data = array();
        $data['info'] =  'проверка';
        $data['y'] = $_GET['y'];
        $data['m'] = $_GET['m'];
        $this->template->top_head = View::factory('resurse/resurse_top_head',$data);
        $this->template->header = View::factory('page/header');
        $this->template->content = View::factory('resurse/old_docs_dir',$data);
        $this->template->footer = View::factory('page/footer',$data);  
    }

}