<?php

require_once('alexa.php');
/* retrieve & display rank */
$alexa = new alexa();
$info = $alexa->get_rank($argv[1]);
$plural = ($info['reviews_num'] > 1) ? 's' : '';
$message = "{$argv[1]}";
$message .= ($info['name']) ? " - {$info['name']}" : '';
$message .= ($info['category']) ? "\r\n\r\nCategory: {$info['category']}" : '';
$message .= ($info['rank']) ? "\r\n\r\nGlobal Traffic Rank: {$info['rank']}" : '';
$message .= ($info['speed_time']) ? "\r\n\r\nAverage Load Time\r\n{$info['speed_time']} seconds, {$info['speed_percent']}" : '';
$message .= ($info['links']) ? "\r\n\r\nSites linking in: {$info['links']}" : '';
$message .= ($info['reviews_stars']) ? "\r\n\r\nAverage of {$info['reviews_stars']} stars from {$info['reviews_num']} review{$plural}" : '';

echo $message;