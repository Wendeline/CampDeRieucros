<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Borne extends Eloquent
{
    protected $primaryKey = 'idB';
    public $timestamps = false;
    
    public function texte(){
        return $this->belongsTo('Texte', 'idT','idT');
    }
}