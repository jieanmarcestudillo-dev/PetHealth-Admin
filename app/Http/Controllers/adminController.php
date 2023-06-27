<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use App\Models\adminModel;
use App\Models\completedModel;
use App\Models\pendingModel;
use App\Models\petModel;
use App\Models\usersModel;
use App\Models\appointmentModel;
use Auth;
use Session;
use Hash;
use PDF;

class adminController extends Controller
{
    use AuthenticatesUsers;

    // LOGIN AND LOGOUT
        // LOGIN ROUTES
            public function login(){
                return view('login');
            }
        // LOGIN ROUTES

        // LOGIN FUNCTION
            protected function credentials(Request $request){
                return [
                    'email' => request()->{$this->email()},
                    'password' => request()->password,
                ];
            }

            protected function email(){
                return 'email';
            }

            public function loginFunction(Request $request){
                if(auth()->guard('adminModel')->attempt($this->credentials($request))){
                    $request->session()->regenerate();
                    return response()->json(1);
                }else{
                    // dd(Hash::make('superAdmin2023'));
                    // WRONG CREDENTIALS
                    return response()->json(0);
                }
            }
        // LOGIN FUNCTION

        // LOGOUT FUNCTION
            public function logoutFunction(){
                Session::flush();
                Auth::logout();
                return response()->json(1);
            }
        // LOGOUT FUNCTION

    // LOGIN AND LOGOUT

    // ROUTING
        // MAIN ROUTING
            public function adminDashboardRoutes(){
                return view('dashboard');
            }
            public function adminClientRoutes(){
                return view('client');
            }
            public function adminReportRoutes(){
                return view('reports');
            }
            public function adminRequestRoutes(){
                return view('request');
            }
            public function adminPendingRoutes(){
                return view('pending');
            }
            public function adminManageAccount(){
                return view('account');
            }
        // MAIN ROUTING

        // SUB ROUTING
            // REPORTS PAGE
                public function vaccinationReports(){
                    return view('reports.vaccination');
                }
                public function dewormingReports(){
                    return view('reports.deworming');
                }
                public function heartWormReports(){
                    return view('reports.heartWorm');
                }
                public function groomingReports(){
                    return view('reports.grooming');
                }
                public function otherReports(){
                    return view('reports.otherReports');
                }
            // REPORTS PAGE

            // APPOINTMENT PAGE
                public function adminCancelAppointment(){
                    return view('appointment.cancel');
                }
                public function adminAcceptAppointment(){
                    return view('appointment.accept');
                }
                public function adminCompleteAppointment(){
                    return view('appointment.complete');
                }
            // APPOINTMENT PAGE

            // CLIENT PAGE
                public function adminOwnersPet(){
                    return view('client/pet');
                }
            // CLIENT PAGE
        // SUB ROUTING
    // ROUTING

    // ALL COMPLETED REPORTS FUNCTION
        public function getAllReports(Request $request){
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->select(
                'completed_tbl.completed_id',
                'completed_tbl.app_type',
                'completed_tbl.name_of_medicine',
                'completed_tbl.pet_weight',
                'completed_tbl.app_date',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL COMPLETED REPORTS FUNCTION

    // ALL VACCINATION COMPLETED REPORTS FUNCTION
        public function getAllVaccinationReportsFunction(Request $request){
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where([['completed_tbl.app_type', '=' , 'Vaccination']])
            ->select(
                'completed_tbl.completed_id',
                'completed_tbl.app_type',
                'completed_tbl.name_of_medicine',
                'completed_tbl.pet_weight',
                'completed_tbl.app_date',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL VACCINATION COMPLETED REPORTS FUNCTION

    // ALL DEWORMING COMPLETED REPORTS FUNCTION
        public function getAllDewormingReportsFunction(Request $request){
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where('completed_tbl.app_type', '=' , 'Deworming')
            ->select(
                'completed_tbl.completed_id',
                'completed_tbl.app_type',
                'completed_tbl.name_of_medicine',
                'completed_tbl.pet_weight',
                'completed_tbl.app_date',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL DEWORMING COMPLETED REPORTS FUNCTION

    // ALL HEARTWORM PREVENTION COMPLETED REPORTS FUNCTION
        public function getAllHeartWormReportsFunction(Request $request){
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where('completed_tbl.app_type', '=' , 'Heartworm Prevention')
            ->select(
                'completed_tbl.completed_id',
                'completed_tbl.app_type',
                'completed_tbl.name_of_medicine',
                'completed_tbl.pet_weight',
                'completed_tbl.app_date',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL HEARTWORM PREVENTION COMPLETED REPORTS FUNCTION

    // ALL GROOMING COMPLETED REPORTS FUNCTION
        public function getAllGroomingReportsFunction(Request $request){
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where('completed_tbl.app_type', '=' , 'Grooming')
            ->select(
                'completed_tbl.completed_id',
                'completed_tbl.app_type',
                'completed_tbl.name_of_medicine',
                'completed_tbl.pet_weight',
                'completed_tbl.app_date',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL GROOMING COMPLETED REPORTS FUNCTION

    // ALL OTHERS COMPLETED REPORTS FUNCTION
        public function getAllOtherReportsFunction(Request $request){
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where('completed_tbl.app_type', '=' , 'other')
            ->select(
                'completed_tbl.completed_id',
                'completed_tbl.app_type',
                'completed_tbl.name_of_medicine',
                'completed_tbl.pet_weight',
                'completed_tbl.app_date',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL OTHERS COMPLETED REPORTS FUNCTION

    // ALL CLIENTS FUNCTION
        public function getAllClientFunction(Request $request){
            $data = usersModel::all();
            return response()->json($data);
        }
    // ALL CLIENTS FUNCTION

    // ALL PETS FUNCTION
        public function getAllPetFunction(Request $request){
            $data = petModel::join('users', 'pet_tbl.user_id', '=', 'users.user_id')
            ->select(
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_id',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
                'pet_tbl.pet_cm',
                'pet_tbl.birthdate',
                'pet_tbl.gender',
                'pet_tbl.species',
            )
            ->get();
            return response()->json($data);
        }
    // ALL PETS FUNCTION

    // ALL PENDING APPOINTMENT FUNCTION
        public function allPendingAppointmentFunction(Request $request){
            $data = appointmentModel::join('users', 'appointment_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'appointment_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where([['appointment_tbl.status', '=' , 'Pending']])
            ->select(
                'appointment_tbl.app_id',
                'appointment_tbl.app_type',
                'appointment_tbl.app_date',
                'appointment_tbl.app_time',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL PENDING APPOINTMENT FUNCTION

    // ALL CANCEL APPOINTMENT FUNCTION
        public function allCancelAppointmentFunction(Request $request){
            $data = appointmentModel::join('users', 'appointment_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'appointment_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where([['appointment_tbl.status', '=' , 'Cancel']])
            ->select(
                'appointment_tbl.app_id',
                'appointment_tbl.app_type',
                'appointment_tbl.app_date',
                'appointment_tbl.app_time',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL CANCEL APPOINTMENT FUNCTION

    // ALL ACCEPT APPOINTMENT FUNCTION
        public function allAcceptAppointmentFunction(Request $request){
            $data = appointmentModel::join('users', 'appointment_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'appointment_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where([['appointment_tbl.status', '=' , 'Confirm']])
            ->select(
                'appointment_tbl.app_id',
                'appointment_tbl.app_type',
                'appointment_tbl.app_date',
                'appointment_tbl.app_time',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL ACCEPT APPOINTMENT FUNCTION

    // ALL COMPLETE APPOINTMENT FUNCTION
        public function allCompleteAppointmentFunction(Request $request){
            $data = appointmentModel::join('users', 'appointment_tbl.user_id', '=', 'users.user_id')
            ->join('pet_tbl', 'appointment_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->where([['appointment_tbl.status', '=' , 'Complete']])
            ->select(
                'appointment_tbl.app_id',
                'appointment_tbl.app_type',
                'appointment_tbl.app_date',
                'appointment_tbl.app_time',
                'users.user_fname',
                'users.user_lname',
                'pet_tbl.pet_name',
                'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();
            return response()->json($data);
        }
    // ALL COMPLETE APPOINTMENT FUNCTION

    // TOTAL COMPLETED APPOINTMENT
        public function totalCompletedAppointment(Request $request){
            $data = completedModel::all();
            $countData = $data->count();
            return response()->json($countData != '' ? $countData : '0');
        }
    // TOTAL COMPLETED APPOINTMENT

    // TOTAL CLIENT
        public function totalClientRegistered(Request $request){
            $data = usersModel::all();
            $countData = $data->count();
            return response()->json($countData != '' ? $countData : '0');
        }
    // TOTAL CLIENT

    // TOTAL PENDING APPOINTMENT
        public function totalPendingAppointment(Request $request){
            $data = appointmentModel::where('status','=','Pending')->get();
            $countData = $data->count();
            return response()->json($countData != '' ? $countData : '0');
        }
    // TOTAL PENDING APPOINTMENT

    // TOTAL ACCEPT APPOINTMENT
        public function totalAcceptAppointment(Request $request){
            $data = appointmentModel::where('status','=','Accept')->get();
            $countData = $data->count();
            return response()->json($countData != '' ? $countData : '0');
        }
    // TOTAL ACCEPT APPOINTMENT

    // VISUALIZATION
        public function visualization(Request $request)
        {
            $distinctMonths = completedModel::selectRaw('DATE_FORMAT(app_date, "%M") as monthName')
            ->whereRaw('MONTH(app_date) BETWEEN 1 AND 12')
            ->groupBy('monthName')
            ->orderByRaw('MONTH(app_date)')
            ->get();

        $months = $distinctMonths->pluck('monthName')->toArray();

        // Ensure January is the first month
        $januaryIndex = array_search('January', $months);
        if ($januaryIndex !== false) {
            $months = array_merge(array_slice($months, $januaryIndex), array_slice($months, 0, $januaryIndex));
        }

        $data = completedModel::selectRaw('DATE_FORMAT(app_date, "%M") as monthName, COUNT(*) as totalAppointment')
            ->groupBy('monthName')
            ->orderByRaw('MONTH(app_date)')
            ->get();

        $appointment = [];
        foreach ($data as $monthData) {
            $appointment[$monthData->monthName] = $monthData->totalAppointment;
        }

        foreach ($months as $month) {
            if (!isset($appointment[$month])) {
                $appointment[$month] = 0;
            }
        }

        $formattedAppointment = [];
        foreach ($months as $month) {
            $formattedAppointment[] = $appointment[$month];
        }

        return response()->json([
            'months' => $months,
            'operations' => $formattedAppointment
        ]);
        }
    // VISUALIZATION

    // PIE SERVICE
        public function mostCommonType(Request $request){
            $data = completedModel::
            select('app_type', \DB::raw('COUNT(*) as count'))
            ->groupBy('app_type')
            ->get();

            $type = $data->pluck('app_type');
            $count = $data->pluck('count');

            $response = [
                'type' => $type,
                'count' => $count
            ];

            return response()->json($response);
        }
    // PIE SERVICE

    // PIE BREED
        public function mostCommonTypeBreed(Request $request){
            $data = petModel::
            select('pet_breed', \DB::raw('COUNT(*) as count'))
            ->groupBy('pet_breed')
            ->get();

            $type = $data->pluck('pet_breed');
            $count = $data->pluck('count');

            $response = [
                'type' => $type,
                'count' => $count
            ];

            return response()->json($response);
        }
    // PIE BREED

    // ACCEPT APPOINTMENT
        public function acceptAppointment(Request $request){
            $acceptAppointment = appointmentModel::find($request->appointmentId)->update(['status' => 'Confirm']);
            return response()->json($acceptAppointment ? 1 : 0);
        }
    // ACCEPT APPOINTMENT

    // CANCEL APPOINTMENT
        public function cancelAppointment(Request $request){
            $cancelAppointment = appointmentModel::find($request->appointmentId)->update(['status' => 'Cancel']);
            return response()->json($cancelAppointment ? 1 : 0);
        }
    // CANCEL APPOINTMENT

    // PRINT DAILY REPORTS
        public function printDailyReports(Request $request){
            date_default_timezone_set('Asia/Manila');
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
            ->where('completed_tbl.app_date', '=', Carbon::now()->format('Y-m-d'))
            ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
            ->select(
                'completed_tbl.completed_id', 'completed_tbl.app_type', 'completed_tbl.name_of_medicine', 'completed_tbl.pet_weight',
                'completed_tbl.app_date', 'users.user_fname', 'users.user_lname', 'pet_tbl.pet_name', 'pet_tbl.pet_breed',
            )
            ->orderBy('app_date', 'DESC')
            ->get();

        $dailyReports = [
            'startDate' => Carbon::now()->format('F d, Y'),
            'data' => [],
        ];

        foreach ($data as $certainData) {
            $dailyReports['data'][] = $certainData;
        }

        $pdf = PDF::loadView('pdf.dailyReports', $dailyReports);
        return $pdf->stream('Daily Reports.pdf');

        }
    // PRINT DAILY REPORTS

    // PRINT WEEKLY REPORTS
        public function printWeeklyReports(Request $request){
            date_default_timezone_set('Asia/Manila');
            $startDate = Carbon::now()->subDays(7)->format('Y-m-d');
            $endDate = Carbon::now()->format('Y-m-d');
            $data = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
                ->whereBetween('completed_tbl.app_date', [$startDate, $endDate])
                ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
                ->select(
                    'completed_tbl.completed_id', 'completed_tbl.app_type', 'completed_tbl.name_of_medicine', 'completed_tbl.pet_weight',
                    'completed_tbl.app_date', 'users.user_fname', 'users.user_lname', 'pet_tbl.pet_name', 'pet_tbl.pet_breed',
                )
                ->orderBy('app_date', 'DESC')
                ->get();

            $weeklyReports = [
                'startDate' => Carbon::now()->subDays(7)->format('F d, Y'),
                'endDate' => Carbon::now()->format('F d, Y'),
                'data' => [],
            ];

            foreach ($data as $certainData) {
                $weeklyReports['data'][] = $certainData;
            }

            $pdf = PDF::loadView('pdf.weeklyReports', $weeklyReports);
            return $pdf->stream('Daily Reports.pdf');
        }
    // PRINT WEEKLY REPORTS

    // PRINT MONTHLY REPORTS
        public function printMonthlyReports(Request $request){
            $year = $request->year;
            $month = $request->month;

            $data = completedModel::select('app_date')->get();
            $data = $data->filter(function ($item) use ($year, $month) {
                return date('Y', strtotime($item->app_date)) == $year && date('F', strtotime($item->app_date)) == $month;
            });

            $data2 = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
                ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
                ->whereIn('completed_tbl.app_date', $data->pluck('app_date'))
                ->select(
                    'completed_tbl.completed_id', 'completed_tbl.app_type', 'completed_tbl.name_of_medicine', 'completed_tbl.pet_weight',
                    'completed_tbl.app_date', 'users.user_fname', 'users.user_lname', 'pet_tbl.pet_name', 'pet_tbl.pet_breed'
                )
                ->orderBy('app_date', 'DESC')
                ->get();

            $data2 = $data2->map(function ($item, $index) {
                $item->row_number = $index + 1;
                return $item;
            });

            $monthlyReports = [
                'data' => $data2,
                'year' => $year,
                'month' => $month,
            ];

            $pdf = PDF::loadView('pdf.monthlyReports', $monthlyReports);
            return $pdf->stream('Monthly Reports.pdf');

        }
    // PRINT MONTHLY REPORTS

    // PRINT YEARLY REPORTS
        public function printYearlyReports(Request $request){
            $year = $request->year;
            $month = $request->month;

            $data = completedModel::select('app_date')->get();
            $data = $data->filter(function ($item) use ($year, $month) {
                return date('Y', strtotime($item->app_date)) == $year;
            });

            $data2 = completedModel::join('users', 'completed_tbl.user_id', '=', 'users.user_id')
                ->join('pet_tbl', 'completed_tbl.pet_id', '=', 'pet_tbl.pet_id')
                ->whereIn('completed_tbl.app_date', $data->pluck('app_date'))
                ->select(
                    'completed_tbl.completed_id', 'completed_tbl.app_type', 'completed_tbl.name_of_medicine', 'completed_tbl.pet_weight',
                    'completed_tbl.app_date', 'users.user_fname', 'users.user_lname', 'pet_tbl.pet_name', 'pet_tbl.pet_breed'
                )
                ->orderBy('app_date', 'DESC')
                ->get();

            $data2 = $data2->map(function ($item, $index) {
                $item->row_number = $index + 1;
                return $item;
            });

            $monthlyReports = [
                'data' => $data2,
                'year' => $year,
                'month' => $month,
            ];

            $pdf = PDF::loadView('pdf.yearlyReports', $monthlyReports);
            return $pdf->stream('Yearly Reports.pdf');

        }
    // PRINT YEARLY REPORTS

    // COMPLETE APPOINTMENT FUNCTION
        public function submitCompletionAppFunction(Request $request){
         $getPet = appointmentModel::where('app_id', '=', $request->appointmentId)
         ->select('user_id','pet_id','app_type','app_date')->first();
         if($request->typeOfNextAppointment != ''){
             $completeAppointment = completedModel::create([
                 'user_id' => $getPet->user_id,
                 'pet_id' => $getPet->pet_id,
                 'app_type' => $getPet->app_type,
                 'name_of_medicine' => $request->nameOfMeds,
                 'pet_weight' => $request->petWeight,
                 'app_date' => $getPet->app_date,
                 'updated_at' => now(),
                 'created_at' => now(),
             ]);
             if($completeAppointment){
                 $createAppointment = appointmentModel::create([
                     'user_id' => $getPet->user_id,
                     'pet_id' => $getPet->pet_id,
                     'app_type' => $request->typeOfNextAppointment,
                     'status' => 'Pending',
                     'app_date' => $request->dateOfNextAppointment,
                     'created_at' => now(),
                     'app_time' => $request->timeOfNextAppointment,
                     'updated_at' => now(),
                 ]);
                 $updateStatus = appointmentModel::where([['app_id', '=', $request->appointmentId]])->update(['status' => 'Completed']);
                 return response()->json($updateStatus ? 1 : 0);
             }
         }
        //  else{
        //      $completeAppointment = completedModel::create([
        //          'user_id' => $getPet->user_id,
        //          'pet_id' => $getPet->pet_id,
        //          'app_type' => $getPet->app_type,
        //          'name_of_medicine' => $request->nameOfMeds,
        //          'pet_weight' => $request->petWeight,
        //          'app_date' => $getPet->app_date,
        //          'updated_at' => now(),
        //          'created_at' => now(),
        //      ]);
        //      return response()->json($completeAppointment ? 1 : 0);
        //  }
        }
    // COMPLETE APPOINTMENT FUNCTION

    // VIEW CLIENT DETAILS
        public function viewClient(Request $request){
            $data = usersModel::join('pet_tbl', 'pet_tbl.user_id', '=', 'users.user_id')
            ->where('users.user_id', '=' , $request->clientId)->first();
            return response()->json($data);
        }
    // VIEW CLIENT DETAILS
}
