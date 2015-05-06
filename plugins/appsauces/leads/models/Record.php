<?php namespace Appsauces\Leads\Models;

use Form;
use Model;
use Input;
use RainLab\User\Models\User as User;

/**
 * Record Model
 */
class Record extends Model
{
     use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'appsauces_leads_records';
    protected $user_table = 'users';

    /**
    * @var array Guarded fields
    */
    protected $guarded = ['*'];

    protected $fillable = [
        'user_id',
        'filename',
        'path'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'user_id' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => ['RainLab\User\Models\User']
    ];

    public $attachOne = [
        'file' => ['System\Models\File']
    ];

    /**
     * Returns the public image file path to this user's avatar.
     */
    public function getFilePath()
    {

        if ($this->file)
            return $this->file->getPath();
        else
            return 'no file found';
    }

    public function getUserOptions()
    {
        return User::where('is_activated', '=', 1)->lists('name','id');
    }


}