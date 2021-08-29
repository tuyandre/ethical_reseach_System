<?php

namespace App\Http\Controllers\Admin;

use AidynMakhataev\LaravelSurveyJs\app\Models\Survey;
use App\Http\Controllers\Controller;
use App\Models\AssignedSurvey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.survey.survey_list');
    }
    public function getSurveyList(){
        $survey=Survey::all();
        return response()->json(['survey' => $survey], 200);
    }
    public function surveyDetail($slug){
        $survey=Survey::where('slug','=',$slug)->first();
        $assigned=AssignedSurvey::with(['User','Survey'])->where('survey_id',$survey->id)->get();
        return view('backend.survey.survey_detail',['survey'=>$survey,'users'=>$assigned])->with('survey',$survey);
    }
    public function assignSurvey(){
        return view('backend.survey.survey_assign');
    }
    public function getMemberSurvey(){
        $member=User::whereHas(
            'roles', function($q){
            $q->where('name', 'supervisor');
        }
        )->get();
//        $member=User::all();
        return response()->json(['members' => $member], 200);
    }

    public function sendSurvey(Request $request){

        $users=$request['users'];
        foreach ($users as $user_id) {
            $this->validate($request, [
                'survey_id' => [

                    'required',

                    Rule::unique('assigned_surveys')->where(function ($query) use ($request,$user_id) {

                        return $query
                            ->whereUserId($request->survey_id)
                            ->whereSurveyId($user_id);
                    }),
                ],
            ],

                [
                    'survey_id.unique' => __('validation.survey.error.unique', [

                        'survey'              => $request->survey_id,
                        'user'        => $user_id
                    ]),
                ]);
        }

//        return response()->json(['survey' =>'ok','data'=>$request->all()], 200);




        foreach ($users as $id){
            $check=AssignedSurvey::where('user_id',$id)->where('survey_id',$request['survey_id'])->first();
            if (!$check){
                $survey=new AssignedSurvey();
                $survey->user_id=$id;
                $survey->survey_id=$request['survey_id'];
                $survey->email=$request['email'];
                $survey->sms=$request['sms'];
                $survey->save();
            }

        }
        return response()->json(['survey' =>'ok','data'=>$users], 200);








        if ($request->sms=="on"){
            $data = array(
                "sender"=>'Intouch',
                "recipients"=>"0722404528",
                "message"=>"hello world",);
            $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
            $data = http_build_query($data);
            $username="tuyandre20";
            $password="kamana1234567";
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
            $result = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

        }



        return response()->json(['result' => $result,'httpcode'=>$httpcode], 200);

    }

}
