<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\VideosDataTable;
use Carbon\Carbon;
use App\Models\Video;

use App\Http\Controllers\Validations\VideosRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class Videos extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:videos_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:videos_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:videos_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:videos_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.33]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(VideosDataTable $videos)
            {
               return $videos->render('admin.videos.index',['title'=>trans('admin.videos')]);
            }


            /**
             * Baboon Script By [it v 1.6.33]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.videos.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.33]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(VideosRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$videos = Video::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $videos,
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
        		$videos =  Video::find($id);
        		return is_null($videos) || empty($videos)?
        		backWithError(trans("admin.undefinedRecord"),aurl("videos")) :
        		view('admin.videos.show',[
				    'title'=>trans('admin.show'),
					'videos'=>$videos
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.33]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$videos =  Video::find($id);
        		return is_null($videos) || empty($videos)?
        		backWithError(trans("admin.undefinedRecord"),aurl("videos")) :
        		view('admin.videos.edit',[
				  'title'=>trans('admin.edit'),
				  'videos'=>$videos
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
				foreach (array_keys((new VideosRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(VideosRequest $request,$id)
            {
              // Check Record Exists
              $videos =  Video::find($id);
              if(is_null($videos) || empty($videos)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("videos"));
              }
              $data = $this->updateFillableColumns(); 
              Video::where('id',$id)->update($data);

              $videos = Video::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $videos,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.33]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$videos = Video::find($id);
		if(is_null($videos) || empty($videos)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("videos"));
		}
               
		it()->delete('video',$id);
		$videos->delete();
		return redirectWithSuccess(aurl("videos"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$videos = Video::find($id);
				if(is_null($videos) || empty($videos)){
					return backWithError(trans('admin.undefinedRecord'),aurl("videos"));
				}
                    	
				it()->delete('video',$id);
				$videos->delete();
			}
			return redirectWithSuccess(aurl("videos"),trans('admin.deleted'));
		}else {
			$videos = Video::find($data);
			if(is_null($videos) || empty($videos)){
				return backWithError(trans('admin.undefinedRecord'),aurl("videos"));
			}
                    
			it()->delete('video',$data);
			$videos->delete();
			return redirectWithSuccess(aurl("videos"),trans('admin.deleted'));
		}
	}
            

}