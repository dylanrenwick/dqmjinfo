<?php

class MonsterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $id = Request::get('id');
        if (isset($id))
        {
            $this->View->render('monster/monster', array(
                'monster' => MonsterModel::getMonsterById(Request::get('id'))
            ));
        }
        else
        {
            Redirect::to('monster/list');
        }
    }

    public function list()
    {
        $family = Request::get('family');
        $rank = Request::get('rank');
        $skillset = Request::get('skillset');
        $trait = Request::get('trait');
        $resistance = Request::get('resistance');

        if (isset($family))
        {

        }
        else if (isset($rank))
        {

        }
        else if (isset($skillset))
        {

        }
        else if (isset($trait))
        {

        }
        else if (isset($resistance))
        {

        }
        else
        {

        }
    }
}