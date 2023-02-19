<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;
use App\Models\User;
use App\Mail\BeginningYearReminder;
use Illuminate\Support\Facades\Log;

class BeginningYear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:beginningYear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '年度はじめのリマインダーバッチ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Mailer $mailer)
    {
        Log::debug('aaa');
        $roles = \CommonConst::USER_REGISTER_MAIL_LIST;
        $users = User::applyRoleUser($roles);
        foreach ($users as $user) {
        $mailer->to($user->email)
            ->send(new BeginningYearReminder());
        }
        return 0;
    }
}
