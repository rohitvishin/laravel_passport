<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\GeneralSetting;
use App\Models\Agent;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]); 

        $check = Admin::where([
            ['username', '=' ,$request->username],
            ['password', '=' ,$request->password]
        ])->first();
            //print_r($check->username);die;
        if ($check) {
            $request->session()->put('LoggedUser', $check->username);
            return redirect('admin/dashboard');
        }else{
            return back()->with('fail','Incorrect password');
            }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('admin');
        }
    }

    public function AgentRegister()
    {
         return view('agent/agentregistration');
    }

    public function saveAgent(Request $request)
    {
        $request->validate([
            'mobileno' => 'required',
            'email' =>  'required',
            'password' => 'required'
        ]);

        $Save = new Agent;
        $Save->agent_id="FAFAFDA";
        $Save->mobile=$request->get('mobileno');
        $Save->email=$request->get('email');
        $Save->password=$request->get('password');
        $Save->status=1;
        $result = $Save->save();
        if ($result) {
            return redirect('admin/AgentList');
        }else{
            return back()->with('fail','Something Went wrong !');
            }
    }

    public function AgentList()
    {
        $result =  Agent::all();
        return view('agent/agentlist',['featch'=>$result]);
    }

    public function EditAgent($id)
    {
        $result = Agent::find($id);
        return view('agent/agentupdate',['featchbyrow'=>$result]);
    }

    public function updateAgent(Request $request,$id)
    {
        $update = Agent::find($id);
        $update->agent_id="FAFAFDA";
        $update->mobile=$request->get('mobileno');
        $update->email=$request->get('email');
        $update->status=$request->get('status');
        $result = $update->save(); 
        if ($result) {
            return redirect('admin/AgentList');
        }
    }

    public function DeleteAgent($id)
    {
        $Delete = Agent::find($id);
        $result = $Delete->delete();
        if ($result) {
            return redirect('admin/AgentList');
        }
    }

    public function login()
    {
        return view('auth/login');
    }

    public function getGeneralSettings()
    {
        $data['settings'] = GeneralSetting::all();
        $data['title'] = 'Settings List';
        return view('settings/list',$data);
    }

}
