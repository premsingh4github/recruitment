@extends('index')

@section('content')
<div id="page-wrapper">
    
    
    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users</h1>
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
                          
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <ul class="dashboardItems">
                                            <li class="curveSmall"> <a href="{{url()}}/member/{{1}}"> <img src="{{url()}}/images/user.gif" />
                                            <p>Admin Users</p>
                                                </a> </li>
                                            <li class="curveSmall"> <a href="{{url()}}/member/{{2}}"> <img src="{{url()}}/images/user.gif" />
                                            <p>Employer Users</p>
                                                </a> </li>
                                                <li class="curveSmall"> <a href="{{url()}}/member/{{3}}"> <img src="{{url()}}/images/user.gif" />
                                            <p>Agent Users</p>
                                                </a> </li>
                                              
                                        </ul>
                                    		
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
<style>
    ul.dashboardItems {
  padding: 0px;
  margin:0px;
}
ul.dashboardItems li {
  background: none repeat scroll 0 0 #fff;
  border: 1px solid #b3b2b3;
  float: left;
  height: 100px;
  margin: 5px;
  overflow: hidden;
  text-align: center;
  width: 194px;
  box-shadow: inset 1px 1px 19px #ccc;
  border-radius: 8px;
}

ul.dashboardItems li:hover {
	background: #eee;
	transition:0.5s;
}
ul.dashboardItems li img {
	clear: both;
	margin: 10px;
	height: 48px;
	width: 48px;
}
ul.dashboardItems li p {
	margin: 0;
}
ul.dashboardItems li a {
	color: #333;
	font-size:14px;
	text-decoration: none;
}
ul.dashboardItems li a:hover {
	color: #000;
	text-decoration: none;
}
</style>
@endsection






