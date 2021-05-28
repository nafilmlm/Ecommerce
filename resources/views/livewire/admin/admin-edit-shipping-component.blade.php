<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Shipping
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.shipping')}}" class="btn btn-success pull-right">All Shipping</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multiple/form-data" wire:submit.prevent="updateShipping" >

                            <div class="form-group">
                                <label class="col-md-4 control-label">Country</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="country_id">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->name}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Shipping Type</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Shipping Type" class="form-control input-md" wire:model="shippingType" wire:keyup="generateSlug"/>
                                    @error('shippingType')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Estimated Delivery</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="estimatedDelivery" placeholder="Estimated Delivery" wire:model="estimatedDelivery"></textarea>
                                    @error('estimatedDelivery')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="col-md-4 control-label">Cost</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cost" class="form-control input-md" wire:model="cost"/>
                                    @error('cost')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Tracking</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="tracking">
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Carrier</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="carrier" placeholder="Carrier" wire:model="carrier"></textarea>
                                    @error('carrier')  <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>
@endpush