<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mailin;
use PHPUnit\Framework\TestCase;
use Webup\LaravelSendinBlue\SendinBlueTransport;


class TestController extends TestCase
{
    //
    /*public function imageZoom()
    {
    	return view('front.test.image.index');
    }

    public function styleElement()
    {
    	return view('front.test.page.style-element');
    }*/

    //Test pour l'envoie mail
	public function SendMailTest(){
		$expected = [
            'to' => ['aa@alternateeve.com' => 'to whom!'],
            /*'cc' => ['ft@alternateeve.com' => 'cc whom!'],
            'bcc' => ['re@alternateeve.com' => 'bcc whom!'],*/
            'from' => ['ft@alternateeve.com', 'from email!'],
            /*'replyto' => ['andryhsm@gmail.com', 'reply to!'],*/
            'subject' => 'Test via clickee',
            'text' => 'Mail de test via clickee avec sendinblue',
            'html' => 'This is the <h1>clickee</h1>',
            // 'attachment' => $attachment,
            // 'headers' => []
            // 'inline_image' => []
        ];
        $message = new \Swift_Message();
        $message->setTo('aa@alternateeve.com', 'to whom!');
        /*$message->setCc('ft@alternateeve.com', 'cc whom!');
        $message->setBcc('re@alternateeve.com', 'bcc whom!');*/
        $message->setFrom('ft@alternateeve.com', 'from email!');
        /*$message->setReplyTo('andryhsm@gmail.com', 'reply to!');*/
        $message->setSubject('Test via clickee');
        $message->setBody('This is the <h1>clickee</h1>', 'text/html');
        $message->addPart('Mail de test via clickee avec sendinblue', 'text/plain');
        $client = $this->getMockBuilder('Sendinblue\Mailin')
            ->disableOriginalConstructor()
            ->getMock();
        $client->method('send_email')->will($this->returnValue(['code' => 'success']));
        $transport = new SendinBlueTransport($client);
        $client->expects($this->once())
                ->method('send_email')
                ->with($this->equalTo($expected));
        $transport->send($message);
        
        dd('envoyer');
    }
	
    public function SendMailTest2()
    {
	    $mailin = new Mailin('andryhsm@gmail.com', '0fPYUtrw6xKIDpJd');
        $mailin->
        addTo('andryhsm@gmail.com', 'Andry ANDRIANAIVO')->
        setFrom('fenoheriniainat@gmail.com', 'Feno Heriniaina')->
        setReplyTo('fenoheriniainat@gmail.com','Feno Heriniaina')->
        setSubject('Test 2 ndray douda')->
        setText('Hello')->
        setHtml('<h1>Contenu hafahafa iany ito</h1>');
        $res = $mailin->send();
		dd($res);
	}
}
