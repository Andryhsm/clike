<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\EmailService;
use App\Mailin;
use App\Sms;


class TestController extends Controller
{
    protected $email_service;

    public function __construct(EmailService $email_service)
    {
        $this->email_service = $email_service;
    }
    public function SendMailTest()
    {

        $content_var_values = [];
        $content_var_values['to'] = 'andryhsm@gmail.com';
        $content_var_values['from'] = 'fenoheriniainat@gmail.com';
        $content_var_values['replyTo'] = 'fenoheriniainat@gmail.com';
        $content_var_values['subject'] = 'Test Sendinblue';
        $content_var_values['email_text'] = 'Hello, this is a test via clickee by sendinblue text';
        $content_var_values['email_html'] = '<h1>Hello, this is a test via clickee by sendinblue html</h1>';
        $res = $this->email_service->sendEmailBySendinblue($content_var_values);    
	    /*$mailin = new Mailin('andryhsm@gmail.com', '0fPYUtrw6xKIDpJd');
        $mailin->
        addTo('andryhsm@gmail.com', 'Andry ANDRIANAIVO')->
        setFrom('fenoheriniainat@gmail.com', 'Feno Heriniaina')->
        setReplyTo('fenoheriniainat@gmail.com','Feno Heriniaina')->
        setSubject('Test via clickee by sendinblue')->
        setText('Hello, this is a test via clickee by sendinblue text')->
        setHtml('<h1>Hello, this is a test via clickee by sendinblue html</h1>');
        $res = $mailin->send();*/
		dd($res);
	}
	
	public function SendSms()
	{
	    $mailin = new Sms('0fPYUtrw6xKIDpJd');

        $mailin->addTo('33XXXXXXXXXX') //Numero destinataire
    
            ->setFrom('Andry ANDRIANAIVO') // If numeric, then maximum length is 17 characters and if alphanumeric maximum length is 11 characters.
            ->setText('Text message to send') // 160 characters per SMS.
            ->setTag('Your tag name')
    
            ->setType('') // 2 valeurs possibles : marketing ou transactional.
            ->setCallback('http://callbackurl.com/');
    
        $res = $mailin->send();
        dd($res);
	}
}
