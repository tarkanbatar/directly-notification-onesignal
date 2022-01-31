<?php

include '../src/direct.php';
include '../src/segment.php';

$segment = new \SegmentNotification\Segment();
$direct = new \DirectNotification\Direct();


echo 'Usage: php run_script.php [direct/segment] [title] [message] [User_ID/Segment_Name]' . "\r\n";
// you can send long text to api by writing string in double qoutes for title and message parameters

$args = array_values(array_diff_key($argv, array(basename(__FILE__))));
if (count($args) < 4) die('Wrong arguments passed!' . "\r\n");

if($args[0] == 'direct'){
    $direct->sendNotification($args[3],$args[1],$args[2]);
} else if ($args[0] == 'segment'){
    $segment->sendNotification($args[3],$args[1],$args[2]);
} else {
    echo "Yanlis input girdiniz!";
}

?>