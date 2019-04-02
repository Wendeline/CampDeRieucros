<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Texte extends Eloquent
{
    protected $primaryKey = 'idT';
    public $timestamps = false;
    
    public function txtPhoto(){
        return $this->hasMany('Gallerie','idT');
    }
    
    public function txtBorne(){
        return $this->hasMany('Borne','idT');
    }
    
    public function txtInfo(){
        return $this->hasMany('Information','idT');
    }
}