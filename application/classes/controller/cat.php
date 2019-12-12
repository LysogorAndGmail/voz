<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cat extends Controller_Main {

                   
	public function action_show_cat()
	{  
	   $data = array();
       $data['new_user'] = Session::instance()->get('new_user');
 	   $id = $this->request->param('id');
       $cat = Model::factory('cat')->get_cat($id);
       $data['cat'] = $cat;
       if($cat['parent_id'] == 0) {
        $data['children_cat'] = Model::factory('cat')->get_children($id);
       }
       $data['parent_cat'] = Model::factory('cat')->get_cat($cat['parent_id']);
       $data['mat_all'] = Model::factory('material')->get_all_materials($id);
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
       $data['materials_all'] = Model::factory('material')->mat_all($id,$offset,$per_page);
       
       $this->template->top_head = View::factory('cat/cat_top_head',$data);
       $this->template->content = View::factory('cat/show_cat',$data);
  
       
	}
    
    public function action_show_all()
	{  
       $data = array();
       $data['category_menu'] = $this->getCategories();
       $data['new_user'] = Session::instance()->get('new_user');
       $data['page_all'] = ORM::factory('page')->find_all();  
       $data['cat_all'] = ORM::factory('cat')->find_all();
       $cat = $data['cat_all'];
       $data['cat_title'] = 'Всі категорії';
       $this->template->top_head = View::factory('cat/cat_top_head',$data);
       $this->template->header = View::factory('components/header',$data);
       $this->template->category_icons = '';
	   $this->template->content = View::factory('cat/show_all_cat',$data);
       $this->template->container_left = View::factory('components/container_left',$data);
       
	}
    
    

    

} // End Page
