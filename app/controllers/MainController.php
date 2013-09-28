<?php
class MainController extends Controller
{
    public function beforeAction ()
    {

    }

    public function index()
    {
        $model = new Main(); //init model
        $model->greet = 'Hello world! This is Yeptap Framework.'; //set
        $greet = $model->greet; //get

        $this->set('greet', $greet); //set in view
    }

    public function afterAction()
    {

    }
}