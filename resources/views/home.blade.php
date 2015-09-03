@extends('index')


@section('content')
<div id="page-wrapper">
    						
    @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
  @if(Auth::check())
  @if(Auth::user()->loginas==1 && Auth::user()->status==1)
   @include('includes.dashboard_admin')
  @endif
  @if(Auth::user()->loginas==2 && Auth::user()->status==1)
   @include('includes.dashboard_employer')
  @endif
  @if(Auth::user()->loginas==3 && Auth::user()->status==1)
   @include('includes.dashboard_agent')
  @endif
  @endif
</div>
@endsection
