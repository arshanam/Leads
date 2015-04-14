<?php namespace Appsauces\Leads\Models;

use Model;

/**
 * Record Model
 */
class Record extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'appsauces_leads_records';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}