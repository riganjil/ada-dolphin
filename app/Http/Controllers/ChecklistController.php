<?php

namespace App\Http\Controllers;

class ChecklistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function complete_post()
    {
        $data = array (
            'data' =>
                array (
                    0 =>
                        array (
                            'id' => 1,
                            'item_id' => 1,
                            'is_completed' => true,
                            'checklist_id' => 1,
                        ),
                    1 =>
                        array (
                            'id' => 2,
                            'item_id' => 2,
                            'is_completed' => true,
                            'checklist_id' => 1,
                        ),
                    2 =>
                        array (
                            'id' => 3,
                            'item_id' => 3,
                            'is_completed' => true,
                            'checklist_id' => 1,
                        ),
                    3 =>
                        array (
                            'id' => 4,
                            'item_id' => 4,
                            'is_completed' => true,
                            'checklist_id' => 1,
                        ),
                ),
        );
        return response()->json($data);
    }

    public function incomplete_post()
    {
        $data = array (
            'data' =>
                array (
                    0 =>
                        array (
                            'id' => 1,
                            'item_id' => 1,
                            'is_completed' => false,
                            'checklist_id' => 1,
                        ),
                    1 =>
                        array (
                            'id' => 2,
                            'item_id' => 2,
                            'is_completed' => false,
                            'checklist_id' => 1,
                        ),
                    2 =>
                        array (
                            'id' => 3,
                            'item_id' => 3,
                            'is_completed' => false,
                            'checklist_id' => 1,
                        ),
                    3 =>
                        array (
                            'id' => 4,
                            'item_id' => 4,
                            'is_completed' => false,
                            'checklist_id' => 1,
                        ),
                ),
        );

        return response()->json($data);
    }
}
