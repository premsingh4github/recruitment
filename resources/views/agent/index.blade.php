@extends('index')

@section('content')
<div id="page-wrapper">  
    <div class="row">
                    <div class="col-lg-12">
                        @if($agentp->id!=Auth::user()->id)
                            @if($agentp->type==1)
                             <h1 class="page-header">Users>>Admin Users>>View</h1>
                            @endif
                             @if($agentp->type==2)
                              <h1 class="page-header">Users>>Employer Users>>View</h1>
                            @endif
                             @if($agentp->type==3)
                              <h1 class="page-header">Users>>Agent Users>>View</h1>
                            @endif
                       
                        @else
                        <h1 class="page-header">Profile</h1>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @if($agentp->id!=Auth::user()->id)
                                User Details
                                @else
                                @if(Auth::user()->type==1)
                                <a href="{{url()}}/profile_edit/{{{$agentp->id}}}"><button type="button" class="btn-xs btn-primary"> Edit Profile </button></a>
                                                  
                                @else
                                {!! Form::open(['method' => 'get','route' => ['agent.edit', $agentp->id]]) !!}
                                                     {!! Form::submit('Edit Profile', ['class' => 'btn-xs btn-primary']) !!}
                                                     {!! Form::close() !!}
                                @endif
                                @endif
                                 </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    	<div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		
                                    		</div>
                                    		</div>
                                    		<div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                               
                                        @if($agentp)
                                      
                                        <tr>
                                        <td width="20%">Name:</td><td>{{$agentp->name}}</td>
                                        </tr>
                                        <tr>
                                        <td width="20%">Email:</td><td>{{$agentp->email}}</td>
                                        </tr>
                                        <tr>
                                        <td width="20%">Address:</td><td>{{$agentp->address}}</td>
                                        </tr>
                                        <tr>
                                        <td width="20%">Contact Number:</td><td>{{$agentp->contactNumber}}</td>
                                        </tr>
                                        <tr>
                                        <td width="20%">Company Name:</td><td>{{{isset($profile->company_name)? $profile->company_name:''}}}</td>
                                        </tr>
                                        <tr>
                                        <td width="20%">Company Address:</td><td>{{{isset($profile->company_address)? $profile->company_address:''}}}</td>
                                        </tr>
                                        <tr>
                                        <td width="20%">Company Information:</td><td>{{{isset($profile->company_information)? $profile->company_information:''}}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%">Document:</td><td><a href='{{url()}}/upload/{{{isset($profile->company_document)?$profile->company_document:''}}}'>{{{isset($profile->company_document)?$profile->company_document:''}}}</a></td>
                                        </tr>
                                         @endif
                                          @if($agentp->id!=Auth::user()->id)
                                         <tr>
                                             <td>
                                                <a href="{{url()}}/member/{{{$agentp->type}}}"><button type="button" class="btn-xs btn-primary">Back</button></a>
                                                  
                                             </td>
                                         </tr>
                                         @endif
                                        </tbody>
                                    </table>
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
