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

    public function store(Request $request, Mailer $mailer)
    {
        $request[] = $request->all();
        $roles = [\CommonConst::ROLE_LIST['SYSTEM_ADMIN'], \CommonConst::ROLE_LIST['SITE_ADMIN']];
        $toUsers = User::applyRoleUser($roles);
        foreach ($toUsers as $touUser) {
        $mailer
            ->to($touUser->email)
            ->from($request['email'], $request['first-name'] . $request['last-name'] . '様')
            ->send(new Contact($touUser, $request));
        }
    }
}
