<?php

namespace App\Models\Faq\Traits;

trait Attribute
{   
  	public function getActionAttribute()
    {
        $sendData = '<div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" data-id='.$this->id().' id="editFaq">Edit</a>
                    <!--<a class="dropdown-item" href="">View</a>-->';
                       
                        $sendData = $sendData.'<a class="dropdown-item" id="deleteFaq"  data-id='.$this->id().'>Delete</a>              
                    </div>
                </div>';
        
      return $sendData;
    } 

    public function id()
    {
        return $this->id;
    }
}
?>
