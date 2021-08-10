<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use mysql_xdevapi\Exception;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AgentController extends Controller
{
    //
    use HasApiTokens, HasFactory, Notifiable;

    public function register(Request $request){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Agent::create($input);
        $token['token'] = $user->createToken('tripagent')->accessToken;
        $token['user']=$user;
        return response()->json($token,200);
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $responseArray = [];
            $responseArray['token'] = $user->createToken('tripagent')->accessToken;
            $responseArray['agent_id'] = $user->agent_id;
            return response()->json($responseArray,200);
//            return 1;
        }else{
            return response()->json(['error'=>'Unauthenticated'],203);
        }
    }

    public function index(){
        $data =  Agent::all();
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ];
        return response()->json($responseArray,200);
    }

    public function loginD(Request $request){

        // Passport check function comes here
        if ($request->isMethod('post')) {
            // print_r($request->all());
            $validateData = Validator::make($request->all(),[
                    'email' => 'required|email|regex:/^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$/',
                    'password' => 'required'
            ]);
            
            if($validateData->fails()){
                $error = $validateData->errors();
                foreach ($error->all() as $message) {
                    $msg = $message;
                }
                return apiJsonReturn(array('status'=> 401, 'message'=> $msg));
            }else{
                if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>1])){
                    $user = Auth::user();
                    $responseArray = [];
                    $responseArray['token'] = $user->createToken('tripagent')->accessToken;
                    $responseArray['agent_id'] = $user->agent_id;
                    return response()->json($responseArray,200);
                }else{
                    $where['email'] = $request->email;
                    $where['password'] = $request->password;
                    $user = Agent::where($where)->first();

                    if($user != '') {
                        if($user->status != 1){
                            return apiJsonReturn(array('status'=> 401, 'message'=>'Account Deactivated'));
                        }
                    }else{
                        return apiJsonReturn(array('status'=> 403, 'message'=>'Invalid Username or Password'));
                    }
                }
            }
        }
        else{
            return apiJsonReturn(array('status'=> 405, 'message'=>'This API is POST Method'));
        }
    }


    public function getProfile(Request $request){
        
        // Passport check function comes here
        if ($request->isMethod('post')) {
            
        }
    }

}


// Creating a token without scopes...
