@extends('Admin/layouts/skeleton')
@section('style')
@endsection
@section('page-title', 'Manage Product')
@section('main-header', 'Add Product')
@section('sitemap')
    <li><a href="/event/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/manageproduct"><i class="fa fa-users"></i>Manage Product</a></li>
    <li class="active"><a href="/member/addform"><i class="fa fa-plus"></i>Add Product</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary" form="form" data-toggle="tooltip" data-placement="top" title="Submit form"><i class="fa fa-save"></i></button>
                <button type="reset" class="btn btn-default" form="form" data-toggle="tooltip" data-placement="top" title="Refresh form"><i class="fa fa-refresh"></i></button>
                <a href="/manageproduct" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="go to member list"><i class="fa fa-reply"></i></a>
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
                    <form action="/manageproduct/save"  enctype="multipart/form-data" id="form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id-Image">Product Image : </label>
                            <input type="file" class="form-control" name="Image" id="id-Image" required>
                            <p style="color: red;text-align: right">@error('Image'){{$message}}@enderror</p>
                        </div>
                        <div class="form-group">
                            <label for="id-Product_Name">Product Name : </label>
                            <input type="text" value="{{Request::old('Product_Name')}}" class="form-control" name="Product_Name" id="id-Product_Name" placeholder="Enter Product Name" required>
                            <p style="color: red;text-align: right">@error('Product_Name'){{$message}}@enderror</p>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                <label for="id-Price">Price : </label>
                                <input type="number" value="{{Request::old('Price')}}" class="form-control" name="Price" id="id-Price" min="0" placeholder="Enter Price" required>
                                <p style="color: red;text-align: right">@error('Price'){{$message}}@enderror</p>
                                </div>

                                <div class="col-sm-6">
                                    <label for="id-Quantity">Quantity : </label>
                                    <input type="number" value="{{Request::old('Quantity')}}" class="form-control" name="Quantity" id="id-Quantity" min="0" placeholder="Enter Quantity" required>
                                    <p style="color: red;text-align: right">@error('Quantity'){{$message}}@enderror</p>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="id-Product_Description">Product Description : </label>
                                <textarea value="{{Request::old('Product_Description')}}" class="form-control" name="Product_Description" id="id-Product_Description" placeholder="Enter Product Description" required></textarea>
                                <p style="color: red;text-align: right">@error('Product_Name'){{$message}}@enderror</p>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.form-group').each(function(){
            if($( this ).find('p').html())
            {
                $(this).addClass( "has-error" );
            }
        });
    </script>
@endsection
