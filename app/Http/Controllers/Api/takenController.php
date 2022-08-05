<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class takenController extends Controller
{
    /**
     * @param Request $request
     * @param null $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkIfTheEmailIsTaken(Request $request, $email = null)
    {

        /*$admin = Admin::where('email', '!=', $email)
            ->whereEmail($request->email)->first();

        $employer = Employee::where('email', '!=', $email)
            ->whereEmail($request->email)->first();

        if ($admin || $employer) {
            return response()->json(false);
        }
        */

        $exists = DB::select("SELECT EXISTS(SELECT email from admins 
            where email = '{$request->email}'
            UNION all
            SELECT email from employees 
            where email = '{$request->email}'
            ) as email");

        return response()->json($exists[0]->email == 0);
    }

}
