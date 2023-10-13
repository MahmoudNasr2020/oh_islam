<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AzkarsRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.33]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.33]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'number'=>'required|numeric',
             'simple_description'=>'',
             'description'=>'nullable',
             'zakar'=>'nullable',
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


	/**
	 * Baboon Script By [it v 1.6.33]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'number'=>trans('admin.number'),
             'simple_description'=>trans('admin.simple_description'),
             'description'=>trans('admin.description'),
             'zakar'=>trans('admin.zakar'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.33]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
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