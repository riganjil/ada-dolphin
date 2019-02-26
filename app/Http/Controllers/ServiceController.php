<?php

namespace App\Http\Controllers;

use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Service::get_list();

        if ($data){
            $this->results = $data;
            return $this->show_results();
        }else{
            $this->results = $data;
            return $this->force_errors();
        }
    }
}
