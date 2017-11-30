@extends('backend.layouts.app_inner')
@section('htmlheader_title')
Career
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
                    <div class="pull-right"> <a style="margin-right:4px;" class="btn  btn-default btn-xs text-purple" href="{{ url('/admin/career/') }}"><i class="fa fa-arrow-left"></i> Back</a> </div>
                    <div class="tab-content">  
                        <h3 class="box-title text-navy">Personal Details</h3>

                        <div class="col-xs-12">  
                            <dl class="dl-horizontal">
                                <dt>Career Name :</dt>
                                <dd>{{ $career_data->cname }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Address :</dt>
                                <dd>{{ $career_data->address }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Mobile :</dt>
                                <dd>{{ $career_data->phoneno }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Email :</dt>
                                <dd>{{ $career_data->email }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Date Of Birth :</dt>
                                <dd>{{ $career_data->dob }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Age :</dt>
                                <dd>{{ $career_data->age }}</dd>
                            </dl>       
                        </div> 
                        <h3 class="box-title text-navy">Education Details</h3>
                        <?php if(!empty($career_data->yearofpass)) { ?>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Year Of Passing :</dt>
                                <dd>{{ $career_data->yearofpass }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Major :</dt>
                                <dd>{{ $career_data->major }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Marks Grade :</dt>
                                <dd>{{ $career_data->marks_grade }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>College :</dt>
                                <dd>{{ $career_data->uni_clg }}</dd>
                            </dl>          
                        </div> 
                        <?php } ?>
                        <?php if(!empty($career_data->graduation_yearofpass)) { ?>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Graduation Year of Passing :</dt>
                                <dd>{{ $career_data->graduation_yearofpass }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Graduation Major :</dt>
                                <dd>{{ $career_data->graduation_major }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Graduation Marks Grade :</dt>
                                <dd>{{ $career_data->graduation_marks_grade }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Graduation College :</dt>
                                <dd>{{ $career_data->graduation_clg }}</dd>
                            </dl>         
                        </div>
                        <?php } ?> 
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>High School Year of Passing :</dt>
                                <dd>{{ $career_data->hs_yearofpass }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>High School Major :</dt>
                                <dd>{{ $career_data->hs_major }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>High School Marks Grade :</dt>
                                <dd>{{ $career_data->hs_marks_grade }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>High School Name :</dt>
                                <dd>{{ $career_data->hs_clg }}</dd>
                            </dl>        
                        </div> 
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Secondary School Year of Passing :</dt>
                                <dd>{{ $career_data->sec_yearofpass }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Secondary School Major :</dt>
                                <dd>{{ $career_data->sec_major }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Secondary School Marks Grade :</dt>
                                <dd>{{ $career_data->sec_marks_grade }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Secondary School Name :</dt>
                                <dd>{{ $career_data->sec_clg }}</dd>
                            </dl>     
                        </div> 
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Employement Details</h3>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Last Salary :</dt>
                                <dd>{{ $career_data->last_salary }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Last CTC :</dt>
                                <dd>{{ $career_data->last_ctc }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Travel In :</dt>
                                <dd>{{ $career_data->travel_in }}</dd>
                            </dl>   
                        </div>
                        <div class="col-xs-6" style="padding:10px;">
                            <dl class="dl-horizontal">
                                <dt>Travel Out :</dt>
                                <dd>{{ $career_data->travel_out }}</dd>
                            </dl>  
                            <dl class="dl-horizontal">
                                <dt>Relocate :</dt>
                                <dd>{{ $career_data->relocate }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Relocate Country :</dt>
                                <dd>{{ $career_data->relocate_country }}</dd>
                            </dl> 
                        </div>
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Family Details</h3>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Father Name :</dt>
                                <dd>{{ $career_data->father_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Father Occupation :</dt>
                                <dd>{{ $career_data->father_occp }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Mother Name :</dt>
                                <dd>{{ $career_data->mother_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Mother Occupation :</dt>
                                <dd>{{ $career_data->mother_occp }}</dd>
                            </dl>
                        </div>
                        <div class="col-xs-6" style="padding:10px;">
                            <dl class="dl-horizontal">
                                <dt>Dependant :</dt>
                                <dd>{{ $career_data->dependent }}</dd>
                            </dl>  
                            <dl class="dl-horizontal">
                                <dt>Siblings :</dt>
                                <dd>{{ $career_data->siblings }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Siblings Employement Status :</dt>
                                <dd>{{ $career_data->siblings_emp }}</dd>
                            </dl> 
                        </div>
                        <div style="clear:both;"></div>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Marital Status :</dt>
                                <dd>{{ $career_data->marital_status }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Father Occupation :</dt>
                                <dd>{{ $career_data->father_occp }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Spouse Name :</dt>
                                <dd>{{ $career_data->spouse_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Spouse Employement Status :</dt>
                                <dd>{{ $career_data->spouse_emp_status }}</dd>
                            </dl>
                        </div>
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Employee Details</h3>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Employee Status :</dt>
                                <dd>{{ $career_data->emp_status }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Salary Expected :</dt>
                                <dd>{{ $career_data->salary_expected }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Notice Period :</dt>
                                <dd>{{ $career_data->notice_period }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Place :</dt>
                                <dd>{{ $career_data->place }}</dd>
                            </dl>
                        </div>
                        <div class="col-xs-6" style="padding:10px;"> 
                            <dl class="dl-horizontal">
                                <dt>Date :</dt>
                                <dd>{{ $career_data->date }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Name :</dt>
                                <dd>{{ $career_data->name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Signature :</dt>
                                <dd><img src="{{ url('uploads/career/'.$career_data->c_id.'/'.$career_data->signature) }}" height="100" width="100" /></dd>
                            </dl>
                        </div>

                        @if($career_contact_data->count() > 0)
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Reference Details</h3> 
                        @foreach( $career_contact_data as $contact_data )
                        <div class="col-xs-6" style="padding:10px;">  
                            <dl class="dl-horizontal">
                                <dt>Name :</dt>
                                <dd>{{ $contact_data->related_person }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Contact Number :</dt>
                                <dd>{{ $contact_data->related_cnumber }}</dd>
                            </dl>
                        </div> 
                        @endforeach
                        @endif


                        @if($career_dep_data->count() > 0)
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Dependant Details</h3> 
                        @foreach( $career_dep_data as $dep_data )
                        <div class="col-xs-6" style="padding:10px;">  
                            <dl class="dl-horizontal">
                                <dt>Name :</dt>
                                <dd>{{ $dep_data->child_name }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Age :</dt>
                                <dd>{{ $dep_data->child_age }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>School :</dt>
                                <dd>{{ $dep_data->child_school }}</dd>
                            </dl>
                        </div> 
                        @endforeach
                        @endif


                        @if($career_project_data->count() > 0)
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Project Details</h3> 
                        @foreach( $career_project_data as $project_data )
                        <div class="col-xs-6" style="padding:10px;">  
                            <dl class="dl-horizontal">
                                <dt>Company :</dt>
                                <dd>{{ $project_data->company }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Description :</dt>
                                <dd>{{ $project_data->description }}</dd>
                            </dl> 
                        </div> 
                        @endforeach
                        @endif


                        @if($career_work_exp_data->count() > 0)
                        <div style="clear:both;"></div>
                        <h3 class="box-title text-navy">Work Experience Details</h3> 
                        @foreach( $career_work_exp_data as $exp_data )
                        <div class="col-xs-6" style="padding:10px;">  
                            <dl class="dl-horizontal">
                                <dt>Company :</dt>
                                <dd>{{ $exp_data->company }}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Description :</dt>
                                <dd>{{ $exp_data->description }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Period Of Service :</dt>
                                <dd>{{ $exp_data->periodofservice }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Location :</dt>
                                <dd>{{ $exp_data->location }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Nature Of Job :</dt>
                                <dd>{{ $exp_data->natureofjob }}</dd>
                            </dl> 
                            <dl class="dl-horizontal">
                                <dt>Salary Drawn :</dt>
                                <dd>{{ $exp_data->salary_drawn }}</dd>
                            </dl> 
                        </div> 
                        @endforeach
                        @endif

                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endsection
