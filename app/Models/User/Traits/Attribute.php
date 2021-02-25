<?php

namespace App\Models\User\Traits;

trait Attribute
{   
  	public function getActionAttribute()
    {
        $sendData = '<div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" data-id='.$this->id().' id="editUser">Edit</a>
                    <!--<a class="dropdown-item" href="">View</a>-->';
                       
                        $sendData = $sendData.'<a class="dropdown-item" id="deleteUser"  data-id='.$this->id().'>Delete</a>              
                    </div>
                </div>';
        
      return $sendData;
    } 

    public function id()
    {
        return $this->id;
    }

    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {                
            return '<a href="javascript:;" class="change-status" data-id='.$this->id().' data-status="0"><span class="badge badge-success">Active</span></a>';     
        }               
        return '<a href="javascript:;" class="change-status" data-id='.$this->id().' data-status="1" ><span class="badge badge-danger">In active</span></a>'; 
    }

    public function isActive()
    {  
        return $this->status == 1;
    }
}
?>
