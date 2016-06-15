<?php
  class table {
    public $data;
  
      public function __construct() {
        $num_args=func_num_args();
        switch ($num_args) {
           case 1:
            $this->data = $data;
            echo "<table border=1>";
            $this->set_header($data);
            echo "</table>";
            break;
           case 0: 
            break;
             
        }
      }
   
   
    public static function set_header($head){
      echo "<th>";
        echo "<td>".$head[0]."<td>";
        echo "<td>".$head[1]."<td>";
        echo "<td>".$head[2]."<td>";
      echo "</th>";


    }
    
    public static function add_row($ligne){
      echo "<tr>";
        echo "<td>".$ligne[0]."<td>";
        echo "<td>".$ligne[1]."<td>";
        echo "<td>".$ligne[2]."<td>";
      echo "</tr>";

    }
  }


?>