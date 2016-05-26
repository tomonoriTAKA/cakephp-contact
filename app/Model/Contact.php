<?php
App::uses('AppModel','Model');

class Contact extends AppModel
{
    public $useTable = false;

    public $_schema = array(
        'name' => array('type' => 'string', 'length' => 255),
        'email' => array('type' => 'string', 'length' => 255),
        'tel' => array('type' => 'string', 'length' => 255),
        'check'=>array('type' => 'array'),
        'body' => array('type' => 'text')
        );

    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'メールアドレス以外が入力されています。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
         'tel' => array(

            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),

            'phone' => array(
                'rule' => array('custom', '/^(0\d{1,4}[\s-]?\d{1,4}[\s-]?\d{4})$/'),
                'message' => '正しい電話番号を入力してください。',
                'required' => true,
            )
        ),

         'check' => array(

            'checkbox'=>array(
                'rule'=> array('multiple',
                            array('min' => 1,'max' => 3)),
                'message'=>'最低１つはチェックしてください。',
                'required' => true,
            )
        ),



        'body' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 3000),
                'message' => '3000文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
    );
}






    // public $validates =array(
    //     'name' => array(
    //         'rule' => 'notEmpty'),

    //     'email' => array(
    //         'rule' => array('email',true),
    //         'message' => 'メールアドレスを入力して下さい。',
    //         'allowEmpty' => false
    //         ),


    //      'tel' => array(
    //         'rule' => array( 'custom', '/^(0\d{1,4}[\s-]?\d{1,4}[\s-]?\d{4})$/'),
    //         'message' => '正しい電話番号を入力してください。',
    //         'allowEmpty' => false
    //         ),

    //    'check' => array(
    //         'rule'=> array('multiple',
    //                     array('min' => 1,'max' => 3)),
    //                        'required' => true,),

    //  'otoiawase' => array(
    //         'rule' => 'notEmpty')
    //     );

