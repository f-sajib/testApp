<?php

use App\Providers\AppServiceProvider;
use Carbon\Carbon;


if(!function_exists('res')) {
    function res($data, $key = null, $statusCode = 200) {
        if($key) {
            $data = [$key => $data];
        }
        return response()->json($data,$statusCode);
    }
}


if(!function_exists('not_found_response')) {
    function not_found_response($message = 'Sorry,could not find what your are looking for.') {
        if(!is_array($message)) {
            $message = [
                'success' => false,
                'message' => $message
            ];
        }
        return response()->json($message,404);
    }
}


if(!function_exists('success_response')) {
    function success_response($message = 'Request successful.',$statusCode = 201) {
        $data = [
            'success' => true,
            'message' => $message
        ];
        return response()->json($data,$statusCode);
    }
}
if(!function_exists('error_response')) {
    function error_response($message = 'Sorry something went wrong.',$statusCode = 406) {
        $data = [
            'success' => false,
            'message' => $message
        ];
        return response()->json($data,$statusCode);
    }
}

if(!function_exists('service_unavailable_response')) {
    function service_unavailable_response($message = 'Service is unavailable.', $statusCode = 406) {
        if(!is_array($message)) {
            $message = [
                'success' => false,
                'message' => $message
            ];
        }
        return response()->json($message,$statusCode);
    }
}


if(!function_exists('auth_user')) {
    function auth_user() {
        return auth()->user();
    }
}

if(!function_exists('auth_admin')) {
    function auth_admin() {
        return auth('web')->user();
    }
}



if(!function_exists('auth_check')) {
    function auth_check() {
        return auth_user() !== null;
    }
}


if(!function_exists('_parse_string')) {
    function _parse_string($string,...$params) {
        return sprintf($string,...$params);
    }
}


if(! function_exists('is_valid_org_username')) {
    function is_valid_org_username($value, $min = 4, $max = 20) {
//        $pattern = '/^(?=.{2})[a-z0-9]{4, 20}(?:-[a-z0-9]+)*$/';
//        return preg_match("/^(?=[a-zA-Z0-9_]{{$this->minLength},{$this->maxLength}}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $value);
//        return preg_match("/^(?=[a-z0-9_]{{$this->minLength},{$this->maxLength}}$)(?!.*[_.]{2})[^_.].*[^_.]$/", $value);
        $pattern = "/^(?=[a-z0-9-]{{$min},{$max}}$)(?!.*[-.]{2})[^-.].*[^-.]$/";
        return preg_match($pattern, $value);
    }
}

if(! function_exists('random_next_n_days')) {
    function random_next_n_days($days, $date, $format = 'd/m') {
        $m = date('m', strtotime($date));
        $de = date('d', strtotime($date));
        $y = date('Y', strtotime($date));
        $dateArray = [];
        for ($i = 0; $i <= $days - 1; $i++) {
            $dateArray[] = '' . date($format, mktime(0, 0, 0, $m, ($de + $i), $y)) . '';
        }

        return $dateArray;
    }
}

