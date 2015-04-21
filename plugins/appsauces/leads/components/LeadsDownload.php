<?php namespace Appsauces\Leads\Components;

use Auth;
use Cms\Classes\ComponentBase;
use Appsauces\Leads\Models\Record as Records;

class LeadsDownload extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'LeadsDownload Component',
            'description' => 'Let subscriber download leads assigned by lead manager'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function files()
    {
        $user = $this->user();
        return Records::where('user_id', '=', $user->id)->get();
    }

    /**
     * Returns the logged in user, if available
     */
    public function user()
    {
        if (!Auth::check())
            return null;

        return Auth::getUser();
    }
}