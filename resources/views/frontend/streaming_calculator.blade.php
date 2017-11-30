<div class="uk-margin">
   <script language="JavaScript">  
      var timesRun = 0  
      var valArray = new Array()  
        
      function the_bitrate(bitrate){  
        document.calc.final_rate.value = bitrate  
      } 
        
      function FIXER(mbVal){  
        var kbVal = mbVal * 1024  
        return kbVal  
      } 
        
      function calculate(){ 
        var x = document.calc.final_rate.value  
        if (x == ''){ 
          alert('Need bit rate   please enter and try again.')
          return 0  
        } 
        var y = document.calc.record_time.value 
        var content_type =  document.calc.record_time_unit.options[document.calc.record_time_unit.selectedIndex].value  
            if (content_type == "hrs"){ 
              y = y * 60 * 60 
            } else if (content_type == "min"){  
              y = y * 60  
            } else if (content_type == "days"){ 
              y = y * 60 * 60 * 24    
            } 
        if (y == ''){ 
          alert('Need Recording Time')  
          return 0  
        } 
        var size = (((x / 8) * y) / 1024) 
        var sizek = (((x / 8) * y) )  
        var sizeg = (((x / 8) * y) / 1024 / 1024) 
        var sizet = (((x / 8) * y) / 1024 / 1024 / 1024)  
          
        valArray[timesRun] = size 
        valArray[timesRun] = sizek  
        valArray[timesRun] = sizeg  
        valArray[timesRun] = sizet  
        timesRun++  
          
        document.calc.txt_result.value = size.toFixed(2)  
        document.calc.txt_resultkb.value = sizek.toFixed(2) 
        document.calc.txt_resultgb.value = sizeg.toFixed(2) 
        document.calc.txt_resulttb.value = sizet.toFixed(2) 
      } 
        
      function disable()  
      { 
        if (document.calc.multicast.checked){ 
          document.calc.viewers.value = "1" 
          document.calc.viewers.disabled = true 
        }else{  
          document.calc.viewers.disabled = false  
        } 
      } 
        
      function calculatestream()  
      { 
        var totalminutes = document.calc.viewers.value * document.calc.viewduration.value 
      document.calc.totalminutes.value = totalminutes 
                
      var bytespersecond =  (document.calc.final_rate.value / 8)  
                    
      var maxpipek = document.calc.final_rate.value * document.calc.viewers.value 
        var maxpipem = (document.calc.final_rate.value * document.calc.viewers.value) / 1024  
        var maxpipeg = (document.calc.final_rate.value * document.calc.viewers.value) / 1024 / 1024 
                            
        var bandwidthk=totalminutes * (bytespersecond * 60)   
        var bandwidthm=totalminutes * (bytespersecond * 60) / 1024  
        var bandwidthg=totalminutes * (bytespersecond * 60) / 1024 / 1024     
        var bandwidtht=totalminutes * (bytespersecond * 60) / 1024 / 1024 / 1024  
                                        
        document.calc.streambandwidthkb.value = bandwidthk.toFixed(2) 
        document.calc.streambandwidthmb.value = bandwidthm.toFixed(2) 
        document.calc.streambandwidthgb.value = bandwidthg.toFixed(2) 
        document.calc.streambandwidthtb.value = bandwidtht.toFixed(2) 
        document.calc.maxpipewidthk.value = maxpipek.toFixed(2) 
        document.calc.maxpipewidthm.value = maxpipem.toFixed(2) 
        document.calc.maxpipewidthg.value = maxpipeg.toFixed(2) 
      } 
   </script> 
   <form name="calc" class="w-70p line-h-24">
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         What is your bit rate?</span></label>
         <div class="col-sm-6">
            <span class="bodytext">
               <select name="bit_rates" onchange="the_bitrate(this.options[this.selectedIndex].value)  ">
                  <option value=" selected=">Select Bit Rate</option>
                  <option value="250">250 kbps</option>
                  <option value="500">500 kbps</option>
                  <option value="700">700 kbps</option>
                  <option value="1000">1 Mbps</option>
                  <option value="1500">1.5 Mbps</option>
                  <option value="2000">2 Mbps</option>
                  <option value="3000">3 Mbps</option>
                  <option value="4000">4 Mbps</option>
                  <option value="6000">6 Mbps</option>
                  <option value="8000">8 Mbps</option>
                  <option value="10000">10 Mbps</option>
                  <option value="15000">15 Mbps</option>
                  <option value="35000">35 Mbps</option>
                  <option value="115000">115 Mbps (1080i50 JPEG2000)</option>
                  <option value="1500000">1.5 Gbps (1080i50 uncompressed)</option>
               </select>
            </span>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         Adjust the rate if desired</span></label>
         <div class="col-sm-6 pt-5">
            <span class="bodytext"> 
            <input type="text" class="text-right" name="final_rate" value="1" size="11"> kbps
            </span>
         </div>
      </div>
      <div class="clearfix"></div>
      <h4 class="font-14"><strong>File Recording</strong></h4>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         How long will you record?</span></label>
         <div class="col-sm-6">
            <span class="bodytext">
               <input type="number" name="record_time" style="text-align:right" value="1" size="12">
               <select name="record_time_unit">
                  <option value="days">Days</option>
                  <option value="hrs">Hours</option>
                  <option value="min" selected="selected">Minutes</option>
                  <option value="sec">Seconds</option>
               </select>
            </span>
         </div>
      </div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         Approximate Disk Space Needed is</span></label>
         <div class="col-sm-6">
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="txt_resultkb" id="txt_resultkb" size="12">
               <span class="bodytext"> KB</span>
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <span class="bodytext">
               <input name="txt_result" type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" size="12"> MB (1024 KB)</span>
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <span class="bodytext">
               <input name="txt_resultgb" type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" size="12"> GB (1024 KB)</span>
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="txt_resulttb" id="txt_resulttb" size="12">
               <span class="bodytext"> TB (1024 GB)</span>
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <span class="bodytext">
               <input type="button" value="Calculate" onclick="calculate()">
               </span>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <h4 class="font-14"><strong>Streaming Bandwidth</strong></h4>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         Multicast?</span></label>
         <div class="col-sm-6">
            <input type="checkbox" name="multicast" id="multicast" size="12" value="0" onclick="disable()">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         How many viewers will you have?</span></label>
         <div class="col-sm-6">
            <input type="text" style="text-align:right" name="viewers" id="viewers" value="1" size="12">
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         What is average duration of viewing?</span></label>
         <div class="col-sm-6 pt-5 pb-8">
            <input type="text" style="text-align:right" name="viewduration" id="viewduration" value="1" size="12"> minutes
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         Total viewing minutes:</span></label>
         <div class="col-sm-6 pt-5 pb-8">
            <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="totalminutes" id="totalminutes" size="12"> minutes
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         Maximum streaming server throughput:</span></label>
         <div class="col-sm-6">
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="maxpipewidthk" id="maxpipewidthk" size="12"> kbps  
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="maxpipewidthm" id="maxpipewidthm" size="12"> Mbps
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="maxpipewidthg" id="maxpipewidthg" size="12"> Gbps
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group pb-8">
         <label class="control-label col-sm-5">
         <span class="bodytext">
         Total bandwidth Required</span></label>
         <div class="col-sm-6">
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="streambandwidthkb" id="streambandwidthkb" size="12">
               <span class="bodytext"> KB </span>
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="streambandwidthmb" id="streambandwidthmb" size="12"> MB (1024 KB)
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="streambandwidthgb" id="streambandwidthgb" size="12"> GB (1024 MB)
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="text" style="text-align:right; background-color:#F2F2F2" disabled="disabled" name="streambandwidthtb" id="streambandwidthtb" size="12"> TB (1024 GB)
            </div>
            <div class="col-sm-12 pb-8 pt-5 pl-0px">
               <input type="button" value="Calculate" onclick="calculatestream()">
            </div>
         </div>
      </div>
</div>
</form>
