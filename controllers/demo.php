<?php
class Demo_Controller
{
    public function main()
    {
        // Now we can nest our templates using multiple views
        $header = new View_Model('header_template');
        $footer = new View_Model('footer_template');
        $master = new View_Model('master_template');
        $master->assign('header', $header->render(FALSE));
        $master->assign('footer', $footer->render(FALSE));
        $master->render();
    }
}