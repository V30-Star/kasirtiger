<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; // Tambahkan ini
use Illuminate\Support\Facades\Validator; // Tambahkan ini
use Illuminate\Support\Facades\DB; // Tambahkan ini
use Illuminate\Support\Facades\App; // Tambahkan ini
use Illuminate\Support\Facades\Log; // Tambahkan ini
use Yajra\DataTables\Facades\DataTables;

class User extends Controller
{
    use TraitSettings;

    public function __construct() {
        $data = $this->getapplications();

        // Pastikan $data adalah objek sebelum mengakses properti 'language'
        if (is_object($data) && property_exists($data, 'language')) {
            $lang = $data->language;
            App::setLocale($lang);
        } else {
            // Penanganan jika $data bukan objek atau tidak memiliki properti 'language'
            // Misalnya, set default locale atau tangani error sesuai kebutuhan aplikasi Anda
            App::setLocale('en'); // Contoh: set default ke bahasa Inggris
        }

        $this->middleware('auth');
        // User tidak bisa melakukan add, update, & delete data
		// $this->middleware('admin')->except(['index', 'getdata', 'getrows', 'byid']);
    }

    //return Branch
    public function index() {
        return view('user.index');
    }

    /**
     * get data from database
     * @return object
     */
    public function getdata(){
        $data = DB::table('users')->select(['users.*']);
        return Datatables::of($data)
        ->addColumn('status',function($single){
            $status = '';
            if($single->status=='1'){
                $status = '<label class="badge badge-success">'.trans('lang.active').'</label>';
            }
            if($single->status=='2'){
                $status = '<label class="badge badge-warning">'.trans('lang.inactive').'</label>';
            }
            return $status;
        })
        ->addColumn('role',function($single){
            $status = '';
            if($single->role=='1'){
                $status = trans('lang.admin');
            }
            if($single->role=='2'){
                $status = trans('lang.user');
            }
            return $status;
        })
        ->addColumn( 'action', function ( $accountsingle ) {
            return '<a href="#" id="btnedit" customdata='.$accountsingle->id.' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit"><i class="ti-pencil"></i> '. trans('lang.edit').'</a>
                    <a href="#" id="btndelete" customdata='.$accountsingle->id.' class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i> '. trans('lang.delete').'</a>';
        } )->rawColumns(['status','role', 'action'])
        ->make(true);
    }

    /**
     * get all  from database
     * @return object
     */
    public function getrows(){
        $data = DB::table('users')->get();
        if ($data) {
            $res['success'] = true;
            $res['message'] = $data;
        }
        return response($res);
    }

    /**
     * get single data 
     * @param integer $id
     * @return object
     */
    public function byid(Request $request) {
        $id = $request->input('id');

        $data = DB::table('users')->where('id', $id)->first();
        
        if ($data) {
            $res['success'] = 'success';
            $res['message'] = $data;
        } else{
            $res['success'] = 'failed';
        }
        return response($res);
    }

    /**
     * insert data  to database
     *
     * @param string  $fullname
     * @param string  $email
     * @param string  $password
     * @param string  $status
     * @param string  $city
     * @param string  $phone
     * @param string  $role
     * @return object
     */
    public function save(Request $request){
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $role = $request->input('role');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        
        $emailcheck = DB::table('users')
            ->where('email', '=', $email)
            ->first();
        
        if ($emailcheck) {
            $res['message'] = 'exist';  
        } 
        else {
            $data = array(
                'fullname' => $fullname, 
                'email' => $email,
                'password' => bcrypt($password),
                'status' => $status,
                'role' => $role,
                'city' => $city,
                'phone' => $phone,
                'created_at' => $created_at,
                'updated_at' => $updated_at
            );
            $insert = DB::table('users')->insert($data);
        
            if ($insert) {
                $res['message'] = 'success';
            } else{
                $res['message'] = 'failed';
            }
        }

        return response($res);
    }

    /**
     * update data  to database
     *
     * @param string  $fullname
     * @param string  $email
     * @param string  $password
     * @param string  $status
     * @param string  $city
     * @param string  $phone
     * @param string  $role
     * @return object
     */
    public function update(Request $request){
        $id = $request->input('id');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $password = $request->input('password');
        $status = $request->input('status');
        $city = $request->input('city');
        $phone = $request->input('phone');
        $role = $request->input('role');
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");

        $emailcheck = DB::table('users')
            ->where('email', '=', $email)
            ->where('id', '!=', $id)
            ->first();
    
        if ($emailcheck) {
            $res['message'] = 'exist';  
        } 
        else {
            if ($password !='') {
                $update = DB::table('users')->where('id', $id)
                    ->update([
                        'fullname' => $fullname,
                        'email' => $email,
                        'password' => bcrypt($password),
                        'status' => $status,
                        'city' => $city,
                        'phone' => $phone,
                        'role' => $role,
                        'updated_at' => $updated_at
                    ]);
                
                if ($update) {
                    $res['message'] = 'success';
                } else{
                    $res['message'] = 'failed';
                }
            } else {
                $update = DB::table('users')->where('id', $id)
                    ->update([
                        'fullname' => $fullname,
                        'email' => $email,
                        'status' => $status,
                        'city' => $city,
                        'phone' => $phone,
                        'role' => $role,
                        'updated_at' => $updated_at
                    ]);
                
                if ($update) {
                    $res['message'] = 'success';
                } else{
                    $res['message'] = 'failed';
                }
            }
        }
        return response($res);
    }

    /**
     * delete to database
     *
     * @param integer $id
     * @return object
     */
    public function delete(Request $request) {
        $id = $request->input('id');
        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete) {
            $res['success'] = 'success';
        } else{
            $res['success'] = 'failed';
        }
        return response($res);
    }

    public function logError(Request $request) {
        try {
            $level = 'info';
            $message = 'User Logout';
            $context = json_encode($request->input('context', []));
            $created_at = now();
    
            $data = [
                'lbs_level' => $level,
                'lbs_message' => $message,
                'lbs_context' => $context,
                'lbs_created_at' => $created_at
            ];
    
            $insert = DB::table('log_bias')->insert($data);
    
            if ($insert) {
                $res['success'] = 'success';
            } else {
                $res['success'] = 'failed';
            }
        } catch (\Exception $e) {
            Log::error('Log Error: ' . $e->getMessage());
            $res['success'] = 'failed';
            $res['error'] = $e->getMessage();
        }
    
        return response()->json($res);
    }

    public function logLogin(Request $request) {
        try {
            $level = 'info';
            $message = 'User Login';
            $context = json_encode(['user_id' => Auth::id(), 'ip_address' => $request->ip()]);
            $created_at = now();
    
            $data = [
                'lbs_level' => $level,
                'lbs_message' => $message,
                'lbs_context' => $context,
                'lbs_created_at' => $created_at
            ];
    
            $insert = DB::table('log_bias')->insert($data);
    
            if ($insert) {
                $res['success'] = 'success';
            } else {
                $res['success'] = 'failed';
            }
        } catch (\Exception $e) {
            Log::error('Log Error: ' . $e->getMessage());
            $res['success'] = 'failed';
            $res['error'] = $e->getMessage();
        }
    
        return response()->json($res);
    }
}
