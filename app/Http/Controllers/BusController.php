<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserPlans;

class BusController extends Controller
{
    public $daysWeek = ['L','Ma', 'Mi', 'J', 'V', 'S', 'D'];

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPlans = DB::table('user_plans')->get();
        $reserved = [];
        foreach ($userPlans as $userPlan) {
            $user = DB::table('users')->where('id', $userPlan->user_id)->first();
            $fullName = $user->first_name . ' ' . $user->last_name;
            $reserved = DB::table('reservations')->where('user_plan_id', $userPlan->id)->pluck('reservation_start');
            $arrayReserved[$fullName] = $this->getSortArrayReserved($reserved);
        }
        
        return view('buses', ['arrayReserved' => $arrayReserved]);
    }

    public function getSortArrayReserved($arrayReserved)
    {
            foreach($arrayReserved as $reserved) {
                $days[] =  date('N', strtotime($reserved)) -1;
            }

            return $this->translateDay($days);
    }

    public function translateDay($day)
    {
        foreach($this->daysWeek as $number => $letter) {
            $sortDays[$letter] = in_array($number, $day) ? 1 : 0;
        }

        return $sortDays;
    }
}
