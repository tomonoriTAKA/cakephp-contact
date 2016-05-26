<?php
echo $this->Session->flash();

echo $this->Form->create('Contact',array('action'=>'confirm'));

echo $this->Form->input('name', array(
        'type' => 'text',
        'label' => 'お名前',
        'maxlength' => 255,
        )
     );

echo $this->Form->input('email', array(
        'type' => 'email',
        'label' => 'メールアドレス',
        'maxlength' => 255,
        )
     );

echo $this->Form->input('tel', array(
        'type' => 'text',
        'label' => '電話番号',
        'maxlength' => 255,
        )
    );



$list = array('サービスについて'=>'サービスについて',
              '採用について'=>'採用について',
              '取材について'=>'取材について');


echo $this->Form->input('check',array(
        'type'    =>'select',
        'multiple'=>'checkbox',
        'options' => $list,
        'label'=>'お問い合わせ種別',
    )
);




echo $this->Form->input('body', array(
        'type' => 'textarea',
        'label' => 'お問い合わせ内容',
        'maxlength' => 3000,
        )
    );


echo $this->Form->end('確認画面へ進む');?>

