<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;

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

    public function send(Request $request, Mailer $mailer)
    {
        $request = $request->all();
        $roles = \CommonConst::USER_REGISTER_MAIL_LIST;
        $toUsers = User::applyRoleUser($roles);
        foreach ($toUsers as $toUser) {
        $mailer
            ->to($toUser->email)
            ->send(new Contact($toUser, $request));
        }
    }
}
