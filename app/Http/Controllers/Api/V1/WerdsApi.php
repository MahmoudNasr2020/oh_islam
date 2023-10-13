<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Werd;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\WerdsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.33]
// Copyright Reserved  [it v 1.6.33]
class WerdsApi extends Controller{
	protected $selectColumns = [
		"id",
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
            	$Werd = Werd::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$Werd]);
            }


            /**
             * Baboon Api Script By [it v 1.6.33]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(WerdsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $Werd = Werd::create($data); 

		  $Werd = Werd::with($this->arrWith())->find($Werd->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Werd
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
                $Werd = Werd::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($Werd) || empty($Werd)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $Werd
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.33]
             * update a newly created resource in storage.
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
            	$Werd = Werd::find($id);
            	if(is_null($Werd) || empty($Werd)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              Werd::where("id",$id)->update($data);

              $Werd = Werd::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $Werd
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.33]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $werds = Werd::find($id);
            	if(is_null($werds) || empty($werds)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("werd",$id);

               $werds->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $werds = Werd::find($id);
	            	if(is_null($werds) || empty($werds)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("werd",$id);
                    	$werds->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $werds = Werd::find($data);
	            	if(is_null($werds) || empty($werds)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("werd",$data);

                    $werds->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}