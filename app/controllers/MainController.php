<?php

use app\components\SiteController;

class MainController extends SiteController
{
    /**
     * Initialized before action execution
     */
    public function beforeAction ()
    {

    }

    /**
     * action Index
     */
    public function index()
    {
        $this->renderLayout = true; //optional

        $model = new app\models\Main(); //init model

        $model->greet = 'Hello world! This is Yeptap Framework.'; //set
        $greet = $model->greet; //get

        $this->set('greet', $greet); //set in view
    }

    /**
     * Initialized after action execution
     */
    public function afterAction()
    {

    }
}