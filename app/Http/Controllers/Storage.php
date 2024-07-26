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

class Storage extends Controller
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

    //return view
    public function index() {
		return view( 'storage.index' );
    }

    /**
	 * get data from database
	 * @return object
	 */
    public function getdata(){
        $data = DB::table('storage')->select(['storage.*']);
		return Datatables::of($data)
		->addColumn( 'action', function ( $accountsingle ) {
            return '<a href="#" id="btnedit" customdata='.$accountsingle->id.' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> '. trans('lang.edit').'</a>
                    <a href="#" id="btndelete" customdata='.$accountsingle->id.' class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> '. trans('lang.delete').'</a>';
        } )->make( true );		
    }

    /**
	 * get all  from database
	 * @return object
	 */
    public function getrows(){
        $data = DB::table('storage')->get();
        if ( $data ) {
			$res['success'] = true;
			$res['message']= $data;
        }
        return response( $res );
    }

    /**
	 * get single data 
	 * @param integer $id
	 * @return object
	 */

    public function byid( Request $request ) {
        $id            = $request->input( 'id' );

        $data = DB::table('storage')->where('id', $id)->first();
        
        if ( $data ) {
			$res['success'] = 'success';
			$res['message']= $data;
        } else{
            $res['success'] = 'failed';
        }
        return response( $res );
        
    }

    /**
	 * insert data  to database
	 *
	 * @param string  $name
     * @param string  $description
	 * @return object
	 */
    public function save(Request $request){
        $name           = $request->input( 'name' );
        $description    = $request->input( 'description' );
        $serial         = $request->input( 'serial' );
        $cost           = $request->input( 'cost' );
        $quantity       = $request->input( 'quantity' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $data           = array('name'=>$name, 'serial'=>$serial,
                        'cost'=>$cost,'quantity'=>$quantity, 
                        'description'=>$description,'created_at'=>$created_at, 
                        'updated_at'=>$updated_at);
		$insert         = DB::table( 'storage' )->insert( $data );

		if ( $insert ) {
			$res['success'] = 'success';
			
        } else{
            $res['success'] = 'failed';
        }
        
        return response( $res );
    }

    /**
	 * update data  to database
	 *
	 * @param string  $name
     * @param string  $description
	 * @return object
	 */
    public function update(Request $request){
        $id             = $request->input( 'id' );
        $name           = $request->input( 'name' );
        $description    = $request->input( 'description' );
        $serial         = $request->input( 'serial' );
        $cost           = $request->input( 'cost' );
        $quantity       = $request->input( 'quantity' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");

		$update = DB::table( 'storage' )->where( 'id', $id )
		->update(
			[
			'name'          => $name,
            'serial'        =>$serial,
            'cost'          =>$cost,
            'quantity'      =>$quantity, 
            'description'   => $description,
            'updated_at'    => $updated_at
			]
		);
        
        if ( $update ) {
			$res['success'] = 'success';
			
        } else{
            $res['success'] = 'failed';
        }

        return response( $res );
    }

     /**
	 * delete to database
	 *
	 * @param integer $id
	 * @return object
	 */

	public function delete( Request $request ) {
		$id = $request->input( 'id' );
		$delete = DB::table( 'storage' )->where( 'id', $id )->delete();
            if ( $delete ) {
                $res['success'] = 'success';
            } else{
                $res['success'] = 'failed';
            }
		return response( $res );
	}
}
