<?php defined('SYSPATH') or die('No direct script access.');

class Model_Page extends Model {
    
    public function get_page($alias,$lang) {
        $res = DB::select()->from('pages')->where('page_alias','LIKE','%'.$alias.'%')->execute()->current();
        return $res;
    }
    public function find_all_lang($lang) {
        if($lang ==  'ru'){
            $res = DB::select()->from('pages')->execute()->as_array();
        }else {
            $res = DB::select()->from('pages_lang')->where('langvige','=',$lang)->execute()->as_array();
        }
        
        return $res;
    }
    public function get_page_id($page_id) {
        
            $res = DB::select()->from('pages')->where('page_id','=',$page_id)->execute()->current();
        
        return $res;
    }
    public function show_month($month) {
        switch($month) {
            case '01':
            return 'Січень';
            break;
            case '02':
            return 'Лютий';
            break;
            case '03':
            return 'Березень';
            break;
            case '04':
            return 'Квітень';
            break;
            case '05':
            return 'Травень';
            break;
            case '06':
            return 'Червень';
            break;
            case '07':
            return 'Липень';
            break;
            case '08':
            return 'Серпень';
            break;
            case '09':
            return 'Вересень';
            break;
            case '10':
            return 'Жовтень';
            break;
            case '11':
            return 'Листопад';
            break;
            case '12':
            return 'Грудень';
            break;               
        }
    }
} // End Metki