<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <!--  <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                           
                        </li> -->
                        <li>
                            <a href="{{url()}}"><i class="fa fa-dashboard fa-fw"></i> Agent-Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="{{url()}}/agent/{{Auth::user()->id}}"><i class="glyphicon glyphicon-user"></i> Profile</a>
                        </li>
                      <li>
                            <a href="{{url()}}/resume/create"><i class="fa fa-edit fa-fw"></i>Resume Entry</a>
                        </li>
                        <li>
                            <a href="{{url()}}/resume"><i class="fa fa-search fa-fw"></i>Resume Search</a>
                        </li>
                         <li>
                            <a href="{{url()}}/report"><i class="fa fa-book fa-fw"></i>Report</a>
                        </li>
                        <li>
                            <a href="{{url()}}/demand_view"><i class="fa fa-file fa-fw"></i>View Demand</a>
                        </li>
                        <li>
                            <a href="{{url()}}/notification_email_view"><i class="fa fa-envelope fa-fw"></i>Notification</a>
                        </li>
                         
                       
                        </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>