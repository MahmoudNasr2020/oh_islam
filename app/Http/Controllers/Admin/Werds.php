<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\WerdsDataTable;
use Carbon\Carbon;
use App\Models\Werd;

use App\Http\Controllers\Validations\WerdsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class Werds extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:werds_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:werds_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:werds_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:werds_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.33]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(WerdsDataTable $werds)
            {
               return $werds->render('admin.werds.index',['title'=>trans('admin.werds')]);
            }


            /**
             * Baboon Script By [it v 1.6.33]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.werds.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.33]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(WerdsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$werds = Werd::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $werds,
			]);
			 }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.33]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$werds =  Werd::find($id);
        		return is_null($werds) || empty($werds)?
        		backWithError(trans("admin.undefinedRecord"),aurl("werds")) :
        		view('admin.werds.show',[
				    'title'=>trans('admin.show'),
					'werds'=>$werds
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.33]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$werds =  Werd::find($id);
        		return is_null($werds) || empty($werds)?
        		backWithError(trans("admin.undefinedRecord"),aurl("werds")) :
        		view('admin.werds.edit',[
				  'title'=>trans('admin.edit'),
				  'werds'=>$werds
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.33]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new WerdsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(WerdsRequest $request,$id)
            {
              // Check Record Exists
              $werds =  Werd::find($id);
              if(is_null($werds) || empty($werds)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("werds"));
              }
              $data = $this->updateFillableColumns(); 
              Werd::where('id',$id)->update($data);

              $werds = Werd::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $werds,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.33]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$werds = Werd::find($id);
		if(is_null($werds) || empty($werds)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("werds"));
		}
               
		it()->delete('werd',$id);
		$werds->delete();
		return redirectWithSuccess(aurl("werds"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$werds = Werd::find($id);
				if(is_null($werds) || empty($werds)){
					return backWithError(trans('admin.undefinedRecord'),aurl("werds"));
				}
                    	
				it()->delete('werd',$id);
				$werds->delete();
			}
			return redirectWithSuccess(aurl("werds"),trans('admin.deleted'));
		}else {
			$werds = Werd::find($data);
			if(is_null($werds) || empty($werds)){
				return backWithError(trans('admin.undefinedRecord'),aurl("werds"));
			}
                    
			it()->delete('werd',$data);
			$werds->delete();
			return redirectWithSuccess(aurl("werds"),trans('admin.deleted'));
		}
	}
            

}