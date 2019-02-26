<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $current_data = array();
    protected $partial_errors = array();
    protected $results_total = NULL;
    protected $results = array();
    protected $project,
        $project_id,
        $project_token,
        $token,
        $now,
        $now_date,
        $msg = '';

    protected function show_results()
    {
        $return_value = array(
            'status'            => TRUE,
            'status_code'       => 200,
            'message'           => $this->msg,
            'data'              => $this->results
        );

        return response()->json($return_value, 200);
    }

    protected function force_errors($errors = '', $code = '')
    {
        $errors = trim($errors);
        $code = $code != '' ? $code : 400;

        if (!empty($errors)){
            $err = array(
                'status' => FALSE,
                'status_code' => $code,
                'message' => $errors,
            );
            return response()->json($err, $code);
        }else{
            $err = array(
                'status'    => FALSE,
                'status_code' => $code,
                'message'     => 'Unknown errors.',
            );
            return response()->json($err, $code);
        }
    }
}
