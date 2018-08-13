<?php
namespace App\Http\Controllers\front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Validator;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $redirectTo = '/';
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getEmail()
    {
        return view('front.auth.passwords.email');
    }

    public function getReset($token)
    {
        return view('front.auth.passwords.reset',compact('token'));
    }
    public function postEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        //Solution provisoire car sendResetLinkResponse ne marche pas
        if($response == Password::RESET_LINK_SENT){
            flash()->success(config('message.reset-password.success-mail'));   
        }
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);

    }

    /**
     * Validate the email for the given request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
    }

    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email' => trans($response)]
        );
    }
    public function broker()
    {
        return Password::broker('users');
    }

    public function postReset(Request $request)
    {
        $credentials = Input::only('email', 'password', 'password_confirmation', 'token');
        $credentials['email'] = (Input::get('email'));
        $rules = array(
            'password' => 'required',
            'password_confirmation' => 'required',
            'email' => 'required',

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $response = Password::broker('users')->reset($credentials, function ($user, $password) {
            $user->password = \Hash::make($password);
            $user->save();
        });
        switch ($response) {
            case PasswordBroker::INVALID_PASSWORD:
                flash()->error(config('message.reset-password.reset-password-error-length'));
                return Redirect::back();
            case PasswordBroker::INVALID_TOKEN:
                flash()->error(config('message.reset-password.token'));
                return Redirect::back();
            case PasswordBroker::INVALID_USER:
                flash()->error(config('message.reset-password.reset-password-error'));
                return Redirect::back();
            case PasswordBroker::PASSWORD_RESET:
                flash()->success(config('message.reset-password.password-set'));
                return redirect()->route('login');
        }
    }
}
