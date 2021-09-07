<?php 
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
        $output .= '<li class="breadcrumb-item"><a href="'.route('home').'">Home</a></li>';

        if($action) {
            $output .= '<li class="breadcrumb-item"><a href="'. route(str_replace(' ', '-', strtolower($child))) .'">'. ucwords($child) .'</a></li>';
            $output .= '<li class="breadcrumb-item active">'. ucwords($action) .'</li>';
        } else {
            $output .= '<li class="breadcrumb-item  active">'. ucwords($child) .'</li>';
        }

        $output .= '</ol>';
        $output .= '</div>';
    } else {
        $output .= '</div>';
        $output .= '</div>';
    }
    return $output;
}