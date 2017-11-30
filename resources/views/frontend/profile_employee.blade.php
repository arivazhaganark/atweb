<form role="form" method="post" name="employee" id="employee" action="{{ url('user/myprofile_emp/save') }}" style="width: 70%;">
  {{ csrf_field() }}
  <input type="hidden" name="hidid" id="hidid" value="{{ $user->id }}"> 
      <div class="tab-content">
          <div id="en" class="tab-pane fade in active">
              <div class="box box-primary">
                  <div class="box-body" style="margin-left: 50px; width: 50%;">
                      <!-- text input -->
                      <div class="form-group">
                          <label id="username">First Name <span class="text-red">*</span></label>
                          <input name="first_name" id="first_name" type="text" class="form-control" value="{{ $user->first_name }}" placeholder="First Name" value="" autocomplete="off" />
                      </div>     
                      <div class="form-group">
                          <label id="username">Last Name <span class="text-red">*</span></label>
                          <input name="last_name" id="last_name" type="text" class="form-control" value="{{ $user->last_name }}" placeholder="Last Name" value="" autocomplete="off" />
                      </div>      
                      <div class="form-group">
                          <label id="username">Email <span class="text-red">*</span></label>
                          <input name="email" id="email" type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" autocomplete="off" readonly="" />
                      </div> 
                     <div class="form-group">
                          <label id="username">Employee Id <span class="text-red">*</span></label>
                          <input name="employee_id" id="employee_id" type="text" class="form-control" placeholder="Employee Id" autocomplete="off" value="{{ $user->employee_id }}" />
                      </div>
                      <div class="form-group">
                          <label id="username">Designation <span class="text-red">*</span></label>
                          <input name="designation" id="designation" type="text" class="form-control" placeholder="Designation" autocomplete="off" value="{{ $user->designation }}" />
                      </div>
                      <div class="form-group">
                          <label id="username">Mobile <span class="text-red">*</span></label>
                          <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Mobile" value="{{ $user->mobile }}" autocomplete="off" />
                      </div>
                      <div class="form-group">
                          <label id="username">Location <span class="text-red">*</span></label>
                          <input name="location" id="location" type="text" class="form-control" placeholder="Location" value="{{ $user->location }}" autocomplete="off" />
                      </div>
                      <div class="box-footer">
                          <button class="btn btn-primary" name="btn_add_emp" id="btn_add_emp" type="button">Submit</button>
                      </div>
                      </form>
                  </div>
                  <!-- /.box-body --> 
                  <!-- /.box --> 
              </div>
          </div>                 
      </div>
</form>
<script src="{{ asset('js/pagejs/profile-employee.js?v=1.2') }}"></script>