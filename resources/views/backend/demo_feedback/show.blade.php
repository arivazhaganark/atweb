@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Demo Feedback Form
@endsection
@section('content')
<style>
    dt {
        width:200px !important;
    }
    dd {
        margin-left:220px !important;
    }
    .text-navy { font-size: 20px; }
</style>
<div class="container spark-screen" style="width:100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 
            <div class="box box-primary">                 
                <div class="box-body">
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/demo_feedback/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                    <div class="tab-content">  
                        <h3 class="box-title text-navy">Company Details</h3>

                        <div class="col-xs-12" style="margin-left: 110px;">  
                            <dl class="dl-horizontal">
                                <dt>Company Name :</dt>
                                <dd>{{ $demo_feedback->companyname }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Location :</dt>
                                <dd>{{ $demo_feedback->location }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Person-in Charge :</dt>
                                <dd>{{ $demo_feedback->person_in_charge }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Phone No. :</dt>
                                <dd>{{ $demo_feedback->phoneno }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Decision Making Authority’s Presence :</dt>
                                <dd>{{ $demo_feedback->decision }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Product Name :</dt>
                                <dd>{{ $demo_feedback->product_name }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Solution Name :</dt>
                                <dd>{{ $demo_feedback->solution_name }}</dd>
                            </dl>  
                            <dl class="dl-horizontal">
                                <dt>Demo Date :</dt>
                                <dd>{{ $demo_feedback->demo_date }}</dd>
                            </dl>                          
                        </div> 

                        <h3 class="box-title text-navy">Rating Details</h3>
                        <table class="table table-bordered">
                        <tbody>
                           <tr>
                              <td colspan="1" width="380">Feedback parameters</td>
                              <td colspan="1"><label class="font-bold"> Ratings</label>
                                 <br>
                                 <label> 5 - Sufficient rating</label>
                                 <br>
                                 <label> 3 - Average</label>
                                 <br>
                                 <label>  1 - E{{ $demo_feedback->cemail }}pected better</label>
                              </td>
                              <td colspan="2"> <label class="font-bold">Suggestions</label></td>
                           </tr>
                           <tr>
                              <td>
                                 Demo pre requisite information provided by A &amp; T team
                              </td>
                              <td colspan="1">
                                 <div>{{ $demo_feedback->demo_pre }}</div>
                              </td>
                              <td colspan="2">
                                 <div>{{ $demo_feedback->demo_pre_text }}</div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Demo co ordination by A &amp; T team
                              </td>
                              <td colspan="1">
                                 <div>{{ $demo_feedback->demo_coordination }}</div>
                              </td>
                              <td colspan="2">
                                 <div>{{ $demo_feedback->demo_coordination_text }}</div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Technical details shared during demo 
                              </td>
                              <td colspan="1">
                                 <div>{{ $demo_feedback->tech_detail }}</div>
                              </td>
                              <td colspan="2">
                                 <div>{{ $demo_feedback->tech_detail_text }}</div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Product handling - features shown during demo 
                              </td>
                              <td colspan="1">
                                 <div>{{ $demo_feedback->product_handling }}</div>
                              </td>
                              <td colspan="2">
                                 <div>{{ $demo_feedback->product_handling_text }}</div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Demo purpose satisfaction level 
                              </td>
                              <td colspan="1">
                                 <div>{{ $demo_feedback->demo_purpose }}</div>
                              </td>
                              <td colspan="2">
                                 <div>{{ $demo_feedback->demo_purpose_text }}</div>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 Signature of the customer with seal
                              </td>
                              <td colspan="1">
                                 <label>Customer Name:</label>
                                 <br>
                                 <div>{{ $demo_feedback->customer_name }}</div>
                              </td>
                              <td colspan="2">
                                 <label>A&T E&D Engineer Name:</label>
                                 <br>
                                 <div>{{ $demo_feedback->at_engineer }}</div>
                              </td>
                           </tr>
                        </tbody>
                     </table>

                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endsection
