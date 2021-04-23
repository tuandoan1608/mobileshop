<?php
namespace App\Components;



class Recusive {
    private $data;
    private $htmlSelect='';
    public function __construct($data)
    {
        $this->data=$data;
    }
    function categoryRecure( $id =0, $text = '')
    {
       

        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                
                    $this->htmlSelect .= "<option value='"  . $value['id'] .  "'>" . $text . $value['name'] . "</option>";

                    $this->categoryRecure($value['id'], $text . '--');
                
               
            }
        }
        return $this->htmlSelect;
    }
}


?>