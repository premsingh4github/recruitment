@extends('index')

@section('content')
<div id="page-wrapper">
    

    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Resume</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
     <!-----------search code------>
      <div class="panel panel-default">
                             <?php
                             $scountry=DB::table('country')->get(); 
                             $equalification=DB::table('qualification')->get();
                             ?>
                             {!! Form::open(array('route' => 'approval.create', 'id' => 'sign_up','class' => '','method'=> 'POST')) !!}
                <div class="form-group">
                   <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Country</label>
                          <div class="col-xs-12">                                    
                              <select class="form-control" name="country" id="country">
                                  <option selected disabled value="">Select </option>
                                  @if(@$scountry) 
                                  @foreach($scountry as $coun)
                                  <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                  @endforeach
                                  @endif
                                  
                              </select>
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Age</label>
                          <div class="col-xs-12">                                    
                               <input class="form-control"  name="age" type="number" pattern="[0-9]*" min="0" maxlength="3"  placeholder="Age">
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Height</label>
                          <div class="col-xs-12">                                    
                               <input class="form-control"  name="height" type="number" pattern="[0-9]*" min="0"  placeholder="Height(ft.)">
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                      <div class="row">
                          <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Education</label>
                          <div class="col-xs-12">                                    
                              <select class="form-control" name="qualification" id="qualification" >
	                             <option selected disabled value="">- Select Qualification -</option>
	                               @if(@$equalification) 
                                  @foreach($equalification as $coun)
                                  <option value="{{@$coun->name}}">{{@$coun->name}}</option>
                                  @endforeach
                                  @endif
                              </select>
                          </div>
                         
                      </div>
                    </div>
                    <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob">Skill and Training</label>
                                                              
                              <div class="col-xs-12">                                    
                               <input class="form-control"  name="skill" type="text"   placeholder="skill">
                          	</div>
                          
                       		
                     	</div>
                 	</div>
                     <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Experience</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control"  name="experience" type="number" pattern="[0-9]*" min="0"  placeholder="experience(year)">
                          </div>
                          
                       </div>
                     </div>
                     <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Name</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control" name="name" type="text" placeholder="Name" >
                           </div>
                          
                       </div>
                     </div>
                     <div class="col-sm-3 parent-box top-row ">
                       <div class="row">
                           <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Identification No.</label>
                           <div class="col-xs-12">                                    
                               <input class="form-control" name="passportNo" type="text" placeholder="identification No.">
                           </div>
                          
                       </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-6 parent-box ">
	                      <div class="row">
	                           <div class="col-xs-12">
	                               <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
	        						<input type="submit" class="btn btn-success btn-md"  value="Search">
	     						</div>
	                     
                     </div>
                 </div>
                    {!! Form::close() !!}
</div>
                             <!-----------search code------>
    
                      
                            
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		
                                    		</div>
                                    		</div>
                                    		<div class="row"><div class="col-sm-12">
                                                        {!! Form::open(['route' => 'approval.store', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                         {!! Form::submit('Request', ['class' => 'btn btn-primary']) !!}               
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th width='4%'></th>
                                            	<th width='13%'>Employee Name</th>
                                            	<th width='16%'>Work Experience</th>
                                            	<th width='10%'>Qualification</th>
                                            	<th width='30%'>Address</th>
                                            	<th width='15%'>Attachment</th>
                                                <th width='13%'>Action</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($approval))
                                            
                                       @foreach($approval as $deman)
                                       <?php 
                                       $empapp=DB::table('employerapproval')->where('pid',$deman->id)->where('empid',Auth::user()->id)->first();
                                       $qualification=DB::table('educationinformation')->where('pid',$deman->id)->OrderBy('id','asc')->first();
                                       ?>
                                      <tr class="gradeA odd" role="row">
                                           <td>{!! Form::checkbox('resume[]',$deman->id)!!}</td>
                                       <td class="sorting_1">{{$deman->fname}} {{$deman->lname}}</td>
                                               
                                                <td>{{@$deman->from_date}}-{{{isset($deman->to_date)?($deman->to_date==1)?"present":$deman->to_date:''}}}</td>
                                                 <td>{{@$qualification->degree}}</td>
                                               
                                                <td>{{@$deman->raddress1}},{{@$deman->country}},{{@$deman->mobile}}</td>
                                                <td>
                                                    <ul>
                                                         <?php 
                                                             $cv=DB::table('uploadinformation')->where('pid',$deman->id)->first();
                                                             $skil=DB::table('skillsinformation')->where('pid',$deman->id)->get();
                                                             $other=DB::table('additionalinformation')->where('pid',$deman->id)->first();
                                                            ?>
                                                        @if(@$cv->uresume!='')
                                                        <li>
                                                             <?php $path=url().'/upload/'.@$cv->uresume;?>
                                                            <a href="{{url()}}/upload/{{@$cv->uresume}}">CV</a>
                                                        </li>
                                                        @endif
                                                        @if(@$deman->passport!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$deman->passport;?>
                                                            <a href="{{url()}}/upload/{{@$deman->passport}}">Passport</a>
                                                        </li>
                                                        @endif
                                                        
                                                         @if(@$deman->experience_certificate!='')
                                                         <li>
                                                             <?php $path=url().'/upload/'.@$deman->experience_certificate;?>
                                                            <a href="{{url()}}/upload/{{@$deman->experience_certificate}}">Exp_Certificate</a>
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
                                               <a href="#"><button class="btn-xs btn-warning custom" onclick="window.open('{{url()}}/resume_preview/{{$deman->id}}','newWin','width=800,height=600')">View</button></a>                        
                                                @if(@$empapp && $deman->approval_status!=1)
                                                <a href=""><button type="button" class="btn-xs btn-primary custom">Requested</button></a>
                                           
                                                @elseif(@$empapp && $deman->approved_by==Auth::user()->id && $deman->approval_status==1)
                                                <a href=""><button type="button" class="btn-xs btn-success custom">Approved</button></a>
                                                @else
                                                <!--<a href="{{url()}}/approval/{{{$deman->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-primary">Request</button></a>-->
                                                @endif
                                                <!--{!! Form::open(['method' => 'DELETE','route' => ['approval.destroy', $deman->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn btn-warning']) !!}
                                                     {!! Form::close() !!}
                                                -->
                                                 </td>
                                                 </tr>
                                          
                                        @endforeach
                                         <?php echo $approval->render(); ?>
                                        @else
                                        <tr>
                                            <td colspan="7">searched not found</td>
                                        </tr>
                                        @endif
                                             </tbody>
                                         
                                    </table>
                                                     
                                   {!! Form::close() !!}
                                                    </div>
                                    </div>
                                    <!-- <div class="row"><div class="col-sm-6"><div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">Showing 1 to 50 of 57 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li><li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li></ul></div></div>
                                    </div> -->
                                    </div>
                                </div>
                                <!-- /.table-responsive -->
                             
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
</div>
@endsection

