<?php

namespace App\Http\Controllers;

use App\Mail\CallbackMessage;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required | email'
        ]);

        $old_subscriber = Subscriber::where('email', $request->email)->first();

        if (!isset($old_subscriber)) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->active = 1;
            $subscriber->save();

            return back()->with('message', 'Вы успешно подписались на рассылку. Спасибо.');
        } else {
            return back()->with('message', 'Вы уже подписаны на рассылку');
        }
    }

    public function unsubscribe(Request $request)
    {
        $old_subscriber = Subscriber::where('email', $request->email)->first();
        $old_subscriber->active = 1;
        $old_subscriber->update();
        return back()->with('message', 'Вы успешно отписались от рассылки.');
    }

    public function callback(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | email',
            'message' => 'required | string',
        ]);

        $old_subscriber = Subscriber::where('email', $request->email)->first();
        if (!isset($old_subscriber)) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->active = 1;
            $subscriber->save();
        }

        Mail::to(env('ADMIN_MAIL'))->send(new CallbackMessage($request));

        return back()->with('message', 'Вы успешно отправили письмо.');
    }
}
