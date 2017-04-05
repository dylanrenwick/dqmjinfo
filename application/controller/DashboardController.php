<?php

/**
 * This controller shows an area that's only visible for logged in users (because of Auth::checkAuthentication(); in line 16)
 */
class DashboardController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // this entire controller should only be visible/usable by logged in users, so we put authentication-check here
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /dashboard/index in your app.
     */
    public function index()
    {
        $this->View->render('dashboard/index');
    }

    public function monsters()
    {
        $this->View->render('dashboard/monsters', array(
            'monsters' => MonsterModel::getMonsterList()
        ));
    }

    public function createmonster()
    {
        $creation_successful = MonsterModel::createMonster(
            Request::post('id'), Request::post('name'), Request::post('family'), Request::post('rank'),
            Request::post('skillset'), Request::post('traits'), Request::post('resistances'),
            Request::post('hp'), Request::post('mp'), Request::post('atk'), 
            Request::post('def'), Request::post('agi'), Request::post('wis')
        );

        Redirect::to('dashboard/monsters');
    }
}
 