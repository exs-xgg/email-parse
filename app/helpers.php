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

        $parsed_email = strip_tags($message->getTextContent());
        return $parsed_email ? $parsed_email : strip_tags($email);  # Just in case email cant be parsed, just strip the tags

    }
}