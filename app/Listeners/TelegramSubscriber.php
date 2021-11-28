<?php


namespace App\Listeners;


use App\Events\OrderStore;
use App\Helpers\Telegram;

class TelegramSubscriber
{
    protected $telegram;

    public function __construct(Telegram  $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param OrderStore $event
     * @return array
     */

    public function orderStore($event)
    {
        $data = [
            'id' => $event->order->id,
            'name' => $event->order->name,
            'email' => $event->order->email,
            'product' => $event->order->product,
        ];

        $reply_markup = [
            'inline_keyboard' =>
                [
                    [
                        [
                            'text' => 'Принять',
                            'callback_data' => '1|'.$event->order->secret_key,
                        ],
                        [
                            'text' => 'Отклонить',
                            'callback_data' => '0|'.$event->order->secret_key,
                        ],
                    ]
                ]
        ];

        $this->telegram->sendButtons(env('REPORT_TELEGRAM_ID'), (string)view('site.messages.new_order', $data), $reply_markup);
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen(
            OrderStore::class, [
                TelegramSubscriber::class, 'orderStore'
            ]
        );

    }
}
