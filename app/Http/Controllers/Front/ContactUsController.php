<?php

namespace App\Http\Controllers\Front;

use App\Service\EmailService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
	protected $email_service;

	public function __construct(EmailService $email_service)
	{
		$this->email_service = $email_service;
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.contactus');
    }

	public function send(Request $request)
	{
		$content_var_values = [];
        $content_var_values['to'] = 'andryhsm@gmail.com';
        $content_var_values['from'] = $request->get('email');
        $content_var_values['replyTo'] = $request->get('email');
        $content_var_values['subject'] = $request->get('subject');
        $content_var_values['email_text'] = $request->get('message');
        $content_var_values['email_html'] = $request->get('message');
        $res = $this->email_service->sendEmailBySendinblue($content_var_values); 
		/*$contact_email_address = "hello@alternateeve.com";

		$content_var_values = [];
		$content_var_values['NAME'] = $request->get('name');
		$content_var_values['EMAIL'] = $request->get('email');
		$content_var_values['SUBJECT'] = $request->get('subject');
		$content_var_values['MESSAGE'] = $request->get('message');

		$mail_params_array = ['to' => $contact_email_address, 'from' => env('MAIL_FROM_ADDRESS')];
		$send_email = $this->email_service->sendEmail($mail_params_array, config("email_template.CONTACT_US"), $content_var_values);*/
		flash()->success(trans('contact.success_msg'));
		return redirect()->route('contact-us-get');
	}
}
