<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Moderatorcat extends Controller_Main {

                   
	public function action_show_moderator_cat()
	{  
	   $data = array();
 	   $id = $this->request->param('id');
       $cat = Model::factory('moderatorcat')->get_cat($id);
       $data['cat'] = $cat;
       if($cat['parent_cat'] == null) {
        $data['children_cat'] = Model::factory('moderatorcat')->get_children($id);
       }
       $data['parent_cat'] = Model::factory('moderatorcat')->get_cat($cat['parent_cat']);
       $data['mat_all'] = Model::factory('material')->get_all_materials_moderator($id);
       $total_items = count($data['mat_all']);
       $page = $this->request->param('page');
       if(!$page) {
            $page = 1;
       }
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
       $data['materials_all'] = Model::factory('material')->mat_all_moderator($id,$offset,$per_page);
       $this->template->top_head = View::factory('moderator_cat/cat_top_head',$data);
       $this->template->content = View::factory('moderator_cat/show_cat',$data);
  
       
	}
    
    public function action_show_all()
	{  
       $data = array();
       $data['category_menu'] = $this->getCategories();
       $data['page_all'] = ORM::factory('page')->find_all();  
       $data['cat_all'] = ORM::factory('cat')->find_all();
       $cat = $data['cat_all'];
       $data['cat_title'] = 'Все категории';
       $this->template->top_head = View::factory('cat/cat_top_head',$data);
       $this->template->header = View::factory('components/header',$data);
       $this->template->category_icons = '';
	   $this->template->content = View::factory('cat/show_all_cat',$data);
       $this->template->container_left = View::factory('components/container_left',$data);
       
	}
    
    public function action_change_moder_status(){
        if($_POST){
            $val = $_POST['id'];
            $res = DB::select()->from('moderator_cats')->where('moderator_cat_id','=',$val)->execute()->current();
            if($res['visible'] == 1){
                 DB::update('moderator_cats')->set(array('visible'=>0))->where('moderator_cat_id','=',$val)->execute();
            }else {
                DB::update('moderator_cats')->set(array('visible'=>1))->where('moderator_cat_id','=',$val)->execute();
            }
            //print_r($val);
            die;
        }
    }

    

} // End Page
