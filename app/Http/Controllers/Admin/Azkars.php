<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\AzkarsDataTable;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Azkar;

use App\Http\Controllers\Validations\AzkarsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class Azkars extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:azkars_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:azkars_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:azkars_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:azkars_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

            public function index(AzkarsDataTable $azkars)
            {
               return $azkars->render('admin.azkars.index',['title'=>trans('admin.azkars')]);
            }


            public function create()
            {
                $categories = Category::get();
               return view('admin.azkars.create',['title'=>trans('admin.create'),'categories'=>$categories]);
            }


            public function store(AzkarsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$azkars = Azkar::create($data);

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $azkars,
			]);
			 }

            public function show($id)
            {
        		$azkars =  Azkar::find($id);
        		return is_null($azkars) || empty($azkars)?
        		backWithError(trans("admin.undefinedRecord"),aurl("azkars")) :
        		view('admin.azkars.show',[
				    'title'=>trans('admin.show'),
					'azkars'=>$azkars
        		]);
            }

            public function edit($id)
            {
        		$azkars =  Azkar::find($id);
        		return is_null($azkars) || empty($azkars)?
        		backWithError(trans("admin.undefinedRecord"),aurl("azkars")) :
        		view('admin.azkars.edit',[
				  'title'=>trans('admin.edit'),
				  'azkars'=>$azkars
        		]);
            }

            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new AzkarsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(AzkarsRequest $request,$id)
            {
              // Check Record Exists
              $azkars =  Azkar::find($id);
              if(is_null($azkars) || empty($azkars)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("azkars"));
              }
              $data = $this->updateFillableColumns();
              Azkar::where('id',$id)->update($data);

              $azkars = Azkar::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $azkars,
              ]);
			}

	public function destroy($id){
		$azkars = Azkar::find($id);
		if(is_null($azkars) || empty($azkars)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("azkars"));
		}

		it()->delete('azkar',$id);
		$azkars->delete();
		return redirectWithSuccess(aurl("azkars"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$azkars = Azkar::find($id);
				if(is_null($azkars) || empty($azkars)){
					return backWithError(trans('admin.undefinedRecord'),aurl("azkars"));
				}

				it()->delete('azkar',$id);
				$azkars->delete();
			}
			return redirectWithSuccess(aurl("azkars"),trans('admin.deleted'));
		}else {
			$azkars = Azkar::find($data);
			if(is_null($azkars) || empty($azkars)){
				return backWithError(trans('admin.undefinedRecord'),aurl("azkars"));
			}

			it()->delete('azkar',$data);
			$azkars->delete();
			return redirectWithSuccess(aurl("azkars"),trans('admin.deleted'));
		}
	}


}
