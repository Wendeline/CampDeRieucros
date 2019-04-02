<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Gallerie extends Eloquent
{
    protected $primaryKey = 'idIG';
    public $timestamps = false;
    
    public function texte(){
        return $this->belongsTo('Texte','idT','idT');
    }
    
    public function infoImg(){
        return $this->hasMany('Information','idIG');
    }
}