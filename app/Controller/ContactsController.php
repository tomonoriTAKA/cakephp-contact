<?php
App::uses('AppController','Controller');
App::uses('CakeEmail','Network/Email');

class ContactsController extends AppController{

public $uses = array('Contact');

public $helpers = array('Html', 'Form','Flash');
public $components = array('Flash');



//入力画面
public function index() {
    if (!$this->request->is('post') || !$this->request->data)
        {$this->Contact->set($this->request->data);
        return;
        }


    if (!$this->Contact->validates()) {
        $this->Session->setFlash('入力内容に不備があります。');
        return;
    }

    switch ($this->request->data['confirm']) {
        case 'confirm':
            $this->render('confirm');
            break;
        case 'send':
            if ($this->sendContact($this->request->data['Contact'])) {
                $this->Session->setFlash('お問い合わせを受け付けました。');
                $this->redirect('/');
            } else {
                $this->Session->setFlash('エラーが発生しました。');
            }
            break;
    }
}

private function sendContact($content)
{
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail('contact');

    return $email
        ->from(array($content['email'] => $content['subject']))
        ->viewVars($content)
        ->template('contact', 'contact')
        ->send();
}







// 確認画面
public function confirm() {



} //end of function






// 送信処理
// public function send(){
//     $email = new CakeEmail('default');

//     $email->config(array(
//         'template' => 'contacts',
//         'viewVars' =>array(
//             'name' => $this->request->data['Contact']['name'],
//             'email' => $this->request->data['Contact']['email'],
//             'otoiawase' => $this->request->data['Contact']['otoiawase']
//             ),
//             'to' => 'takatomotest@gmail.com',
//             'subject' => 'お問い合わせ'
//         ));

//         if($email->send()){
//             $this->redirect('comp');
//         }else{

//         };

// }




// 完了画面
public function comp() {

}


}