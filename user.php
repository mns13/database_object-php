<?php 

class User extends Db_object {
    
   protected static $db_table = 'users';
   protected static $db_table_fields = array('user_id', 'username', 'email');


   public $user_id,
          $username,
          $email;


   public static function verify_user($username, $password)
   {
      global $database;
      $user_id = $database->escape_string($user_id);
      $username = $database->escape_string($username);
      $sql = "SELECT * FROM " . self::$db_table . " WHERE user_id = '{$user_id}' AND username = '{$username}' ";
      return $result_set = self::find_by_query($sql);
   }

}



?>