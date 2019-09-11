<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'customers';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function getPoint() {
        return $this->fact_addr_coord;
    }
    
    public function getPoints() {
        $latitude = $this->latitude;
        $longitude = $this->longitude;
        
        return $latitude.",".$longitude;
    }
    
    public function getComment() {
        $url = $this->site_url;
        
        return $this->id."<br>".$this->fact_addr."<br>".$this->company_name.'<br><a href="'.$url.'" target="_blank">'.$url.'</a>';
    }
}
