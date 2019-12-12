<?php defined('SYSPATH') or die('No direct script access.');

class Model_CRUD extends Model {

    
    protected $table = '';
    
    protected $key = '';
              
	public function get_alls()
	{  
	    $sql = "SELECT * FROM ".$this->table;
	   $res = DB::query(Database::SELECT,$sql)->execute()->as_array();
        //$result = DB::select()->from($this->table)->execute();
        return $res;
	}
    public function get_id($id)
	{  
	   $sql = "SELECT * FROM ".$this->table." WHERE ".$this->key." = '".$id."'";
	   $query = DB::query(Database::SELECT,$sql,FALSE);
       $res = $query->execute()->as_array();
       if($res) {
        return $res[0];
        
       }
       else {
        return FALSE;
       }
	}
    
    
    
    
    
    
    
     

} // End CRUD
