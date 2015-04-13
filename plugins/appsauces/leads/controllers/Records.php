<?php namespace Appsauces\Leads\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Records Back-end Controller
 */
class Records extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Appsauces.Leads', 'leads', 'records');
    }
}