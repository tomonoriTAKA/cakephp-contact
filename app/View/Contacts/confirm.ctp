
<dl>
<?php foreach ($this->request->data['Contact'] as $name => $val): ?>
    <dt><?php echo h($name); ?></dt>

    <?php if(is_string($val)):?>
        <dd><?php echo h($val); ?></dd>

    <?php else: ?>
        <!-- チェックボックスの値を表示したい -->

        <?php $array = array(); ?>
        <?php foreach ($this->request->data['Contact']['check'] as $array): ?>
            <?php echo h($array); ?>

        <?php endforeach; ?>
    <?php endif; ?>

<?php endforeach; ?>
</dl>

<?php
echo $this->Form->create('Contact');

foreach ($this->request->data['Contact'] as $name => $val) {
// チェックボックスの値も渡したい
    if(is_string($val))
    {
        echo $this->Form->hidden($name, array('value' => $val));

    }else{
        foreach ($this->request->data['Contact']['check'] as $array)
        {
            echo $this->Form->hidden($name, array('value' => $array));
        }
    }


}

echo $this->Form->button('戻る',array(
        'type'=>'button',
        'onClick'=>'history.back()'
    ));


echo $this->Form->button('送信する', array(
        'type' => 'submit',
        'name' => 'confirm',
        'value' => 'send'
    ));

echo $this->Form->end();

?>
