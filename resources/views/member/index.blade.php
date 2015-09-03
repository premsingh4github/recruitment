@extends('index')

@section('content')
<div id="page-wrapper">
    
    <!-- {{$members}} -->
    <div class="row">
                    <div class="col-lg-12">
                        @if($u==1)
                        <h1 class="page-header">Users>>Admin Users</h1>
                        @endif
                        @if($u==2)
                        <h1 class="page-header">Users>>Employer Users</h1>
                        @endif
                        @if($u==3)
                        <h1 class="page-header">Users>>Agent Users</h1>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="{{url()}}/member/create"><button  class="btn btn-primary">@if($u==2)Add Employer @elseif($u==3)Add Agent @else Add Admin @endif</button></a>
                            @if (Session::has('blockmessage'))
                             <div class="alert alert-danger">{{ Session::get('blockmessage') }}</div>
                             @endif
                              @if (Session::has('unblockmessage'))
                             <div class="alert alert-info">{{ Session::get('unblockmessage') }}</div>
                             @endif
                              @if (Session::has('message'))
                             <div class="alert alert-success">{{ Session::get('message') }}</div>
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
                                    		<div class="row"><div class="col-sm-12">
                                                {!! Form::open(['route' => 'member.destroy','method' => 'DELETE', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger']) !!}    
                                               <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th width='4%'></th>
                                            	<th width='15%'>Name</th>
                                            	<th width='20%'>Email/Username</th>                                            	
                                                <th width='25%'>Address</th>
                                            	<th width='16%'>Contact Number</th>
                                            	<th width='20%'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($members as $member)
                                        <tr class="gradeA odd" role="row">
                                                @if($member->id==Auth::user()->id)
                                                <td></td>
                                                @else
                                                <td> {!! Form::checkbox('member[]',$member->id)!!}</td>
                                                @endif
                                                <td class="sorting_1">{{$member->name}}</td>
                                                <td>{{$member->email}}</td>
                                                <td>{{$member->address}}</td>
                                                
                                                <td class="center">{{$member->contactNumber}}</td>
                                                <td>
                                                    @if($member->id==Auth::user()->id)
                                                    <a href=""><button type="button" class="btn-xs btn-success custom"> Logged In </button></a>
                                                    @else
                                                    @if($member->status==1)                                                    
                                                    <a href="{{url()}}/member_block/{{{$member->id}}}"><button type="button" class="btn-xs btn-danger custom"> Block </button></a>
                                                    @else
                                                 <a href="{{url()}}/member_block/{{{$member->id}}}"><button type="button" class="btn-xs btn-info custom">Unblock</button></a>
                                                 @endif
                                                 <a href="{{url()}}/profile/{{{$member->id}}}"><button type="button" class="btn-xs btn-primary custom">View</button></a>
                                                 <a href="{{url()}}/member/{{{$member->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-warning custom">Edit</button></a>
                                                 {!! Form::open(['method' => 'DELETE','route' => ['member.destroy', $member->id]]) !!}
                                               {!! Form::close() !!}
                                                 {!! Form::open(['method' => 'DELETE','route' => ['member.destroy', $member->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger custom']) !!}
                                                     {!! Form::close() !!}
                                                @endif
                                                 
                                                
                                                </td>
                                               
                                                <!-- <td class="center"><a href=""><button type="button" class="btn-xs btn-danger">Block</button></a> <a href="{{url()}}/member_edit/{{{$member->id}}}"><button type="button" class="btn-xs btn-warning">edit</button></a> <a href=""><button type="button" class="btn-xs btn-danger">delete</button></a></td> -->
                                            </tr>
                                           
                                        @endforeach
                                        <?php echo $members->render(); ?>
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
