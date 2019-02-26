<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Service extends Model
{
    protected $table = 'service';
    public $timestamps = false;
    public static function get_list()
    {
        $data = self::selectRaw("service.*")
            ->where('status', STATUS_ACTIVE)
            ->get();
        return $data;
    }

    public static function get_detail($id)
    {
        $data = self::select('*')
            ->where('id', $id)
            ->where('status', STATUS_ACTIVE)
            ->first();
        return $data;
    }

    public static function insert_data($params = array())
    {
        DB::beginTransaction();

        try {
            $params['status'] = 1;
            $params['created_at'] = date('Y-m-d H:i:s');
            $params['created_by'] = auth()->user()->id;

            $save = DB::table('service')->insertGetId($params);


            DB::commit();
            return TRUE;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }

    }

}
