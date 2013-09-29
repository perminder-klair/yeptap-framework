<p><?php echo $greet; ?></p>

<?php $this->renderPartial('_message', array(
    'greet' => $greet,
)); ?>