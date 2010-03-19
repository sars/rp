<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Controller_Dbtest extends Controller {
 
  public function action_index()
  {
        $query = DB::query(Database::SELECT, 'select current_date() as date');
        $row = $query->execute()->current();
        echo $row['date'];
  }
 
} // Конец контроллера