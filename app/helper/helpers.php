<?php

function convertSec($sec)
{
    $init = $sec;
    $hours = floor($init / 3600);
    $minutes = floor(($init / 60) % 60);
    $seconds = $init % 60;
    
    return "$hours:$minutes:$seconds";
}
