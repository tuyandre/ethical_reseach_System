<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DevicesExport;
use App\Http\Controllers\Controller;
use App\Imports\DevicesImport;
use App\Models\Device;
use App\Models\DeviceTracking;
use App\Models\User;
use App\Notifications\Device\ReleaseNotification;
//use Illuminate\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;
use Notification;
use App\Notifications\Device\AssigningNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.devices.deviceList');
    }

    public function getDeviceList()
    {
        $devices = Device::with(['User'])->get();

        return response()->json(['devices' => $devices], 200);
    }


    public function availableDevice(){
        return view('backend.devices.availableDevices');
    }

    public function getAvailableDevices(){
        $device=Device::where('status','=',1)->get();

        return response()->json(['devices' => $device], 200);
    }
    public function unavailableDevice(){
        return view('backend.devices.assignedDevices');
    }

    public function getUnavailableDevices(){
        $device=Device::with(['User'])->where('status','=',0)->get();

        return response()->json(['devices' => $device], 200);
    }
    public function historical(){
        return view('backend.devices.historicals');
    }
    public function getHistorical(){
        $histo=DeviceTracking::with(['Device','User'])
            ->orderBy('id','DESC')
            ->get();
        return response()->json(['devices' => $histo], 200);
    }

    public function deviceDetail($id){

        $info=Device::find($id);
        $histo=DeviceTracking::with(['User','Device'])->where('device_id','=',$id)
            ->orderBy('id','DESC')
            ->get();

//        return view('backend.devices.deviceDetail',['info'=>$info]);
        return view('backend.devices.deviceDetail',['info'=>$info,'historicals'=>$histo]);
    }
    public function showDevice($id){

        $dev=Device::find($id);
        return response()->json(['device' => $dev], 201);
    }





    public function saveDevices(Request $request){
        $this->validate($request, [
            'device_serialNo' => 'required|unique:devices'],
            [
                'device_serialNo.required' => ' The Name field is required.',
                'device_serialNo.unique' => ' The  Name must unique ,Find other Name.',
            ]);

        $device=new Device();
        $device->device_name=$request->input('device_name');
        $device->device_brand=$request->input('device_brand');
        $device->device_model=$request->input('device_model');
        $device->device_serialNo=$request->input('device_serialNo');
        $device->device_imei1=$request->input('imei1');
        $device->device_imei2=$request->input('imei2');
        $device->save();
        return response()->json(['device' => "ok"], 201);

    }

    public function updateDevices(Request $request){
        $device=Device::find($request['device_id']);
        if ($device){
            $device->device_name=$request->input('device_name');
            $device->device_brand=$request->input('device_brand');
            $device->device_model=$request->input('device_model');
            $device->device_serialNo=$request->input('device_serialNo');
            $device->device_imei1=$request->input('imei1');
            $device->device_imei2=$request->input('imei2');
            $device->save();
            return response()->json(['device' => "ok"], 201);
        }else{
            return response()->json(['device' => "not"], 500);
        }
    }
    public function assignDevices(Request $request){
        $device=Device::find($request['device_name']);
        if ($device){
            $device->user_id=$request['member'];
            $device->status=0;
            $device->received_date=Carbon::now();
            $device->save();

            $trace=new DeviceTracking();
            $trace->user_id=$request['member'];
            $trace->device_id=$request['device_name'];
            $trace->received_date=Carbon::now();
            $trace->status=0;
            $trace->save();

            $data=User::find($request['member']);
            $assignData = [
                'name' => 'ASSIGN DEVICE',
                'body' => 'You have assigned a new Device Now on Date :'.Carbon::now().'The detail for Device are: Device Name: '.$device->device_name.'; Device Serial Number:'.$device->device_serialNo,
                'thanks' => 'Thank you',
                'member' => $data->full_name,
                'assign_id' => $request['member']
            ];

            Notification::send($data, new AssigningNotification($assignData));

            return response()->json(['device' => "ok"], 201);
        }
    }

    public function releaseDevice($id){
        $device=Device::find($id);
        if ($device){
            $user_id=$device->user_id;
            $device->status=1;
            $device->user_id=null;
            $device->received_date=null;
            $device->save();

            $trace=DeviceTracking::where('device_id','=',$id)
                ->where('status',0)
                ->orderBy('id', 'DESC')
                ->first();
            if ($trace){
                $trace->returned_date=Carbon::now();
                $trace->status=1;
                $trace->save();

                $data=User::find($user_id);
                $releaseData = [
                    'name' => 'RELEASE DEVICE',
                    'body' => 'You have Released a Assigned Device Now on Date :'.Carbon::now().'The detail for Device are:\n Device Name: '.$device->device_name.';\n Device Serial Number:'.$device->device_serialNo,
                    'thanks' => 'Thank you',
                    'member' => $data->full_name,
                    'assign_id' =>$user_id
                ];

                Notification::send($data, new ReleaseNotification($releaseData));
                return response()->json(['device' => "ok"], 201);
            }
        }
    }

    public function fileImport(Request $request)
    {
        Excel::import(new DevicesImport, $request->file('file_upload')->store('temp'));
        return back();
    }
    public function fileExport()
    {
        return Excel::download(new DevicesExport, 'devices-collection.xlsx');
    }
}
