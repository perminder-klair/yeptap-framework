<?php
class Demo_Controller
{
    public function main()
    {
        $model = new Demo();
        $item = $model->getItem('test');


        // Now we can nest our templates using multiple views
        $header = new ViewBase('header_template');
        $footer = new ViewBase('footer_template');
        $master = new ViewBase('master_template');
        $master->assign('header', $header->render(FALSE));
        $master->assign('item', $item);
        $master->assign('footer', $footer->render(FALSE));
        $master->render();
    }
}