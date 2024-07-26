<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\TraitSettings;
use App\User;
use App\AssetsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\App; 
use Illuminate\Support\Facades\Log; 

class Home extends Controller
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
    }

	//return view
    public function index() {
		return view( 'home.index' );
    }


	/**
	 * Show total balance.
	 *
	 * @return object
	 */
	public function totalbalance() {

		$totalstorage   = DB::table('storage')
		->select(DB::raw('count(*) as totalstorage'))
		->first();

		$data['totalstorage'] 		= $totalstorage->totalstorage;

		return response($data);
	}

  //   /**
	//  * get data recent component from database
	//  * @return object
	//  */
  //   public function recentcomponentactivity(){
  //       $data = DB::table('component_assets')
  //       ->select('component_assets.*', 'component.name as component','assets.name as asset', 'asset_type.name as type', 'location.name as location')
  //       ->leftJoin('assets', 'assets.id', '=', 'component_assets.assetid')
  //       ->leftJoin('asset_type', 'assets.typeid', '=', 'asset_type.id')
  //       ->leftJoin('location', 'location.id', '=', 'assets.locationid')
  //       ->leftJoin('component', 'component.id', '=', 'component_assets.componentid')
  //       ->offset(0)->limit(10)
	// 	->orderBy('component_assets.updated_at', 'desc')
	// 	->orderBy('component_assets.created_at', 'desc')
	// 	->get();

  //       return Datatables::of($data)
        
  //       ->addColumn( 'status', function ( $accountsingle ) {
           

  //           if($accountsingle->status==2){
                    
  //                   $status = '<span class="badge badge-data text-white background-blue">'.trans('lang.checkin').'</span>';
                
  //           }else{
  //                   $status = '<span class="badge badge-data text-white background-yellow">'.trans('lang.checkout').'</span>';
  //           }

  //           return  $status;
           
  //       } )->rawColumns(['status'])
  //       ->make(true);		
  //   }
}

