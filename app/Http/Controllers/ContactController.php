<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactRedirect;
use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;
use App\Http\Requests\ContactForm;

/**
 * お問い合わせ
 *
 */
class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function send(ContactForm $request, Mailer $mailer)
    {
        $request = $request->all();
        $roles = \CommonConst::USER_REGISTER_MAIL_LIST;
        $toUsers = User::applyRoleUser($roles);

        $mailer->to($request['email'])
            ->send(new ContactRedirect($request));

        foreach ($toUsers as $toUser) {
        $mailer
            ->to($toUser->email)
            ->send(new Contact($toUser, $request));

        }
        return redirect(route('contact.index'))->with('message', 'メールの送信が完了しました。');
    }
}
