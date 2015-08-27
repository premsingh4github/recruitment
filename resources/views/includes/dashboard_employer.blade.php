<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Employer Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <!--@if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif-->
                            </div>                            
                            <!-- /.panel-heading -->
                          
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <ul class="dashboardItems">
                                            <li class="curveSmall"> <a href="{{url()}}/employer/{{Auth::user()->id}}"> <img src="{{url()}}/images/profile.gif" />
                                            <p>Profile</p>
                                                </a> </li>
                                            <li class="curveSmall"> <a href="{{url()}}/demand"> <img src="{{url()}}/images/demand.gif" />
                                            <p>Demand Letter</p>
                                                </a> </li>
                                                <li class="curveSmall"> <a href="{{url()}}/approval"> <img src="{{url()}}/images/resumesearch.gif" />
                                            <p>Resume</p>
                                                </a> </li>
                                                 <li class="curveSmall"> <a href="{{url()}}/report"> <img src="{{url()}}/images/report.gif" />
                                            <p>Report</p>
                                                </a> </li>
                                                <li class="curveSmall"> <a href="{{url()}}/notification_email_view"> <img src="{{url()}}/images/notification.gif" />
                                            <p>Notification</p>
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