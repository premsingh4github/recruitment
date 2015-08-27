<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recruitment Agency CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url()}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url()}}/css/bootstrapvalidator.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url()}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{url()}}/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url()}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url()}}/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url()}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="{{url()}}/css/datepicker.css" rel="stylesheet" type="text/css">
<!------------------------------->
<script type="text/javascript" src="{{url()}}/js/jquery-ui.min.js"></script>
<style>
    .custom {
    width: 70px;
}
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

@if(Auth::check())
@if(Auth::user()->loginas==1)
<style>
    
    #page-wrapper {
       background-color:#FFF2F2;
    }
    #wrapper{
    background-color:#EDD;
    }
.navbar-default {
    background-color:#EDD;
    /*border-color: #e7e7e7;*/
}
/*.sidebar ul li a.active {
    background-color:#FC9;
}*/

</style>
@endif
@if(Auth::user()->loginas==2)
<style>
    
    #page-wrapper {
       background-color:#FFFFE8;
    }
    #wrapper{
    background-color:#FFFFD9;
    }
.navbar-default {
    background-color:#FFFFD9;
    /*border-color: #e7e7e7;*/
}
/*.sidebar ul li a.active {
    background-color: yellow;
}*/

</style>
@endif
@if(Auth::user()->loginas==3)
<style>
    
    #page-wrapper {
       background-color:#F2F9F9;
    }
    #wrapper{
    background-color:#E2F1F1;
    }
.navbar-default {
    background-color:#E2F1F1;
    /*border-color: #e7e7e7;*/
}
/*.sidebar ul li a.active {
    background-color: yellow;*/
}

</style>
@endif
@endif
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @section('header')
            <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>           
                <a style="float:left;padding:0;height:50px;text-decoration: none;" href="{{url()}}"><img style="display:inline;" src="{{url()}}/images/logo.gif"/>Recruitment Agency CMS</a>
             
            </div>
            <!-- /.navbar-header -->
             @if(Auth::check())
            <ul class="nav navbar-top-links navbar-right">
                @if(Auth::user()->type==1)
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>Switch as  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @if(Auth::user()->loginas==1)
                        <li><a href="{{url()}}/switchuser/3"><i class="fa fa-sign-out fa-fw"></i> Agent</a>
                        </li>
                        <li><a href="{{url()}}/switchuser/2"><i class="fa fa-sign-out fa-fw"></i> Employer</a>
                        </li>
                        @endif
                        @if(Auth::user()->loginas==2)
                        <li><a href="{{url()}}/switchuser/3"><i class="fa fa-sign-out fa-fw"></i> Agent</a>
                        </li>
                        <li><a href="{{url()}}/switchuser/1"><i class="fa fa-sign-out fa-fw"></i> Back to admin</a>
                        </li>
                        @endif
                        @if(Auth::user()->loginas==3)
                         <li><a href="{{url()}}/switchuser/1"><i class="fa fa-sign-out fa-fw"></i> Back to Admin</a>
                        </li>
                        <li><a href="{{url()}}/switchuser/2"><i class="fa fa-sign-out fa-fw"></i> Employer</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                @endif
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>
                      
                        {{Auth::user()->name}}
                       
                          <i class="fa fa-caret-down"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li> -->
                        <li><a href="{{url()}}/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        <li>
                            <a href="{{url()}}/password/create"><i class="fa fa-lock fa-fw"></i>Change Password</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                  </ul>
              @endif
            @if(Auth::check())
               @section('leftSidebar')
            @if((Auth::user()->type==2 || Auth::user()->type==1) && Auth::user()->loginas==2 && Auth::user()->status==1)
           @include('includes.left_employer')
            @endif
            @if((Auth::user()->type==3 || Auth::user()->type==1) && Auth::user()->loginas==3 && Auth::user()->status==1)
           @include('includes.left_agent')
           @endif
           @if(Auth::user()->type==1 && Auth::user()->loginas==1 && Auth::user()->status==1)
           @include('includes.left_admin')
            @endif
            @endif
            <!-- /.navbar-top-links -->
           
            @if(Auth::check())
                @show
            @else
                @endsection
            @endif
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')

    </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="{{url()}}/bower_components/jquery/dist/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="{{url()}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="{{url()}}/js/bootstrapvalidator.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="{{url()}}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

            <!-- Morris Charts JavaScript -->
            <script src="{{url()}}/bower_components/raphael/raphael-min.js"></script>
            <!-- <script src="{{url()}}/bower_components/morrisjs/morris.min.js"></script> -->
            <!-- <script src="{{url()}}/js/morris-data.js"></script> -->

            <!-- Custom Theme JavaScript -->
            <script src="{{url()}}/dist/js/sb-admin-2.js"></script>
            <script src="{{url()}}/js/bootstrap-datepicker.js"></script>
            <script src="{{url()}}/js/custom.js"></script>
            
            <script type="text/javascript">
               
                $(document).ready(function () {
                
                $('.calendar').datepicker({
                    format: "mm/dd/yyyy"
                });  
            
            });
                $('#addSkill').click(function(){
                    
                    var skillContainer = document.getElementById('skillContainer');
                    var skillCount = document.getElementById('skillCount').value;
                    skillCount = parseInt(skillCount) + 1;
                    document.getElementById('skillCount').value = skillCount;
                    var add = "<div class='form-group'><div class='col-sm-6 parent-box '><div class='row'><label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Skills</label>" +
                                     "<div class='col-xs-12'>" +
                                         "<input class='form-control'  name='skill_" + skillCount +"' type='text'>" +
                                     "</div>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                         "<div class='form-group'>" +
                             "<div class='col-sm-6 parent-box '>" +
                                 "<div class='row'>" +
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'> Proficiency</label>" +
                                     "<div class='col-xs-12'>" +
                                         "<select class='form-control' name='proficiency_" + skillCount +"' >" +
                                             "<option selected value=''>Select </option>" +
                                             "<option value='Beginner' >Beginner</option>" +
                                             "<option value='novice'>novice</option>" +
                                             "<option value='expert'>expert</option>" +
                                         "</select> </div>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                         "<div class='form-group'>"+
                             "<div class='col-sm-6 parent-box'>"+
                                 "<div class='row'>"+
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Objective</label>"+
                                     "<div class='col-xs-12'>"+
                                        " <input class='form-control' id='sobjective' name='sobjective_"+ skillCount +"' type='text'>"+
                                     "</div>"+
                                 "</div>"+
                             "</div>"+
                               "<div class='col-sm-6 parent-box'>"+
                                 "<div class='row'>"+
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Institute</label>"+
                                     "<div class='col-xs-12'>"+
                                         "<input class='form-control' id='institute' name='institute_"+ skillCount +"' type='text'>"+
                                     "</div>"+
                                 "</div>"+
                             "</div>"+
                         "</div>"+
                         "<div class='form-group col-sm-12'>" +
                             "<div class='col-sm-6 parent-box '>" +
                                 "<div class='row'>" +
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Upload your Skills Certificate</label>" +
                                     "<div class='col-xs-12'>" +
                                         "<input class='form-control'  name='skills_certificate_" + skillCount +"' type='file'>" +
                                     "</div>" +
                                 "</div>" +
                             "</div>" +
                         "</div>";
                         
//                    skillContainer.innerHTML = skillContainer.innerHTML + add;
                        skillContainer.insertAdjacentHTML('beforeend',add);
                    
                });
                $('#addLanguage').click(function(){
                
                var languagaContainer = document.getElementById('languagaContainer');
                var languageCount = document.getElementById('languageCount').value;
                languageCount = parseInt(languageCount) + 1;
                document.getElementById('languageCount').value = languageCount;
                var add = "<div class='form-group'><div class='col-sm-3 parent-box '><div class='row'><label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Language</label>" +
                                 "<div class='col-xs-12'>" +
                                     "<input class='form-control'  name='language_" + languageCount +"' type='text'>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                     "</div>" +
                     "<div class='form-group'>" +
                         "<div class='col-sm-3 parent-box '>" +
                             "<div class='row'>" +
                                 "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Spoken</label>" +
                                 "<div class='col-xs-12'>" +
                                     "<select class='form-control' name='lspoken_" + languageCount +"' >" +
                                         "<option selected value=''>Select </option>" +
                                         "<option value='Excellent' >Excellent</option>" +
                                         "<option value='good'>good</option>" +
                                         "<option value='average'>expert</option>" +
                                     "</select> </div>" +
                             "</div>" +
                         "</div>" +
                     "</div>" +
                     "<div class='form-group '>" +
                         "<div class='col-sm-3 parent-box '>" +
                             "<div class='row'>" +
                                 "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Written</label>" +
                                 "<div class='col-xs-12'>" +
                                     "<select class='form-control' name='lwritten_" + languageCount +"' >" +
                                          "<option selected value=''>Select </option>" +
                                          "<option value='Excellent' >Excellent</option>" +
                                          "<option value='good'>good</option>" +
                                          "<option value='average'>average</option>" +
                                      "</select>" +
                                 "</div>" +
                             "</div>" +
                         "</div>" +
                          "<div class='form-group'>"+
                              "<div class='col-sm-3 parent-box'>"+
                                "<div class='row'>"+
                                    "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_dob' aria-required='true'>Reading</label>"+
                                    "<div class='col-xs-12'>"+
                                    "<select class='form-control' id='lreading' name='lreading_"+ languageCount +"' tabindex='-1'>"+
                                      "<option selected value=''>select</option>"+
                                      "<option value='Excellent'>Excellent</option>"+
                                      "<option value='good'>good</option>"+
                                      "<option value='average'>average</option>"+
                                    "</select>"+
                                    "</div>"+
                                  "</div>"+
                                "</div>"+                                
                              "</div>"+
                     "</div>";
                     
//                languagaContainer.innerHTML +=  add;
                    languagaContainer.insertAdjacentHTML('beforeend',add);
                
            });
            /*--------------------------------------------------*/
            $('#addEducation').click(function(){
                
                var educationContainer = document.getElementById('educationContainer');
                var educationCount = document.getElementById('educationCount').value;
                educationCount = parseInt(educationCount) + 1;
                document.getElementById('educationCount').value = educationCount;
                var add =  "---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"+
                        "<div class='form-group'><div class='col-sm-6 parent-box top-row'><div class='row'><label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_dob' aria-required='true'>Qualification </label>"+
                                     "<div class='col-xs-12'>"+                                    
                                         "<select class='form-control' id='qualification' name='qualification_"+ educationCount +"' >"+
                                          " <option selected value=''>- Select Qualification -</option>"+
                                             @if(@$equalification) 
                                                  @foreach($equalification as $coun)
                                                   "<option value='{{@$coun->name}}'>{{@$coun->name}}</option>"+
                                                  @endforeach
                                                  @endif                                                 
                                         "</select>"+
                                     "</div>"+                                    
                                 "</div>"+
                               "</div>"+                               
                               " <div class='col-sm-6 parent-box'>"+
                                    "<div class='row'>"+
                                        "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>College/School</label>"+
                                        "<div class='col-xs-12'>"+
                                            "<input class='form-control' id='school' name='school_" + educationCount +"'type='text' maxlength='100' value=''>"+
                                         "</div>"+
                                   " </div>"+
                                "</div>"+                            
                            "</div>"+
                            "<div class='form-group'><div class='col-sm-6 parent-box'><div class='row'><label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Institute/University</label>"+
                                        "<div class='col-xs-12'>"+
                                            "<input class='form-control' id='university' name='university_"+ educationCount + "'type='text' maxlength='100' value=''>"+
                                         "</div>"+
                                    "</div>"+
                                "</div>"+
                                 "<div class='col-sm-6 parent-box top-row'>"+
                                 "<div class='row'>"+
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_dob' aria-required='true'>Institute/University Location </label>"+
                                     "<div class='col-xs-12'> "+                                   
                                         "<select class='form-control' id='ulocation' name='ulocation_"+ educationCount +"' >"+
                                              "<option selected value=''>- Select Location -</option>"+
                                               @if(@$country) 
                                                  @foreach($country as $coun)
                                                   "<option value='{{@$coun->name}}'>{{@$coun->name}}</option>"+
                                                  @endforeach
                                                  @endif                                             
                                         "</select>"+
                                     "</div>"+                                    
                                 "</div>"+
                              "</div>"+                       
                            "</div>"+
                            "<div class='form-group'>"+
                              "<div class='col-sm-6 parent-box top-row'>"+
                                 "<div class='row'>"+
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_dob' aria-required='true'>Field of Study</label>"+
                                     "<div class='col-xs-12'> "+                                   
                                         "<select class='form-control'id='fieldofstudy' name='fieldofstudy_"+ educationCount +"' >"+
                                                "<option selected value=''>- Select Field -</option>"+
                                                  @if(@$fstudy) 
                                                  @foreach($fstudy as $coun)
                                                   "<option value='{{@$coun->name}}'>{{@$coun->name}}</option>"+
                                                  @endforeach
                                                  @endif                                             
                                         "</select>"+
                                     "</div>"+                                    
                                 "</div>"+
                               "</div>"+                           
                                "<div class='col-sm-6 parent-box'>"+
                                    "<div class='row'>"+
                                        "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_email' aria-required='true'>Major</label>"+
                                        "<div class='col-xs-12'>"+
                                            "<input class='form-control' id='major' name='major_"+ educationCount + "'type='text' maxlength='100' value=''>"+
                                         "</div>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                            "<div class='form-group'>"+
                              "<div class='col-sm-6 parent-box top-row'>"+
                                 "<div class='row'>"+
                                     "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_dob' aria-required='true'>Percentage/CGPA </label>"+
                                     "<div class='col-xs-12'>"+                                    
                                         "<input class='form-control' id='grade' name='grade_"+ educationCount +"'type='text' maxlength='100' value=''>"+
                                      "</div>"+                                    
                                 "</div>"+
                               "</div>"+
                                 "<div class='col-sm-6 parent-box top-row'>"+
                                    "<div class='row'>"+
                                        "<label class='col-xs-12 control-label custom-control-label required c-text-left' id='lbl_dob' aria-required='true'>Graduation Year</label>"+
                                           "<div class='col-xs-12'>"+
                                            "<input class='form-control' id='gyear' name='gyear_" + educationCount +"'type='number' pattern='[0-9]*' min='0' maxlength='4'  placeholder='Year' value='' >"+
                                        "</div>"+
                                    "</div>"+
                                   "</div>"+
                            "</div>";
                         
                     
//                languagaContainer.innerHTML +=  add;
                    educationContainer.insertAdjacentHTML('beforeend',add);
                
            });
            /*--------------------------------------------------*/
                </script>
               
              
</body>
</html>
