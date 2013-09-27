<?php
//namespace app\Controllers;

//use \base\components\Controller;

class DemoController extends Controller
{
    public function index()
    {
        $model = new Demo();
        $item = $model->getItem('test');


        $this->render('todo',array(
            'data' => $item
        ));
    }
}