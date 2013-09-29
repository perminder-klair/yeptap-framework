<h4><?php echo $greet; ?></h4>

<p>View file: <code><?php echo __FILE__; ?></code></p>

<?php $this->renderPartial('_message', array(
    'greet' => 'This is partial rendered.',
)); ?>