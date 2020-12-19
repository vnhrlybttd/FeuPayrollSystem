<?php
use Carbon\Carbon;
function diff_date_for_humans(Carbon $date) : string
{
    return (new Jenssegers\Date\Date($date->timestamp))->ago();
}
function diff_string_for_humans($stringDate) : string
{
    $date = Jenssegers\Date\Date::createFromFormat('Y-m-d H:i:s', $stringDate);
    return (new Jenssegers\Date\Date($date))->ago();
}
function scannerTableLabel($stringDate) : string
{
    $now = Jenssegers\Date\Date::now();
    $date = Jenssegers\Date\Date::createFromFormat('Y-m-d H:i:s', $stringDate);
    $printDate = (new Jenssegers\Date\Date($date))->ago();
    $color = $now > $date ? 'info' : 'danger';
    $res = '<span class="badge badge-'.$color.'" style="color:white;">SCANNER: ';
    $res .= $printDate ;
    $res .= '</span>';
    return $res;
}