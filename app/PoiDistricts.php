<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $oid
 * @property $area_name
 * @property $level
 * @property $parent_oid
 * @property $province_oid
 * @property $city_oid
 * @property $county_oid
 * @property $area_code
 * @property $simple_name
 * @property $lon
 * @property $lat
 * @property $zip_code
 * @property $whole_name
 * @property $whole_oid
 * @property $pre_pin_yin
 * @property $pin_yin
 * @property $simple_py
 * @property $remark
 * @property $version
 */
class PoiDistricts extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    public $primaryKey = 'oid';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'poi_districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['oid', 'area_name', 'level', 'parent_oid', 'province_oid', 'city_oid', 'county_oid', 'area_code', 'simple_name', 'lon', 'lat', 'zip_code', 'whole_name', 'whole_oid', 'pre_pin_yin', 'pin_yin', 'simple_py', 'remark', 'version'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['oid' => 'integer', 'level' => 'integer', 'parent_oid' => 'integer', 'province_oid' => 'integer', 'city_oid' => 'integer', 'county_oid' => 'integer', 'lon' => 'float', 'lat' => 'float', 'version' => 'float'];
}
