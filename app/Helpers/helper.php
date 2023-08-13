<?php
require_once __DIR__.'/permission.php';

function formatCurrency($money, $code = 'usd')
{
    switch ($code) {
        case 'riel':
        return number_format($money, 0, '', ',') . '៛';
        case 'per':
        return number_format($money, 0, '','', ).'%' ;
        case 'none':
        return number_format($money, 2, '.', ',');
        default:
            return '$' . number_format($money, 2, '.', ',');

    }
}

function hightlightWords($text, $word)
{
    if($word == null) {
        return $text;
    }

    $text = preg_replace('#'. preg_quote($word) .'#i', '<span style="background-color: yellow">\\0</span>', $text);

    return $text;
}
function numToChar($number) {
    $numeric = ($number - 1) % 26;
    $letter = getChr(65 + $numeric);
    $number2 = intval(($number - 1) / 26);
    if ($number2 > 0) {
        return numToChar($number2) . $letter;
    } else {
        return $letter;
    }
}

function getChr($codePt)    {
    if ($codePt > 0xFFFF) {
        $codePt -= 0x10000;
        return car(0xD800 + ($codePt >> 10), 0xDC00 + ($codePt & 0x3FF));
    }

    return chr($codePt);
}

function generateContentHeader($parent, $child = null, $action = null)
{
    $output = '<div class="row mb-2">';
    $output .= '<div class="col-sm-6">';
    $output .= '<h1 class="m-0">'. ucwords($parent).'</h1>';

    if($child)
    {
        $output .= '</div>';
        $output .= '<div class="col-sm-6">';
        $output .= '<ol class="breadcrumb float-sm-right">';
        $output .= '<li class="breadcrumb-item"><a href="'.route('dashboard').'">Dashboard</a></li>';

        if($action) {
            $output .= '<li class="breadcrumb-item"><a href="'. route(str_replace(' ', '_', strtolower($child))) .'">'.  ucwords($child) .'</a></li>';
            $output .= '<li class="breadcrumb-item active">'. $action .'</li>';
        } else {
            $output .= '<li class="breadcrumb-item  active">'.  ucwords($child) .'</li>';
        }

        $output .= '</ol>';
        $output .= '</div>';
    } else {
        $output .= '</div>';
        $output .= '</div>';
    }
    return $output;
}

function formatDateTime($date){
    if(empty($date)) return '';
    return \Carbon\Carbon::parse($date)->setTimezone('Asia/Phnom_Penh')->format('d-M-Y h:i A');
}

function formatDate($date, $format = 'Y-m-d') {
    if(empty($date)) return '';
    return \Carbon\Carbon::parse($date)->setTimezone('Asia/Phnom_Penh')->format($format);
}

function ok($data = null)
{
    return response()->json(['success' => true, 'data' => $data]);
}

function fail($message, $code = 400)
{
    return response()->json(["success" => false, "message" => $message], $code);
}

function errorMessage($message)
{
    $error_message = [];

    if (is_object($message) || is_array($message))
        foreach ($message as $key => $value)
            $error_message['val'][$key] = $value[0];
    else
        $error_message = $message;

    return $error_message;
}

function phoneFormat($phone_number, $prefix = '0')
{
    return str_replace('+855', $prefix, $phone_number);
}

function hightlight($text, $word)
{
    if($word == null) {
        return $text;
    }

    $text = preg_replace('#'. preg_quote($word) .'#i', '<span style="background-color: yellow">\\0</span>', $text);

    return $text;
}

function getSortClassFor($column)
{
    if(request('order') == $column) {
        return request('sort') == 'asc' ? 'sorting_asc' : 'sorting_desc';
    }

    return 'sorting';
}

function getSortUrlFor($column)
{
    $sort = request('order') == $column && request('sort') == 'desc' ? 'asc' : 'desc';

    return request()->fullUrlWithQuery(['sort' => $sort, 'order' => $column]);
}

function numberToKh($str) {
    $arr = str_split($str);

    $kh_number = [
        "០", "១", "២", "៣", "៤",
        "៥", "៦", "៧", "៨", "៩"
    ];

    $result = '';
    foreach($arr as $item) {
        $result .= isset($kh_number[$item]) ? $kh_number[$item] : $item;
    }

    return $result;
}

function prefix_number_format($number, $prefix = null, $is_start = true, $decimal = 0, $dec_point = ".", $thousads_sep = ",")
{
    if($decimal < 0) {
        $number = substr($number, 0, $decimal);
        foreach(range(1, -$decimal) as $index) {
            $number .= 0;
        }

        $decimal = 0;
    }

    $return = number_format($number, $decimal, $dec_point, $thousads_sep);

    if($prefix) {
        if($is_start) {
            $return = $prefix . $return;
        } else {
            $return .= $prefix;
        }
    }

    return $return;
}

function dollar($number, $prefix = "$", $decimal = 2)
{
    return prefix_number_format($number, $prefix, true, $decimal);
}

function riel($number, $prefix = "៛", $decimal = -2)
{
    return prefix_number_format($number, $prefix, false, $decimal);
}

function filterNotificationWithPermission($param, $permissions)
{
    collect($param->list)->filter(function($item) use ($permissions) {
        switch ($item->key) {
            // Featuer Sale
            case'sale.status.actived':
                return checkPermission($permissions, 'notification-sale.status.actived');
                break;
            case'sale.status.postponed':
                return checkPermission($permissions, 'notification-sale.status.postponed');
                break;
            case'sale.status.inactived':
                return checkPermission($permissions, 'notification-sale.status.inactived');
                break;
            case'sale_note.created':
                return checkPermission($permissions, 'notification-sale-note.created');
                break;
            case'sale_document.created':
                return checkPermission($permissions, 'notification-sale-document.created');
                break;

            // Featuer Customer
            case'customer.created':
                return checkPermission($permissions, 'notification-customer-created');
                break;
            case'customer.status.actived':
                return checkPermission($permissions, 'notification-customer.status.actived');
                break;
            case'customer.status.postponed':
                return checkPermission($permissions, 'notification-customer.status.postponed');
                break;
            case'customer.status.inactived':
                return checkPermission($permissions, 'notification-customer.status.inactived');
                break;
            case'customer_note.created':
                return checkPermission($permissions, 'notification-customer-note.created');
                break;
            case'customer_document.created':
                return checkPermission($permissions, 'notification-customer-document.created');
                break;

            // Feature Order
            case'order.created':
                return checkPermission($permissions, 'notification-order-created');
                break;
            case'order.status.confirmed':
                return checkPermission($permissions, 'notification-order-status-confirmed');
                break;
            case'order.status.rejected':
                return checkPermission($permissions, 'notification-order-status-rejected');
                break;
            case'order_document.created':
                return checkPermission($permissions, 'notification-order-document-created');
                break;
            case'order_note.created':
                return checkPermission($permissions, 'notification-order-note-created');
                break;

            // Order Image
            case'order_image.created':
                return checkPermission($permissions, 'notification-order_image-created');
                break;

            default:
                return true;
        }
    });

    return $param;
}
