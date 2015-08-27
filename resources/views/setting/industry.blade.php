@extends('index')

@section('content')
<div id="page-wrapper">
    
    
    <div class="row">
                    <div class="col-lg-12">
                        @if(@$id!=0)
                        <h1 class="page-header">Setting>>Work Sector>>Edit</h1>
                        @else
                        <h1 class="page-header">Setting>>Work Sector</h1>
                        @endif
                         </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                                            
                                @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            </div>                            
                            <!-- /.panel-heading -->
                           <!-----------New country add code------>
                             {!! Form::open(array('route' => 'industry.create', 'id' => 'sign_up','class' => '','method'=> 'POST')) !!}
                <div class="form-group">
                   
                     <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_dob" aria-required="true">Industry Name</label>
                                            
                    <div class="col-sm-6 parent-box top-row ">
                                         <div class="row">
                                             <div class="col-xs-12">
                                                 @if(@$editindustry && $id!=0)
                                                 <input class="form-control" name="name" type="text" value="{{$editindustry->name}}">
                                                 @else
                                                  <input class="form-control" name="name" type="text" placeholder=" industry Name" >
                                                  @endif
                                             </div>
                                         </div>
                                      </div>  
                      <input type="hidden" name="industryId" value="{{{ isset($id) ? $id : '0' }}}">
                    
                 </div>
                 <div class="form-group">
                     <div class="col-sm-6 parent-box ">
	                      <div class="row">
	                           <div class="col-xs-12">
	                               <label class="col-xs-12 control-label custom-control-label required c-text-left" id="lbl_email" aria-required="true"></label>
	        						<input type="submit" class="btn-xl btn-success btn-md"  value="Submit">
	     						</div>
	                      </div>
                     </div>
                 </div>
                    {!! Form::close() !!}
                            
                             <!-----------New country add code------>
                             
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                            		<div class="row"><div class="col-sm-12">
                                         {!! Form::open(['route' => 'industry.destroy','method' => 'DELETE', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Delete', ['class' => 'btn-xl btn-danger']) !!}    
                                        <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th width='1%'></th>
                                            	<th width='16%'>industry Name</th>
                                            	<th width='15%'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($industry)
                                            @foreach($industry as $countr)
                                            <tr>
                                                <td>{!! Form::checkbox('list[]',$countr->id)!!}</td>
                                                 <td>{{$countr->name}}</td>
                                                 <td>
                                                     <a href="{{url()}}/industry/{{{$countr->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-warning">Edit</button></a>
                                                 
                                                 </td>
                                            </tr>
                                            @endforeach
                                           
                                            <?php echo $industry->render(); ?>
                                           
                                            @endif
                                        </tbody>
                                    </table>
                                               
                                   {!! Form::close() !!}
                                    </div>
                                    </div>
                                    		
                                   
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




