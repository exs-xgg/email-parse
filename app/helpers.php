<?php

use ZBateson\MailMimeParser\Message;

if (!function_exists('parse_email')) {
    /**
     * Format a date to a specific format.
     *
     * @param  string  $date
     * @param  string  $format
     * @return string
     */
    function parse_email($email)
    {

        $message = Message::from($email, false);
        return strip_tags($message->getTextContent());
    }
}