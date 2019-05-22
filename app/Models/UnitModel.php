<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class UnitModel extends Model
{
    protected $table = 'unitmodels';
	protected $fillable = [
        'unitmodelno',
        'unitname',
        'unitpilot',
        'unitcostperway',
        'unitgpsno',
        'unitcontactno',
        'description'  
    ];
}