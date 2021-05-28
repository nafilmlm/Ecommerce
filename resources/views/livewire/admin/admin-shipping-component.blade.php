<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Shippings
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addshipping')}}" class="btn btn-success pull-right">Add New</a> 
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Country</th>
                                    <th>Shipping</th>
                                    <th>Description</th>
                                    <th>Estimated Delivery</th>
                                    <th>Cost</th>
                                    <th>Tracking</th>
                                    <th>Carrier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shippings as $shipping)
                                    <tr>
                                        <td>{{$shipping->id}}</td>
                                        <td>{{$shipping->countryName}}</td>
                                        <td>{{$shipping->shippingType}}</td>
                                        <td>{{$shipping->description}}</td>
                                        <td>{{$shipping->estimatedDelivery}}</td>
                                        <td>{{$shipping->cost}}</td>
                                        <td>{{$shipping->tracking}}</td>
                                        <td>{{$shipping->carrier}}</td>
                                        <td>
                                            <a href="{{route('admin.editshipping',['shipping_id'=>$shipping->id])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this shipping?') || event.stopImmediatePropagation()" style="margin-left:10px;" wire:click.prevent="deleteShipping({{$shipping->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$shippings->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
