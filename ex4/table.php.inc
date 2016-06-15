<?php
  class table {
    public $data;
  
      public function __construct() {
        $num_args=func_num_args();
        switch ($num_args) {
           case 1:
            $this->data = $data;
            break;
           case 0: 
            break;
             
        }
      }
    
      echo "<table>";
      set_header($data);
      
      echo "</table>";
    }
   
    
    public static function set_header($head){
      echo "<th>";
        echo "<td>".$head[1]."<td>";
        echo "<td>".$head[2]."<td>";
      echo "</th>";


    }
    
    public static function add_row($ligne){


    }
  }


?>