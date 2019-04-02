<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Information extends Eloquent
{
    protected $primaryKey = 'idInfo';
    public $timestamps = false;
    
    public function texte(){
        return $this->belongsTo('Texte','idT','idT');
    }
    public function image(){
        return $this->belongsTo('Gallerie','idIG','idIG');
    }
}