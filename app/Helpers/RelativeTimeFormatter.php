<?php

namespace App\Helpers;

class RelativeTimeFormatter
{
    public static function format($date)
    {
        $currentTime = time();
        $timestamp = strtotime($date);
        $diff = $currentTime - $timestamp;

        if ($diff < 60) {
            return $diff . ' seconds ago';
        } elseif ($diff < 3600) {
            $minutes = round($diff / 60);
            return $minutes . ' minutes ago';
        } elseif ($diff < 86400) {
            $hours = round($diff / 3600);
            return $hours . ' hours ago';
        } elseif ($diff < 2592000) {
            $days = round($diff / 86400);
            return $days . ' days ago';
        } elseif ($diff < 31536000) {
            $months = round($diff / 2592000);
            return $months . ' months ago';
        } else {
            $years = round($diff / 31536000);
            return $years . ' years ago';
        }
    }
}
