<?php 

class Db_object {

   public static function find_by_query($sql)
   {
      global $database;
      $result_set = $database->query($sql);
      $object_array = array();
      while ($row = mysqli_fetch_array($result_set)) {
         $object_array[] = static::instantiation($row);
      }
      return $object_array;

   }


   public static function find_by_id($id)
   {
      global $database;
      $the_result_array = static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id = {$id}");
      return !empty($the_result_array) ? array_shift($the_result_array) : false;
   }


   protected static function instantiation($the_record)
   {
      $called_class = get_called_class();
      $the_object = new $called_class;
      foreach ($the_record as $the_attribute => $value) {
         if ($the_object->has_the_attribute($the_attribute)) {
            $the_object->$the_attribute = $value;
         }
      }
      return $the_object;
   }


   protected function has_the_attribute($the_attribute)
   {
      $object_properties = get_object_vars($this);
      return array_key_exists($the_attribute, $object_properties);
   }


   protected function properties()
   {
      $properties = array();
      foreach (static::$db_table_fields as $db_field) {
         if (property_exists($this, $db_field)) {
            $properties[$db_field] = $this->$db_field;
         }
         return $properties;
      }
   }


   protected function clean_properties()
   {
      global $database;
      $clean_properties = array();
      foreach ($this->properties() as $key => $item) {
         $clean_properties[$key] = $database->escape_string($item);
      }
      return $clean_properties;
   }


}

?>