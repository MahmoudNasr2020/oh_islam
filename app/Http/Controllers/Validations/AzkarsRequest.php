<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AzkarsRequest extends FormRequest {


	public function authorize() {
		return true;
	}


	protected function onCreate() {
		return [
             'number'=>'required|numeric',
             'simple_description'=>'',
             'description'=>'nullable',
             'zakar'=>'nullable',
             'category_id'=>'required',
		];
	}

	protected function onUpdate() {
		return [
             'number'=>'required|numeric',
             'simple_description'=>'',
             'description'=>'nullable',
             'zakar'=>'nullable',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	public function attributes() {
		return [
             'number'=>trans('admin.number'),
             'simple_description'=>trans('admin.simple_description'),
             'description'=>trans('admin.description'),
             'zakar'=>trans('admin.zakar'),
             'category_id'=>trans('admin.category_id'),
		];
	}


	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}
