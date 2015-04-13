<?php namespace Appsauces\Leads;

use App;
use Event;
use Backend;
use System\Classes\PluginBase;

/**
 * Leads Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Leads',
            'description' => 'No description provided yet...',
            'author'      => 'Appsauces',
            'icon'        => 'icon-book'
        ];
    }

    public function registerPermissions()
    {
        return [
            'appsauces.leads.access_users'  => ['tab' => 'Leads', 'label' => 'Manage Leads'],
        ];
    }

    public function registerNavigation()
    {
        return [
            'user' => [
                'label'       => 'Leads',
                'url'         => Backend::url('appsauces/leads/records'),
                'icon'        => 'icon-book',
                'permissions' => ['appsauces.leads.*'],
                'order'       => 500,

                'sideMenu' => [
                    'users' => [
                        'label'       => 'All records',
                        'icon'        => 'icon-book',
                        'url'         => Backend::url('appsauces/leads/records'),
                        'permissions' => ['appsauces.leads.access_users'],
                    ],
                ]

            ]
        ];
    }

}
