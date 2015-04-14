<?php namespace Appsauces\Leads\Models;

use Form;
use Model;
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
     * @var bool Indicates if the model should be timestamped.
     */
    public $timestamps = false;

    /**
     * @var array Cache for nameList() method
     */
    protected static $nameList = [];

    public function beforeSave()
    {
        $this->path = $this->file->getPath();
        $this->filename = $this->file->file_name;
    }

    public static function getNameList($userId)
    {
        if (isset(self::$nameList[$userId]))
            return self::$nameList[$userId];

        return self::$nameList[$userId] = self::whereUserId($userId)->lists('name', 'id');
    }

    public static function formSelect($name, $userId = null, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList($userId), $selectedValue, $options);
    }

    public function getUserOptions()
    {
        return User::where('is_activated', '=', 1)->lists('name','id');
    }

}