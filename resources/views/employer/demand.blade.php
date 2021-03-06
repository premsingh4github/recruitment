@extends('index')

@section('content')
<div id="page-wrapper">
    

    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Demand Letter</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a href="{{url()}}/demand/create"><button  class="btn btn-primary">Compose</button></a>
                             @if (Session::has('message'))
                            <div class="alert alert-danger">{{ Session::get('message') }}</div>
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
                                                 {!! Form::open(['route' => 'demand.destroy','method' => 'DELETE', 'class' => 'navbar-form']) !!}                             
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}       
                                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr role="row">
                                                <th tabindex="0"></th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 217px;">Title</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 262px;">Description</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Qualification</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 200px;">No of vacancies</th>
                                            	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Date</th>
                                                <th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 141px;">Action</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                       @if($dem)
                                      
                                       @foreach($dem as $deman)
                                        <tr class="gradeA odd" role="row">
                                        
                                         <td> {!! Form::checkbox('demand[]',$deman->id)!!}</td>
                                                <td class="sorting_1">{{$deman->title}}</td>
                                                <td>{{str_limit($deman->description, $limit = 25, $end = '...')}}</td>
                                                <td>{{$deman->qualification}}</td>
                                                <td class="center">{{$deman->no_vacancy}}</td>
                                                <td>{{date("Y-m-d",strtotime($deman->updated_at))}}</td>
                                                <td>
                                                <a href="{{url()}}/demand/{{{$deman->id}}}/{{'edit'}}"><button type="button" class="btn-xs btn-warning custom">Edit</button></a>
                                               {!! Form::open(['method' => 'DELETE','route' => ['demand.destroy', $deman->id]]) !!}
                                                    {!! Form::close() !!}
                                                {!! Form::open(['method' => 'DELETE','route' => ['demand.destroy', $deman->id]]) !!}
                                                     {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger custom']) !!}
                                                     {!! Form::close() !!}
                                                 </td>
                                                 </tr>
                                            
                                        @endforeach
                                        <?php echo $dem->render(); ?>
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
