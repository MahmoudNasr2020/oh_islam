@extends('admin.index')
@section('content')

@include("admin.layouts.components.submit_form_ajax",["form"=>"#azkars"])
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('azkars') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">

{!! Form::open(['url'=>aurl('/azkars'),'id'=>'azkars','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('number',trans('admin.number'),['class'=>' control-label']) !!}
            {!! Form::text('number',old('number'),['class'=>'form-control','placeholder'=>trans('admin.number')]) !!}
    </div>
</div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="form-group">
                <label class="control-label">القسم</label>
                <select name="category_id" class='form-control'>
                    <option>اختار القسم</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
        </div>
    </div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('simple_description',trans('admin.simple_description'),['class'=>'control-label']) !!}
            {!! Form::textarea('simple_description',old('simple_description'),['class'=>'form-control','placeholder'=>trans('admin.simple_description')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('description',trans('admin.description'),['class'=>'control-label']) !!}
            {!! Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>trans('admin.description')]) !!}
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        {!! Form::label('zakar',trans('admin.zakar'),['class'=>'control-label']) !!}
            {!! Form::textarea('zakar',old('zakar'),['class'=>'form-control ckeditor','placeholder'=>trans('admin.zakar')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
{!! Form::close() !!}	</div>
</div>
@endsection
