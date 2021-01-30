@extends('Admin/layouts/skeleton')
@section('style')
    <link href="{{ @asset('plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title', 'Manage Product')
@section('main-header', 'Manage Product')
@section('sitemap')
    <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/manageproduct"><i class="fa fa-users"></i> Manage Product</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="pull-right">
                <a href="/manageproduct/add" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Product"><i class="fa fa-plus"></i></a>
                <a href="/manageproduct/upload" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Upload Excel File"><i class="fa fa-upload"></i></a>
                <a href="/export_productDetails" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Download Product"><i class="fa fa-download"></i></a>
                <a href="/dashboard" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="go to dashboard"><i class="fa fa-reply"></i></a>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Product List</h3>
                </div>
                <div class="box-body table-responsive">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">id</th>
                                <th class="text-center">Product Image</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Restock</th>
                                <th class="text-center">Status</th>
                                <th></th>
                                <th class="text-center">Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            @if($item->quantity<$item->restock)
                            <tr style="background-color: lightblue">
                            @else
                            <tr>
                            @endif
                                <td class="text-center">{{$item->id}}</td>
                                <td class="text-center"><img src="{{$item->image}}" height="70" /></td>
                                <td class="text-center">{{$item->name}}</td>
                                <td class="text-center">{{$item->price}}</td>
                                <td class="text-center">{{$item->quantity}}</td>
                                <td class="text-center">{{$item->restock}}</td>
                                <td class="text-center">{{($item->is_active)?"Active":"Deactive"}}</td>
                                <td class="text-center"><a href="/manageproduct/update/{{$item->id}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Member"><i class="fa fa-pencil"> Edit</i></a></td>
                                @if($item->is_active)
                                    <td class="text-center"><a href="/manageproduct/deactive/{{$item->id}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Remove Member"><i class="fa fa-remove"> Deactive</i></a></td>
                                @else
                                    <td class="text-center"><a href="/manageproduct/active/{{$item->id}}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Restore Member"><i class="fa fa-undo"> Active</i></a></td>
                                @endif
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#exampleModal" type="button" value="{{$item->id}}"  name="edit" class="btn btn-primary"><i class="fa fa-plus"> Add Stock</i></button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>

    <div class="modal fade row justify-content-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <div class="box box-primary ">
            <div class="box-header" data-toggle="tooltip" title="" data-original-title="Header tooltip" aria-describedby="tooltip599255">
                <h3 class="box-title">Edit Event</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div><div class="tooltip fade top in" role="tooltip" id="tooltip599255" style="top: -33px; left: 212px; display: block;"><div class="tooltip-arrow" style="left: 50%;"></div><div class="tooltip-inner">Header tooltip</div></div>
            <div class="box-body">
                <form id="form"  method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label" >Product Stock: </label>
                        <input class="form-control" type="number" name="Stock" placeholder="Enter Stock" min="0" required/>

                    </div>
                </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-primary" type="submit" form="form">Submit</button>
            </div><!-- /.box-footer-->
        </div>
        </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ @asset('/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ @asset('/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $('#table1').dataTable();
        });

    </script>
    <script>
        $('#exampleModel').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
    </script>
    <script>
        $("[name='edit']").on('click',function () {
            var id=$(this).val();
            var value=$('#'+id).html();
            //$("#form input").val(value);
            var data=$('#form').attr('action',"/manageproduct/addstock/"+id);
        });

    </script>

@endsection

