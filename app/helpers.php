<?php

if (! function_exists('flash')) {

    /**
     * @param $message
     * @param string $type
     */
    function flash($message, $type = 'success')
    {
        session()->flash('message', $message);
        session()->flash('message_type', $type);
    }
}

if (!function_exists('push_all')) {
    /**
     * @param null $title
     * @param null $text
     * @return \App\Services\Pushall|mixed
     */
    function push_all($title = null)
    {
        if (is_null($title)) {
            return app(\App\Services\Pushall::class);
        }

        return app(\App\Services\Pushall::class)->send($title);
    }
}
