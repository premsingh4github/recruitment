@extends('index')

@section('content')

<div id="page-wrapper">
    <div class="row">
                    <div class="col-lg-12">
                        @if(@$r==1)
                         <h1 class="page-header">Resume>>Edit</h1>
                        @else
                        <h1 class="page-header">Resume Entry</h1>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Add Resume <strong>Step{{{ isset($state) ? $state : '1' }}}/8</strong>
                  @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
              </div>                   
                  <div class="panel-body" id="tabs">
                  <!-- Nav tabs -->
                  <ul class="nav nav-pills">
                      <li class=" {{{ isset($state) ? ($state == 1) ? 'active in' : '' : 'active'}}}"><a href="#personal-pills" data-toggle="tab" aria-expanded="true">Personal Info</a></li>
                      <li class="{{{ isset($state) ? ($state == 2) ? 'active' : '' : ''}}}"><a href="#education-pills" data-toggle="tab" aria-expanded="false">Educational Info</a></li>
                      <li class="{{{ isset($state) ? ($state == 3) ? 'active' : '' : ''}}}"><a href="#work-pills" data-toggle="tab" aria-expanded="false">Work Experience</a></li>
                      <li class="{{{ isset($state) ? ($state == 4) ? 'active' : '' : ''}}}"><a href="#skills-pills" data-toggle="tab" aria-expanded="false">Skills</a></li>
                      <li class="{{{ isset($state) ? ($state == 5) ? 'active' : '' : ''}}}"><a href="#language-pills" data-toggle="tab" aria-expanded="false">Language</a></li>
                      <li class="{{{ isset($state) ? ($state == 6) ? 'active' : '' : ''}}}"><a href="#additional-pills" data-toggle="tab" aria-expanded="false">Additional Info</a></li>
                      <li class="{{{ isset($state) ? ($state == 7) ? 'active' : '' : ''}}}"><a href="#upload-pills" data-toggle="tab" aria-expanded="false">Upload Resume</a></li>
                      <li class="{{{ isset($state) ? ($state == 8) ? 'active' : '' : ''}}}"><a href="#privacy-pills" data-toggle="tab" aria-expanded="false">Privacy Setting</a></li>
                  </ul>
                        <?php $country=DB::table('country')->get();
                              $ident=DB::table('identification')->get();
                              $industry=DB::table('industry')->get();
                              $currency=DB::table('currency')->get();
                              $position=DB::table('position')->get();
                              $equalification=DB::table('qualification')->get();
                              $fstudy=DB::table('fieldofstudy')->get();
                              ?>
                  <!-- Tab panes -->
                  <div class="tab-content">
                       <!-- personal-section -->
                      <div class="tab-pane fade  {{{ isset($state) ? ($state == 1) ? 'active in' : '' : 'active in'}}}" id="personal-pills">
                         {!! Form::open(array('route' => 'resume.store', 'id' => 'sign_up','class' => '','method'=> 'POST', 'files' => true)) !!}
                         <input type="hidden" name="level" value='1'>
                         <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                                        <?php 
                                        if(isset($id))
                                        $prv= DB::table('personalinformation')->where('id',$id)->first();
                                        
                                        ?>
                         <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">First Name <span class="glyphicon-asterisk"></span></label>
                                   <div class="col-xs-12">
                                       <input class="form-control" id="fname" name="fname" type="text" value="{{{@$prv->fname}}}" required >
                                    </div>
                               </div>
                           </div>
                       </div>
                       
                      <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"> Last Name <span class="glyphicon-asterisk"></span></label>
                                   <div class="col-xs-12">
                                       <input class="form-control" id="lname" name="lname" value="{{{@$prv->lname}}}" type="text"  required >
                                    </div>
                               </div>
                           </div>
                       </div>
                          <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                   
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload your Photo <span class="glyphicon-asterisk"></span></label>
                                  
                                   <div class="col-xs-12">
                                       <input class="form-control" name="resume_photo" type="file">
                                       
                                    </div>
                               </div>
                           </div>
                                 
                       </div>
                          <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload your Passport copy <span class="glyphicon-asterisk"></span></label>
                                   <div class="col-xs-12">
                                       <input class="form-control" id="passport" name="passport" type="file">
                                      
                                    </div>
                               </div>
                           </div>
                              
                       </div>
                          <div class="form-section">
                               
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box top-row ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Date of Birth <span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                  <input type="text" class="form-control calendar"  data-date-format="mm/dd/yy" name="dob" id="dp2" value="{{{@$prv->dob}}}" required >
                                              </div>
                                         </div>
                                      </div>
                                     <div class="col-sm-6 parent-box top-row ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Age <span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                  <input class="form-control" placeholder="Age year" name="age" type="text" value="{{{@$prv->age}}}" required >
                                             
                                              </div>
                                         </div>
                                      </div>
                                 </div>
                              <div class="form-group">
                                   <div class="col-sm-6 parent-box top-row ">
                                      <div class="row">
                                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Gender<span class="glyphicon-asterisk"></span></label>
                                          <div class="col-xs-12">                                    
                                              <select class="form-control" name="gender" id="gender" required >
                                                  @if(isset($prv->gender))
                                                  <option value="">Select</option>
                                                  <option <?php echo ($prv->gender == "Male")?'selected':'' ; ?> value="Male" >Male</option>
                                                  <option <?php echo ($prv->gender == "Female")?'selected':'' ; ?> value="Female">Female</option>
                                                  @else
                                                  <option selected value="">Select</option>
                                                  <option value="Male" >Male</option>
                                                  <option value="Female">Female</option>
                                                  @endif
                                              </select>
                                          </div>
                                         
                                      </div>
                                    </div>
                                  <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Height<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" placeholder="Height ft." name="height" type="text" value="{{{@$prv->height}}}" required >
                                              </div>
                                         </div>
                                     </div>
                                  </div>
                                 
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Email<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" name="email" type="email" maxlength="100" value="{{{@$prv->email}}}" required >
                                              </div>
                                         </div>
                                     </div>
                                 
                              
                                     <div class="col-sm-6 parent-box top-row ">
                                        <div class="row">
                                            <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Nationality<span class="glyphicon-asterisk"></span></label>
                                            <div class="col-xs-12">                                    
                                                <select class="form-control" name="nationality" id="nationality" required >
                                                    
                                                    @if(isset($prv->nationality))                                                        
                                                         <option selected value="{{{$prv->nationality}}}" >{{{$prv->nationality}}}</option>
                                                   @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                     @else
                                                   <option selected disabled value="">Select </option>
                                                    @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                   @endif
                                                </select>
                                            </div>
                                           
                                        </div>
                                      </div>
                                 </div>
                                 
                             
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Mobile Number<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" id="mobile" name="mobile" type="text" value="{{{@$prv->mobile}}}" required >
                                              </div>
                                         </div>
                                     </div>
                                 </div>
                                 
                                <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email">Other Number</label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" id="onumber" name="onumber" type="text" value="{{{@$prv->onumber}}}">
                                              </div>
                                         </div>
                                     </div>
                                 </div>
             <div class="form-group">
             <div class="col-sm-6 parent-box ">
               <div class="row">
                 <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Present Address<span class="glyphicon-asterisk"></span></label>
                 <div class="col-xs-12">
                   <input class="form-control" id="raddress1" name="raddress1" type="text" maxlength="100" value="{{{@$prv->raddress1}}}" required >
                 </div>
               </div>
             </div>
                 <div class="col-sm-6 parent-box ">
               <div class="row">
                 <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Permanent Address<span class="glyphicon-asterisk"></span></label>
                 <div class="col-xs-12">
                   <input class="form-control" id="raddress1" name="raddress2" type="text" maxlength="100" value="{{{@$prv->raddress2}}}" required >
                 </div>
               </div>
             </div>
          </div>
            
                                 
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email">City<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" id="city" name="city" type="text" value="{{{@$prv->city}}}" maxlength="100" required >
                                              </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email">Postal Code<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" id="postal_code" name="postal_code" type="text" value="{{{@$prv->postal_code}}}" maxlength="100" required>
                                              </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                   <div class="col-sm-6 parent-box top-row ">
                                      <div class="row">
                                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Country<span class="glyphicon-asterisk"></span></label>
                                          <div class="col-xs-12"> 
                                              
                                              <select class="form-control" name="country" id="country" required >
                                                @if(isset($prv->country))                                                        
                                                         <option selected value="{{{$prv->country}}}" >{{{$prv->country}}}</option>
                                                 @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                  @else
                                                  <option selected disabled value="">Select </option>
                                                  @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                  @endif
                                              </select>
                                          </div>
                                         
                                      </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">State/Region<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" id="state" name="state" type="text" maxlength="100" value="{{{@$prv->state}}}" required >
                                              </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                   <div class="col-sm-6 parent-box top-row ">
                                      <div class="row">
                                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Identification<span class="glyphicon-asterisk"></span></label>
                                          <div class="col-xs-12">                                    
                                              <select class="form-control" name="identification" id="identification" required >
                                                  @if(isset($prv->identification))                                                        
                                                         <option selected value="{{{$prv->identification}}}" >{{{$prv->identification}}}</option>
                                                   @if(@$ident) 
                                                  @foreach($ident as $iden)
                                                   <option value="{{@$iden->name}}">{{@$iden->name}}</option>
                                                  @endforeach
                                                  @endif
                                                 
                                                     @else
                                                  <option selected disabled value="">Select </option> 
                                                    @if(@$ident) 
                                                  @foreach($ident as $iden)
                                                   <option value="{{@$iden->name}}">{{@$iden->name}}</option>
                                                  @endforeach
                                                  @endif
                                                 
                                                 @endif
                                              </select>
                                          </div>
                                         
                                      </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                             <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Identification Number<span class="glyphicon-asterisk"></span></label>
                                             <div class="col-xs-12">
                                                 <input class="form-control" id="inumber" name="inumber" type="text" maxlength="100" value="{{{@$prv->inumber}}}" required >
                                              </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                           <!--<a href="#education-pills" data-toggle="tab" class="button gform_button big nexttab"><input type="button" class="btn btn-success btn-md" value="save and continue"></a>--> 
                            <input type="submit" class="btn btn-success btn-md"  value="save and continue">
                        </div>
                                         </div>
                            </div></div>
                       {!! Form::close() !!}   
                      </div>
                                <!-- Education-section -->
                       <div class="tab-pane fade {{{ isset($state) ? ($state == 2) ? 'active in' : '' : ''}}}" id="education-pills">
                          {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '','method'=> 'POST', 'files' => true]) !!}
                          <input type="hidden" name="level" value='2'>
                          <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                                      @if(@$id)  
                                        <?php 
                                         $prv1= DB::table('educationinformation')->where('pid',$id)->get(); ?> 
                                        @endif
                          <!--new code start for education -->
                          @if(@$prv1)
                           <div id="educationContainer">                        
                             <?php $e=0; ?>
                             @foreach($prv1 as $sprv1)
                            <?php  $e=$e+1;?>
                              <div class="form-group">
                              <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Qualification </label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="<?php echo 'qualification_'.$e;?>" id="qualification">
                                                   @if(@$sprv1->degree)
                                                   <option selected value="{{@$sprv1->degree}}">{{@$sprv1->degree}}</option>
                                                  @if(@$equalification) 
                                                  @foreach($equalification as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                   @else
                                                  <option selected value="">- Select Qualification -</option>
                                                  @if(@$equalification) 
                                                  @foreach($equalification as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                  @endif
                                         </select>
                                     </div>                                    
                                 </div>
                               </div>
                               
                                <div class="col-sm-6 parent-box ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">College/School</label>
                                        <div class="col-xs-12">
                                            <input class="form-control" id="school" name="<?php echo 'school_'.$e;?>" type="text" maxlength="100" value="{{{@$sprv1->school}}}">
                                         </div>
                                    </div>
                                </div>                            
                            </div>
                       <div class="form-group">
                                <div class="col-sm-6 parent-box ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left " id="lbl_email" aria-required="true">Institute/University</label>
                                        <div class="col-xs-12">
                                            <input class="form-control" id="university" name="<?php echo 'university_'.$e;?>" type="text" maxlength="100" value="{{{@$sprv1->board}}}">
                                         </div>
                                    </div>
                                </div>
                                 <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Institute/University Location </label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="<?php echo 'ulocation_'.$e;?>" id="ulocation">
                                              
                                                  @if(@$sprv1->ulocation)
                                                   <option selected value="{{@$sprv1->ulocation}}">{{@$sprv1->ulocation}}</option>
                                                  @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif    
                                                  @else
                                                  <option selected value="">- Select Location -</option>
                                                  @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif    
                                                  @endif
                                         </select>
                                     </div>                                    
                                 </div>
                               </div>                                                          
                            </div>                       
                        
                            <div class="form-group">
                              <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Field of Study</label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="<?php echo 'fieldofstudy_'.$e;?>" id="fieldofstudy">
                                             @if(@$sprv1->study_field)
                                             <option selected value="{{@$sprv1->study_field}}">{{@$sprv1->study_field}}</option>
                                                  @if(@$fstudy) 
                                                  @foreach($fstudy as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                             @else
                                             <option selected value="">- Select Field -</option>
                                                  @if(@$fstudy) 
                                                  @foreach($fstudy as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                  @endif
                                         </select>
                                     </div>
                                    
                                 </div>
                               </div>
                           
                                <div class="col-sm-6 parent-box ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Major</label>
                                        <div class="col-xs-12">
                                            <input class="form-control" id="major" name="<?php echo 'major_'.$e;?>" type="text" maxlength="100" value="{{{@$sprv1->major}}}">
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Percentage/CGPA </label>
                                     <div class="col-xs-12">                                    
                                         <input class="form-control" id="grade" name="<?php echo 'grade_'.$e;?>" type="text" maxlength="100" value="{{{@$sprv1->grade}}}">
                                         
                                     </div>
                                    
                                 </div>
                               </div>
                                 <div class="col-sm-6 parent-box top-row ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Graduation Year</label>
                                        
                                        
                                        <div class="col-xs-12">
                                            <input class="form-control" id="gyear" name="<?php echo 'gyear_'.$e;?>" type="number" pattern="[0-9]*" min="0" maxlength="4"  placeholder="Year" value="{{{@$sprv1->gyear}}}" >
                                        </div>
                                    </div>
                                   </div>
                            </div>
                             
                            @endforeach
                           </div>
                          <input type="hidden" id="educationCount" name="educationCount" value="<?php echo $e;?>" />
                           <div class="form-group">
                           <div class="col-sm-12 parent-box ">
                               <div class="row">
                                   <a id="addEducation" data-toggle="tab" aria-expanded="false">Add Education</a>
                               </div>
                           </div>
                          </div>
                          @else
                          <input type="hidden" id="educationCount" name="educationCount" value="1" />
                          <div id="educationContainer">
                             <div class="form-group">
                              <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Qualification </label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="qualification_1" id="qualification">
                                                     
                                             <option selected value="">- Select Qualification -</option>
                                                    @if(@$equalification) 
                                                  @foreach($equalification as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                         </select>
                                     </div>                                    
                                 </div>
                               </div>
                               
                                <div class="col-sm-6 parent-box ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">College/School</label>
                                        <div class="col-xs-12">
                                            <input class="form-control" id="school" name="school_1" type="text" maxlength="100" value="">
                                         </div>
                                    </div>
                                </div>                            
                            </div>
                       <div class="form-group">
                                <div class="col-sm-6 parent-box ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left " id="lbl_email" aria-required="true">Institute/University</label>
                                        <div class="col-xs-12">
                                            <input class="form-control" id="university" name="university_1" type="text" maxlength="100" value="">
                                         </div>
                                    </div>
                                </div>
                                 <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Institute/University Location </label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="ulocation_1" id="ulocation">
                                              <option selected value="">- Select Location -</option>
                                               @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif                                            
                                         </select>
                                     </div>                                    
                                 </div>
                               </div>                                                          
                            </div>                       
                        
                            <div class="form-group">
                              <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Field of Study</label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="fieldofstudy_1" id="fieldofstudy" >
                                              
                                             <option selected value="">- Select Field -</option>
                                                  @if(@$fstudy) 
                                                  @foreach($fstudy as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                            
                                         </select>
                                     </div>
                                    
                                 </div>
                               </div>
                           
                                <div class="col-sm-6 parent-box ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Major</label>
                                        <div class="col-xs-12">
                                            <input class="form-control" id="major" name="major_1" type="text" maxlength="100" value="">
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Percentage/CGPA </label>
                                     <div class="col-xs-12">                                    
                                         <input class="form-control" id="grade" name="grade_1" type="text" maxlength="100" value="">
                                         
                                     </div>
                                    
                                 </div>
                               </div>
                                 <div class="col-sm-6 parent-box top-row ">
                                    <div class="row">
                                        <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Graduation Year</label>
                                        
                                        
                                        <div class="col-xs-12">
                                            <input class="form-control" id="gyear" name="gyear_1" type="number" pattern="[0-9]*" min="0" maxlength="4"  placeholder="Year" value="" >
                                        </div>
                                    </div>
                                   </div>
                            </div>
                       </div>
                          <!--new code end for education -->
                           <div class="form-group">
                           <div class="col-sm-12 parent-box ">
                               <div class="row">
                                   <a id="addEducation" data-toggle="tab" aria-expanded="false">Add Education</a>
                               </div>
                           </div>
                       </div>
                          @endif
                            <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                                                  <input type="submit" class="btn btn-success btn-md" value="save and continue">
                                              </div></div></div></div>
                                              {!! Form::close() !!}  
                      </div> 
                       <!-- work-section -->
                       <div class="tab-pane fade {{{ isset($state) ? ($state == 3) ? 'active in' : '' : ''}}}" id="work-pills">
                          
                        
                        {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '','method'=> 'POST', 'files' => true]) !!}
                        <input type="hidden" name="level" value='3'>
                        <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                        <?php            
                                        if(isset($id))
                                        $prv2= DB::table('experienceinformation')->where('pid',$id)->first();
                                        ?> 
                        <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Position Title <span class="glyphicon-asterisk"></span></label>
                                    <div class="col-xs-12">
                                        <input class="form-control" id="position_title" name="position_title" type="text" maxlength="100" value="{{{@$prv2->position_title}}}">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Company Name</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" id="company_name" name="company_name" type="text" maxlength="100" value="{{{@$prv2->company_name}}}">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Work Duration</label>
                                    
                                </div>
                            </div>
                        <div class="col-sm-6 parent-box top-row ">
                              <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Total Year of Experience</label>
                                  
                                  <div class="col-xs-12">
                                      <input type="text" class="form-control" name="experience" value="{{{@$prv2->experience}}}">
                                   </div>
                                  
                              </div>
                             </div>
                            <div class="col-sm-3 parent-box top-row ">
                              <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">From</label>
                                  
                                  <div class="col-xs-12">
                                      <input type="text" class="form-control calendar"  data-date-format="mm/dd/yy" name="from_date" value="{{{isset($prv2->from_date)?date("Y-m-d",strtotime($prv2->from_date)):''}}}">
                                   </div>
                                  
                              </div>
                             </div>
                        
                            <div class="col-sm-3 parent-box top-row ">
                              <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">To</label>
                                  
                                  <div class="col-xs-9">
                                      <input type="text" class="form-control calendar"  data-date-format="mm/dd/yy" name="to_date" <?php if(@$prv2->to_date!=1) { ?>value="{{{isset($prv2->to_date)?date("Y-m-d",strtotime($prv2->to_date)):''}}}"<?php } ?>>
                                   </div>
                                  
                                  <div class="col-xs-3"><input type="checkbox" name="wpresent" value="{{{@$prv2->to_date}}}" <?php if(@$prv2->to_date){echo (@$prv2->to_date==1)?"checked":"" ;}?>>Present</div>
                              </div>
                             </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Specialization</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" id="specialization" name="specialization" type="text" maxlength="100" value="{{{@$prv2->specialization}}}">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Role</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" name="role" type="text" maxlength="100" value="{{{@$prv2->role}}}">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Country</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" name="country" type="text" maxlength="100" value="{{{@$prv2->workcountry}}}">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6 parent-box top-row ">
                             <div class="row">
                                 <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Industry </label>
                                 <div class="col-xs-12">                                    
                                     <select class="form-control" name="industry" id="industry">
                                         @if(isset($prv2->industry))                                                        
                                              <option selected value="{{{$prv2->industry}}}" >{{{$prv2->industry}}}</option>
                                                  @if(@$industry) 
                                                  @foreach($industry as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                              @else 
                                         <option selected disabled value="">- Select -</option>                                         
                                                  @if(@$industry) 
                                                  @foreach($industry as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                         @endif

                                   </select>
                                 </div>
                                
                             </div>
                           </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6 parent-box top-row ">
                             <div class="row">
                                 <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Position Level </label>
                                 <div class="col-xs-12">                                    
                                     <select class="form-control" name="position_level" id="position_level">
                                         @if(isset($prv2->position_level))                                                        
                                              <option selected value="{{{$prv2->position_level}}}" >{{{$prv2->position_level}}}</option>
                                          @if(@$position) 
                                                  @foreach($position as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                              @else 
                                         <option selected disabled value="">- Select -</option>

                                                  @if(@$position) 
                                                  @foreach($position as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                  @endif
                                   </select>
                                 </div>
                                
                             </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 parent-box top-row ">
                              <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Monthly Salary <span class="glyphicon-asterisk"></span></label>
                                  
                                  <div class="col-xs-5">
                                      <select class="form-control" id="monthly_salary" name="currency" data-placeholder="Month" tabindex="-1" >
                                           @if(isset($prv2->currency))                                                        
                                              <option selected value="{{{$prv2->currency}}}" >{{{$prv2->currency}}}</option>
                                                 @if(@$currency) 
                                                  @foreach($currency as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                              @else
                                          <option selected disabled value="">Currency</option>
                                                 @if(@$currency) 
                                                  @foreach($currency as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif @endif
                                      </select>
                                   </div>
                                  <div class="col-xs-7">
                                      <input class="form-control" id="salary" name="salary" type="number" pattern="[0-9]*" min="0" value="{{{@$prv2->salary}}}" >
                                  </div>
                              </div>
                             </div>
                        </div>
                        <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload your Experience Certificate</label>
                                   <div class="col-xs-12">
                                       <input class="form-control" id="exp_certificate" name="exp_certificate" type="file">
                                    </div>
                               </div>
                           </div>
                       </div>

                         <div class="form-group">
                            <div class="col-sm-12 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                                                  <input type="submit" class="btn btn-success btn-md" value="save and continue">
                                              </div></div></div></div>
                                              {!! Form::close() !!}
                      </div> <!--
                      <!-- Skills-section -->
                      
           <div class="tab-pane fade {{{ isset($state) ? ($state == 4) ? 'active in' : '' : ''}}}" id="skills-pills">
                     {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '','method'=> 'POST', 'files' => true]) !!}
                     <input type="hidden" name="level" value='4'>
                     <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                        
                         <?php            
                                        if(isset($id))
                                        $prv3= DB::table('skillsinformation')->where('pid',$id)->get();
                                        ?> 
                     @if(@$prv3)
                     <div id="skillContainer">
                        
                     <?php $i=0; ?>
                         @foreach($prv3 as $sprv3)
                   <?php  $i=$i+1;?>
                     
                    
                         <div class="form-group ">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Skills</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="skills" name="<?php echo 'skill_'.$i;?>" type="text" value="{{{$sprv3->skills}}}">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"> Proficiency</label>
                                     <div class="col-xs-12">
                                         <select class="form-control" name="<?php echo 'proficiency_'.$i;?>" >
                                              @if(isset($sprv3->proficiency))                                                        
                                              <option selected value="{{{$sprv3->proficiency}}}" >{{{$sprv3->proficiency}}}</option>
                                              <option value="Beginner" >Beginner</option>
                                             <option value="Novice">Novice</option>
                                             <option value="Expert">Expert</option>
                                              @else
                                             <option selected disabled value="">Select </option>
                                             <option value="Beginner" >Beginner</option>
                                             <option value="Novice">Novice</option>
                                             <option value="Expert">Expert</option>
                                             @endif
                                         </select> </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group ">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Objective</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="sobjective" name="<?php echo 'sobjective_'.$i;?>" type="text" value="{{{@$sprv3->sobjective}}}">
                                     </div>
                                 </div>
                             </div>
                               <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Institute</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="institute" name="<?php echo 'institute_'.$i;?>" type="text" value="{{{@$sprv3->institute}}}">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group col-sm-12">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload your Skills Certificate</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="skills_certificate" name="<?php echo 'skills_certificate_'.$i;?>" type="file">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                   
                     </div>
                     <input type="hidden" id="skillCount" name="skillCount" value="<?php echo $i;?>" />
                    <div class="form-group">
                           <div class="col-sm-12 parent-box ">
                               <div class="row">
                                   <a id="addSkill" data-toggle="tab" aria-expanded="false">Add Skills</a>
                               </div>
                           </div>
                       </div>
                     @else
                          
                     <input type="hidden" id="skillCount" name="skillCount" value="1" />
                     <div id="skillContainer">
                         <div class="form-group ">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Skills</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="skills" name="skill_1" type="text">
                                     </div>
                                 </div>
                             </div>
                                <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"> Proficiency</label>
                                     <div class="col-xs-12">
                                         <select class="form-control" name="proficiency_1" >
                                             <option selected value="">Select </option>
                                             <option value="Beginner" >Beginner</option>
                                             <option value="Novice">Novice</option>
                                             <option value="Expert">Expert</option>
                                         </select> </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group ">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Objective</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="sobjective" name="sobjective_1" type="text">
                                     </div>
                                 </div>
                             </div>
                               <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Institute</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="institute" name="institute_1" type="text">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group col-sm-12">
                             <div class="col-sm-6 parent-box ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload your Skills Certificate</label>
                                     <div class="col-xs-12">
                                         <input class="form-control" id="skills_certificate" name="skills_certificate_1" type="file">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                       
                       
                     <div class="form-group">
                           <div class="col-sm-12 parent-box ">
                               <div class="row">
                                   <a id="addSkill" data-toggle="tab" aria-expanded="false">Add Skills</a>
                               </div>
                           </div>
                       </div>
               @endif
                       <div class="form-group">
                            <div class="col-sm-12 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                              <input type="submit" class="btn btn-success btn-md" value="save and continue">
                                              </div></div></div></div>   
                                            {!! Form::close() !!}
            </div>
                      <!-- Language-section -->
                       <div class="tab-pane fade {{{ isset($state) ? ($state == 5) ? 'active in' : '' : ''}}}" id="language-pills">

                            {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '']) !!}
                            <input type="hidden" name="level" value='5'>
                            <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                           <?php         
                                        if(isset($id))
                                        $prv4= DB::table('languageinformation')->where('pid',$id)->get();
                                        ?> 
                             @if(@$prv4)
                              <div id="languagaContainer">
                                         <?php $i=0; ?>
                         @foreach($prv4 as $lprv4)
                           <?php  $i=$i+1;?>
                         <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required ." . aria-required="true">Language <span class="glyphicon-asterisk"></span></label>
                                  <div class="col-xs-12">
                                    <input class='form-control'  name="<?php echo('language_'.$i); ?>" type='text' value="{{{$lprv4->language}}}" required >
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Spoken <span class="glyphicon-asterisk"></span></label>
                                    
                                  <div class="col-xs-12">
                                     <select class="form-control"  name="<?php echo('lspoken_'.$i); ?>"tabindex="-1" required>
                                        @if(isset($lprv4->lspoken))                                                        
                                              <option selected value="{{{$lprv4->lspoken}}}" >{{{$lprv4->lspoken}}}</option>
                                         <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                          @else
                                         <option selected disabled value="">select</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        @endif
                                      </select>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Written <span class="glyphicon-asterisk"></span></label>
                                    <div class="col-xs-12">
                                    <select class="form-control" id="lwritten" name="<?php echo('lwritten_'.$i); ?>" tabindex="-1" required>
                                      @if(isset($lprv4->lwritten))                                                        
                                              <option selected value="{{{$lprv4->lwritten}}}" >{{{$lprv4->lwritten}}}</option>
                                         <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                          @else
                                         <option selected disabled value="">select</option>
                                       <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        @endif
                                    </select>
                                    </div>
                                  </div>
                                </div>                                
                              </div>  
                            <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Reading <span class="glyphicon-asterisk"></span></label>
                                    <div class="col-xs-12">
                                    <select class="form-control" id="lreading" name="<?php echo('lreading_'.$i); ?>" tabindex="-1" required>
                                      @if(isset($lprv4->lreading))                                                        
                                              <option selected value="{{{$lprv4->lreading}}}" >{{{$lprv4->lreading}}}</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                          @else
                                         <option selected disabled value="">select</option>
                                        <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                        @endif
                                    </select>
                                    </div>
                                  </div>
                                </div>                                
                              </div>   
                         @endforeach
                         </div>              
                             <input type="hidden" name="languageCount" id="languageCount" value="<?php echo $i;?>">
                              <a id="addLanguage" data-toggle="tab" aria-expanded="false">Add Language</a>
                         @else
                               <input type="hidden" name="languageCount" id="languageCount" value="1">
                            <div id="languagaContainer">
                            <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required ." . aria-required="true">Language <span class="glyphicon-asterisk"></span></label>
                                  <div class="col-xs-12">
                                    <input class='form-control'  name='language_1' type='text' required>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Spoken <span class="glyphicon-asterisk"></span></label>
                                    
                                  <div class="col-xs-12">
                                     <select class="form-control"  name="lspoken_1"tabindex="-1" required>
                                        <option selected disabled value="">select</option>
                                       <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Written <span class="glyphicon-asterisk"></span></label>
                                    <div class="col-xs-12">
                                    <select class="form-control" id="lwritten" name="lwritten_1" tabindex="-1" required>
                                      <option selected disabled value="">select</option>
                                     <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                    </select>
                                    </div>
                                  </div>
                                </div>                                
                              </div>    
                                <div class="form-group">
                              <div class="col-sm-3 parent-box ">
                                <div class="row">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Reading <span class="glyphicon-asterisk"></span></label>
                                    <div class="col-xs-12">
                                    <select class="form-control" id="lreading" name="lreading_1" tabindex="-1" required>
                                      <option selected disabled value="">select</option>
                                      <option value="Excellent">Excellent</option>
                                        <option value="Good">Good</option>
                                        <option value="Average">Average</option>
                                    </select>
                                    </div>
                                  </div>
                                </div>                                
                              </div>  
                              </div>
                            

                              <a id="addLanguage" data-toggle="tab" aria-expanded="false">Add Language</a>
                              @endif
                              <div class="form-group">
                                <div class="col-sm-12 parent-box ">
                                 <div class="row">
                                  <div class="col-xs-12">
                                    <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>

                                    <input type="submit" class="btn btn-success btn-md" value="save and continue">
                                  </div></div></div></div>
                                  {!! Form::close() !!}
                                </div>
                      <!-- Additional-section -->
                      <div class="tab-pane fade {{{ isset($state) ? ($state == 6) ? 'active in' : '' : ''}}}" id="additional-pills">
                      {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '','method'=> 'POST', 'files' => true]) !!}
                      <input type="hidden" name="level" value='6'>
                      <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                       <?php            
                                        if(isset($id))
                                        $prv5= DB::table('additionalinformation')->where('pid',$id)->first();
                                        
                                        ?> 
                       <div class="form-group">
                         <div class="col-sm-6 parent-box top-row ">
                              <div class="row">
                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Expected Salary</label>
                                  
                                  <div class="col-xs-5">
                                      <select class="form-control" id="monthly_salary" name="currency" data-placeholder="Month" tabindex="-1">
                                          
                                           @if(isset($prv5->currency))                                                        
                                              <option selected value="{{{$prv5->currency}}}" >{{{$prv5->currency}}}</option>
                                                 @if(@$currency) 
                                                  @foreach($currency as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                              @else
                                          <option selected value="">Currency</option>
                                                   @if(@$currency) 
                                                  @foreach($currency as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                                  @endif
                                      </select>
                                   </div>
                                  <div class="col-xs-7">
                                      <input class="form-control" id="salary" name="salary" type="number" pattern="[0-9]*" min="0" value='{{{@$prv5->salary}}}'>
                                  </div>
                              </div>
                             </div>
                       </div>
                          <div class="col-sm-6 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Prefered Work Location</label>
                                     <div class="col-xs-12">                                    
                                         <select class="form-control" name="prefered_location">
                                             @if(isset($prv5->preferred_location))                                                        
                                              <option selected value="{{{$prv5->preferred_location}}}" >{{{$prv5->preferred_location}}}</option>
                                                   @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                              @else
                                             <option selected value="">- Select Location -</option>
                                               @if(@$country) 
                                                  @foreach($country as $coun)
                                                   <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                                  @endforeach
                                                  @endif
                                              @endif
                                         </select>
                                         <!--<div class="col-xs-2"><input type="checkbox">I Want to work in any location</div>-->
                                     </div>
                                    
                                 </div>
                               </div>
                          <div class="form-group">
                              <div class="col-sm-12 parent-box top-row ">
                                 <div class="row">
                                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Career Objective </label>
                                     <div class="col-xs-12">                                    
                                         <div class="col-sm-12">
                                           <textarea class="form-control" id="add_information" name="add_information" index="1" rows="10" value='{{{@$prv5->add_information}}}'>{{{@$prv5->add_information}}}</textarea>
                                          </div>
                                     </div>
                                    
                                 </div>
                               </div>
                            </div>
                          <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                   <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload Other Supportive Document</label>
                                   <div class="col-xs-12">
                                       <input class="form-control" name="sdocument" type="file" >
                                    </div>
                               </div>
                           </div>
                       </div>
                      <div class="form-group">
                            <div class="col-sm-12 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                              <input type="submit" class="btn btn-success btn-md" value="save and continue">
                                              </div></div></div></div>
                                              {!! Form::close() !!}
                      </div>
                      <!-- upload-section -->
                      <div class="tab-pane fade {{{ isset($state) ? ($state == 7) ? 'active in' : '' : ''}}}" id="upload-pills">
                        {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '','method'=> 'POST', 'files' => true]) !!}
                        <input type="hidden" name="level" value='7'>
                        <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}">
                         <?php            
                                        if(isset($id))
                                        $prv6= DB::table('uploadinformation')->where('pid',$id)->first();
                                        ?> 
                       <div class="form-group">
                           <div class="col-sm-6 parent-box ">
                               <div class="row">
                                  
                                   <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Upload your Resume </label>
                             
                                   <div class="col-xs-6">
                                       <input class="form-control" name="uresume" type="file" >
                                       </div>
                                      @if ($errors->has('uresume')) <p class="help-block">{{ $errors->first('uresume') }}</p> @endif
                                       @if(@$prv6->uresume!='')
                                       <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true">Previous Resume </label>
                                       <?php $path=url().'/upload/'.$prv6->uresume;?>
                                        <div class="col-xs-6">
                                       <a href="{{url()}}/upload/{{$prv6->uresume}}">{{$prv6->uresume}}</a>
                                        </div>
                                       @if(file_exists($path))
<!--                                        <div class="col-xs-12">
                                       <a href="{{url()}}/upload/{{$prv6->uresume}}">{{$prv6->uresume}}</a>
                                        </div>-->
                                       @endif
                                       @endif
                                 
                               </div>
                           </div>
                       </div>
                      <div class="form-group">
                            <div class="col-sm-12 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                              <input type="submit" class="btn btn-success btn-md" value="save and continue">
                                              </div></div></div></div> 
                                              {!! Form::close() !!} 
            </div>
                      <!-- privacy-section -->
                      <div class="tab-pane fade {{{ isset($state) ? ($state == 8) ? 'active in' : '' : ''}}}" id="privacy-pills">
                       {!! Form::open(['route' => 'resume.store', 'id' => 'sign_up','class' => '']) !!}
                       <input type="hidden" name="level" value='8'>
                       <input type="hidden" name="resumeId" value="{{{ isset($id) ? $id : '0' }}}"> 
                       <?php            
                                        if(isset($id))
                                        $prv7= DB::table('privacyinformation')->where('pid',$id)->first();
                                        ?> 
                      <input name="privacy" type="radio"  value="1" <?php if(@$prv7->privacy){echo (@$prv7->privacy==1)?"checked":"" ;}?> required >Searchable with contact Details
                       <input name="privacy" type="radio" value="0" <?php if(@$prv7->privacy){echo (@$prv7->privacy==0)?"checked":"" ;}?> required >No Searchable
                                     
                        <div class="form-group">
                            <div class="col-sm-12 parent-box ">
                                         <div class="row">
                                              <div class="col-xs-12">
                                                  <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
                                            
                          <button type="submit" class="btn btn-primary">Submit</button>               
                          </div></div></div></div> 
                          {!! Form::close() !!}    
            </div> 
                      <!-- privacy-section end--> 
                  </div>
              
             </div>
                  <!-- <input type="submit" name="submit" class="btn btn-success btn-md" role="button"> -->
              
           



              <!-- /.panel-body -->
          </div>
         
          <!-- /.panel -->
<!----------------------------------------------------------->
                                                    @if(@$id==0)
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            List of Latest Resume
                                                        </div>
                                                        
                                         {!! Form::open(['route' => 'resume.destroy','method' => 'DELETE', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}    
                                        <table class="table table-striped table-bordered table-hover" style="font-size:0.85em">
                                        <thead>
                                            <tr role="row">
                                                <th width='4%'></th>
                                            	<th width='16%'>Employee Name</th>
                                            	<th width='40%'>Employee Address</th>
                                                <th width='10%'>Experience</th>
                                            	<th width='15%'>Attachment</th>
                                            	<th width='15%'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!--  -->
                                        @if(isset($resumep))
                                         @foreach($resumep as $resum)
                                         <?php // $pid= $resum->id;
//                                         $work = DB::table('experienceinformation')->where('pid',$pid)->first();
//                                         $edu = DB::table('educationinformation')->where('pid',$pid)->first();
                                              
                                         ?>
                                         <tr class="gradeA odd" role="row">
                                             <td> {!! Form::checkbox('resume[]',$resum->id)!!}</td>
                                                <td class="sorting_1">{{$resum->fname}} {{$resum->lname}}</td>
                                                <td>{{$resum->raddress1}},{{$resum->country}},{{$resum->mobile}},{{$resum->email}}</td>
                                                
                                                <td>{{{isset($resum->from_date)?$resum->from_date:''}}}-{{{isset($resum->to_date)?($resum->to_date==1)?"present":$resum->to_date:''}}}</td>
                                                <td>
                                                    <ul>
                                                         <?php 
                                                             $cv=DB::table('uploadinformation')->where('pid',$resum->id)->first();
                                                             $skil=DB::table('skillsinformation')->where('pid',$resum->id)->get();
                                                             $other=DB::table('additionalinformation')->where('pid',$resum->id)->first();
                                                            ?>
                                                        @if(@$cv->uresume!='')
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$cv->uresume;?>
                                                            <a href="{{url()}}/upload/{{@$cv->uresume}}">CV</a>
                                                        </li>
                                                        @endif
                                                        @if(@$resum->passport!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$resum->passport;?>
                                                            <a href="{{url()}}/upload/{{@$resum->passport}}">Passport</a>
                                                        </li>
                                                        @endif
                                                        @if(@$resum->resume_certificate!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$resum->resume_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$resum->resume_certificate}}">Certificate</a>
                                                        </li>
                                                        @endif
                                                         @if(@$resum->experience_certificate!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$resum->experience_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$resum->experience_certificate}}">Exp_Certificate</a>
                                                        </li>
                                                        @endif
                                                        @foreach($skil as $sk)
                                                         @if(@$sk->skills_certificate!='')
                                                         <?php $i=1; ?>
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$sk->skills_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$sk->skills_certificate}}"><?php echo "Skill_".$i; $i++;?></a>
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                        @if(@$other->sdocument!='')
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$other->sdocument;?>
                                                            <a href="{{url()}}/upload/{{@$other->sdocument}}">other</a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="#"><button class="btn-xs btn-warning custom" onclick="window.open('{{url()}}/resume/{{$resum->id}}','newWin','width=800,height=600')">View</button></a>                        
                                               <!-- <a href=""><button type="button" class="btn-xs btn-danger">Expert</button></a> -->
                                                @if(Auth::user()->type==3||(Auth::user()->type==1 && Auth::user()->loginas!=2))
                                                <a href="{{url()}}/resume/{{{$resum->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-danger custom">Edit</button></a>
                                                 
                                               <!--{!! Form::open(['method' => 'DELETE','route' => ['resume.destroy',$resum->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger']) !!}
                                                     {!! Form::close() !!}-->
                                                @endif 
                                               @if($resum->approved_by!=0 && $resum->approval_status!=1)
                                                <a href=""><button type="button" class="btn-xs btn-primary custom">Requested</button></a>
                                           
                                                @elseif($resum->approved_by!=0 && $resum->approval_status==1)
                                                <a href="{{url()}}/approval/{{{$resum->id}}}"><button type="button" class="btn-xs btn-success custom">Approved</button></a>
                                                @else
                                                <!--<a href=""><button type="button" class="btn-xs btn-primary">Request</button></a>-->
                                                @endif 
                                                
                                              
                                                </td>
                                                <!-- <td class="center"><a href=""><button type="button" class="btn-xs btn-primary">export</button></a> <a href=""><button type="button" class="btn-xs btn-warning">edit</button></a> <a href=""><button type="button" class="btn-xs btn-danger">delete</button></a></td> -->
                                            </tr>
                                            @endforeach
                                           
                                            @endif
                                        </tbody>
                                    </table>
                                               
                                   {!! Form::close() !!}
                                    </div>
                                    
                                    @endif
<!---------------------------------------------------------->

      </div>
                        
                        
    </div>
   
                           
</div>
@endsection
<script>
    function activateDeactivate(str){
	if(document.getElementById(str).checked == true){
		document.getElementById(str+'major').disabled = false;
		document.getElementById(str+'gradyear').disabled = false;
		document.getElementById(str+'school').disabled = false;
		document.getElementById(str+'board').disabled = false;
		document.getElementById(str+'percentage').disabled = false;
		showHideAllPC();
	}else if(document.getElementById(str).checked == false){
		document.getElementById(str+'major').disabled = true;
		document.getElementById(str+'gradyear').disabled = true;
		document.getElementById(str+'school').disabled = true;
		document.getElementById(str+'board').disabled = true;
		document.getElementById(str+'percentage').disabled = true;
	}
}
    </script>