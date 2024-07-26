<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettingModel;
use App\Http\Controllers\TraitSettings;
use App\User;
use App\AssetsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\App; 
use Illuminate\Support\Facades\Log; 

class Settings extends Controller
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
	

	 //return settings
	 public function index() {
		return view( 'setting.index' );
    }
    
    /**
	 * get application settings
	 *
	 * @return object
	 */
	public function getdata() {
		$data = DB::table('settings')->where('id', '1')->first();
		if ($data) {
			$res['success'] = true;
			$res['data']  = $data;
			$res['logo'] = url('/').'/images/'.$data->logo;
			$res['message'] = 'success';	
			return response($res);
		}
  }
    

    /**
	 * update application settings to database
	 *
	 * @param string  $company
	 * @param string  $phone
	 * @param string  $city
	 * @param string  $website
	 * @param string  $address
	 * @param string  $currency
	 * @param string  $language
	 * @param string  $dateformat
	 * @return object
	 */
	public function update(Request $request){
        $company      = $request->input('company');
        $address      = $request->input('address');
		$email       = $request->input('email');
		$phonenumber = $request->input('phonenumber');
        $country    = $request->input('country');
        $logoname2  = $request->file('logo');
		$currency   = $request->input('currency');
		$language   = $request->input('language');
		$formatdate = $request->input('formatdate');
		

		$message = ['logo.mimes'=>trans('lang.type_image')];

		if ($request->hasFile('logo')) {
			$this->validate($request, [
				'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
				],$message);
			$logoname  = $request->file('logo')->getClientOriginalName();
			$request->file('logo')->move(public_path("/upload"), $logoname);
			$update = DB::table('settings')->where('id', '1')
			->update(
				[
				'company'       =>$company,
				'address'       =>$address,
				'email'         =>$email,
				'phonenumber'   =>$phonenumber,
				'country'   	=>$country,
                'currency'      =>$currency,
                'language'      =>$language,
				'formatdate'    =>$formatdate,
				'logo'          =>$logoname
				]
			);
		} else{

			$update = DB::table('settings')->where('id', '1')->update(
				[
                    'company'       =>$company,
                    'address'       =>$address,
                    'email'         =>$email,
                    'phonenumber'   =>$phonenumber,
                    'country'   	=>$country,
                    'currency'      =>$currency,
                    'language'      =>$language,
                    'formatdate'    =>$formatdate
				]
			);
		}

		if ( $update ) {
			$res['message'] = 'success';
			
        } else{
            $res['message'] = 'failed';
        }

        return response( $res );
	}

	public function logError(Request $request) {
		try {
				$level = $request->input('level');
				$message = $request->input('message');
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
}
