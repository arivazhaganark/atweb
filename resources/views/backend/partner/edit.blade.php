@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Partners
@endsection
@section('content')
<div class="container spark-screen" style="width:100%;">
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif  
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form role="form" method="post" name="partner_reg" id="partner_reg" action="{{ url('admin/partner/update') }}">
                {{ csrf_field() }}
                <input type="hidden" name="hidid" id="hidid" value="{{ $partner->id }}"> 
                <div class="tab-content">
                    <div id="en" class="tab-pane fade in active">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title text-navy">Edit Partner</h3>
                                <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/partner') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                   <label for="title">Partner Type <span class="text-red">*</span></label><br/>

                                      <label class="checkbox-inline"><input id="rpartner" name="partner_type[]" type="checkbox" value="Referral Partner"  <?php if (strpos($partner->partner_type, 'Referral Partner') !== false) { ?> checked <?php } ?>>Referral Partner</label> 

                                      <label class="checkbox-inline"><input id="reselpartner" name="partner_type[]" type="checkbox" value="Reseller Partner" <?php if (strpos($partner->partner_type, 'Reseller Partner') !== false) { ?> checked <?php } ?>>Reseller Partner</label> 

                                      <label class="checkbox-inline"><input id="techpartner" name="partner_type[]" type="checkbox" value="Technology Partner" <?php if (strpos($partner->partner_type, 'Technology Partner') !== false) { ?> checked <?php } ?>>Technology Partner</label>   

                                </div>
                                <div class="form-group">
                                   <label for="company">Company <span class="text-red">*</span></label>
                                   <input type="text" class="form-control" name="company" id="company" placeholder="Enter Company" value="{{ $partner->companyname }}">
                                </div>
                                <div class="form-group">
                                   <label for="name">Name <span class="text-red">*</span></label>
                                   <input type="text" class="form-control" name="pname" id="pname" placeholder="Enter Name" value="{{ @$partner->first_name }} {{ @$partner->last_name }}">
                                </div>
                                <div class="form-group">
                                   <label for="email">Email <span class="text-red">*</span></label>
                                      <input type="text" class="form-control" name="email" id="pemail" placeholder="Enter Email" value="{{ $partner->email }}">
                                      <div id="pvalEmail" style="font-size: 11px; font-style: italic; font-weight: bold; color: brown;"></div>
                                </div>
                                <div class="form-group">
                                   <label for="zipcode">Phone <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{ $partner->phone }}">
                                </div>
                                <div class="form-group">
                                   <label for="street">Address <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{ $partner->address }}">
                                </div>                                
                                <div class="form-group">
                                   <label for="zipcode">State <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" value="{{ $partner->state }}">
                                </div>
                                <div class="form-group">
                                   <label for="title">Years in Business <span class="text-red">*</span></label>
                                     <input id="yearbusiness" class="form-control" name="yearbusiness" type="text" placeholder="Enter Year in Business" value="{{ $partner->year_of_establishment }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">No. of Sales Personnel <span class="text-red">*</span></label>
                                      <input id="salespersonal" class="form-control" name="salespersonal" type="text" placeholder="Enter No. of Sales Personnel" value="{{ $partner->no_of_sales }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">No. of Technical Support Engineers <span class="text-red">*</span></label>
                                      <input id="supporteng" class="form-control" name="supporteng" type="text" placeholder="Enter No. of Technical Support Engineers" value="{{ $partner->no_of_technical }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">Annual Revenue <span class="text-red">*</span></label>
                                      <input id="annualrev" class="form-control" name="annualrev" type="text" placeholder="Enter Annual Revenue" style="margin-top: 10px;" value="{{ $partner->annual_revenue }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">Sales Territories Covered <span class="text-red">*</span></label>
                                      <input id="salesterr" class="form-control" name="salesterr" type="text" placeholder="Enter Sales Territories" value="{{ $partner->sales_territories }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">Current Focus Segment <span class="text-red">*</span></label><br/>

                                      <label class="checkbox-inline"><input id="education" name="segment[]" type="checkbox" value="education" <?php if (strpos($partner->current_focus, 'education') !== false) { ?> checked <?php } ?>>Education</label> 

                                      <label class="checkbox-inline"><input id="enterprises" name="segment[]" type="checkbox" value="enterprises" <?php if (strpos($partner->current_focus, 'enterprises') !== false) { ?> checked <?php } ?>>Enterprises</label> 

                                      <label class="checkbox-inline"><input id="government" name="segment[]" type="checkbox" value="government" <?php if (strpos($partner->current_focus, 'government') !== false) { ?> checked <?php } ?>>Government</label> 

                                      <label class="checkbox-inline"><input id="health" name="segment[]" type="checkbox" value="health" <?php if (strpos($partner->current_focus, 'health') !== false) { ?> checked <?php } ?>>Health</label> 

                                      <label class="checkbox-inline"><input id="infrastructure" name="segment[]" type="checkbox" value="infrastructure" <?php if (strpos($partner->current_focus, 'infrastructure') !== false) { ?> checked <?php } ?>>Infrastructure &amp; Retail</label> 

                                      <label class="checkbox-inline"><input id="media" name="segment[]" type="checkbox" value="media" <?php if (strpos($partner->current_focus, 'media') !== false) { ?> checked <?php } ?>>Media</label>

                                       <label class="checkbox-inline"><input id="service" name="segment[]" type="checkbox" value="service" <?php if (strpos($partner->current_focus, 'service') !== false) { ?> checked <?php } ?>>Service Provider</label>

                                </div>
                                <div class="form-group">
                                   <label for="title">Products/services offered <span class="text-red">*</span></label>
                                      <input id="productso" class="form-control" name="productso" type="text" placeholder="Enter Products/services offered" value="{{ $partner->product_offer }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">Brands Dealt With <span class="text-red">*</span></label>
                                      <input id="brabdsd" class="form-control" name="brabdsd" type="text" placeholder="Enter Brands Dealt With" value="{{ $partner->brand_deal }}" />
                                </div>
                                <div class="form-group">
                                   <label for="title">Reason for Interest in A&T Video Networks <span class="text-red">*</span></label><br/>
                                        
                                      <label class="checkbox-inline d-block ml-10px"> &nbsp;&nbsp;&nbsp;<input id="1" name="reason[]" type="checkbox" value="reason1" <?php if (strpos($partner->reason_for_interest, 'reason1') !== false) { ?> checked <?php } ?>>I find A&amp;T’s products very interesting for my segment</label> 

                                      <label class="checkbox-inline d-block"> <input id="2" name="reason[]" type="checkbox" value="reason2" <?php if (strpos($partner->reason_for_interest, 'reason2') !== false) { ?> checked <?php } ?>> I believe A&amp;T’s products more suitable for my region </label> 

                                      <label class="checkbox-inline d-block"> <input id="3" name="reason[]" type="checkbox" value="reason3" <?php if (strpos($partner->reason_for_interest, 'reason3') !== false) { ?> checked <?php } ?>> I want to expand my product portfolio </label> 

                                      <label class="checkbox-inline d-block"> <input id="4" name="reason[]" type="checkbox" value="reason4" <?php if (strpos($partner->reason_for_interest, 'reason4') !== false) { ?> checked <?php } ?>> I want to expand into other vertical segments </label> 

                                      <label class="checkbox-inline d-block"> <input id="5" name="reason[]" type="checkbox" value="reason5" <?php if (strpos($partner->reason_for_interest, 'reason5') !== false) { ?> checked <?php } ?>> Leverage A&amp;T’s expertise for my market </label>

                                </div>                                
                                <div class="clearfix "></div>
                                <div class="box-footer">
                                    <button class="btn btn-primary" name="btn_partner_reg" id="btn_partner_reg" type="submit">Submit</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.box-body --> 
                            <!-- /.box --> 
                        </div>
                    </div>                 
                </div>
            </form>

        </div>
    </div>
</div>
<script src="{{ asset('js/admin_pagejs/partner-validation.js?v=2.0') }}"></script>
@endsection
