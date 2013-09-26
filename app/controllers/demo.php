<?php

class Demo_Controller extends CController
{
    public function main()
    {
        $model = new Demo();
        $item = $model->getItem('test');


        $this->render('master_template', array(
            'item' => $item,
        ));
    }
}