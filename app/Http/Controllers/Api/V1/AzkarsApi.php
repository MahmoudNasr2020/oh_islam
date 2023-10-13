<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Azkar;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\AzkarsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class AzkarsApi extends Controller{
	protected $selectColumns = [
		"id",
		"number",
		"simple_description",
		"description",
		"zakar",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.33]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.33]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$Azkar = Azkar::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Azkar]);
            }


            /**
             * Baboon Api Script By [it v 1.6.33]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(AzkarsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Azkar = Azkar::create($data); 

		  $Azkar = Azkar::with($this->arrWith())->find($Azkar->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Azkar
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.33]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $Azkar = Azkar::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Azkar) || empty($Azkar)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Azkar
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.33]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
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
            	$Azkar = Azkar::find($id);
            	if(is_null($Azkar) || empty($Azkar)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Azkar::where("id",$id)->update($data);

              $Azkar = Azkar::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Azkar
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.33]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $azkars = Azkar::find($id);
            	if(is_null($azkars) || empty($azkars)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("azkar",$id);

               $azkars->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $azkars = Azkar::find($id);
	            	if(is_null($azkars) || empty($azkars)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("azkar",$id);
                    	$azkars->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $azkars = Azkar::find($data);
	            	if(is_null($azkars) || empty($azkars)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("azkar",$data);

                    $azkars->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}