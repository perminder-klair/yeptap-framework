<?php
//namespace Base\Components;
class CController
{
    public function render($viewFile, $data=array())
    {
        // Now we can nest our templates using multiple views
        $header = new ViewBase('header_template');
        $footer = new ViewBase('footer_template');
        $master = new ViewBase($viewFile);
        $master->assign('header', $header->render(FALSE));
        $master->assign('data', $data);
        $master->assign('footer', $footer->render(FALSE));
        $master->render();
    }
}