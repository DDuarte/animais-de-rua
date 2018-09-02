<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;

class Animal extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'animals';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['adoption_id', 'name', 'age', 'gender', 'sterilized', 'vaccinated'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function adoption()
    {
        return $this->belongsTo('App\Models\Adoption', 'adoption_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getAdoptionLinkAttribute()
    {
        return $this->getLink($this->adoption);
    }

    public function getGenderValueAttribute()
    {
        return ucfirst(__($this->gender));
    }

    public function getSterilizedValueAttribute()
    {
        return ucfirst(__($this->sterilized ? 'yes' : 'no'));
    }

    public function getVaccinatedValueAttribute()
    {
        return ucfirst(__($this->vaccinated ? 'yes' : 'no'));
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setAgeAttribute($value)
    {
        $this->attributes['age'] = $value[0] * 12 + $value[1];
    }

    public function getAgeAttribute($value)
    {
        return [floor($value / 12), $value % 12];
    }

    public function getAgeValueAttribute()
    {
        list($y, $m) = $this->age;

        $result = [];
        if ($y > 0) {
            $result[] = "$y " . ($y > 1 ? __('years') : __('year'));
        }

        if ($m > 0) {
            $result[] = "$m " . ($m > 1 ? __('months') : __('month'));
        }

        return join(' ' . __('and') . ' ', $result);
    }
}
