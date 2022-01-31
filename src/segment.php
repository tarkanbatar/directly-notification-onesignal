<?php

namespace SegmentNotification;

class Segment {
    function sendNotification($segmentName,$title, $message)
    {
        $msg = $message;
        $content = array(
            "en" => $msg
        );
        $headings = array(
            "en" => $title
        );
        
        $fields = array(
            'app_id' => 'APP_ID',
            "headings" => $headings,
            'content_available' => true,
            'included_segments' => array(
                $segmentName
            ),
            'contents' => $content,
            "chrome_web_icon" => 'ICON_ID',
            "chrome_web_image" => 'RESIM_URL'
        );
        
        $headers = array(
            'Authorization: Basic API_KEY',
            'Content-Type: application/json; charset=utf-8'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
        
    }
}

