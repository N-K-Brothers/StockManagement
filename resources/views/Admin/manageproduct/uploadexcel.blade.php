@extends('Admin/layouts/skeleton')
@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

@endsection
@section('page-title', 'Manage Product')
@section('main-header', 'Upload Product')
@section('sitemap')
    <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class=""><a href="/manageproduct"><i class="fa fa-dashboard"></i> Manage Product</a></li>
    <li class="active"><a href="/manageproduct/upload"><i class="fa fa-dashboard"></i> Upload form</a></li>
@endsection
@section('content')
@if(isset($errors) && $errors->any())
<div class="row">
    <div class="col-xs-12">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
<div class="row">
    <div class="col-xs-12">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" form="form" data-toggle="tooltip" data-placement="top" title="Submit form"><i class="fa fa-save"></i></button>
            <button type="reset" class="btn btn-default" form="form" data-toggle="tooltip" data-placement="top" title="Refresh form"><i class="fa fa-refresh"></i></button>
            <a href="/manageproduct" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="go to product list"><i class="fa fa-reply"></i></a>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Add Form</h3>
            </div>
            <div class="box-body">
                <form action="/import_productDetails" id="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id-File_Upload">Upload the file : </label>
                        <input type="file" name="File_Upload" id="id-File_Upload" required/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection

