@extends('layouts.dashbord.master2')
@section('css')
<!--- Internal Fontawesome css-->
<link href="{{URL::asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!---Ionicons css-->
<link href="{{URL::asset('assets/admin/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
<!---Internal Typicons css-->
<link href="{{URL::asset('assets/admin/plugins/typicons.font/typicons.css')}}" rel="stylesheet">
<!---Internal Feather css-->
<link href="{{URL::asset('assets/admin/plugins/feather/feather.css')}}" rel="stylesheet">
<!---Internal Falg-icons css-->
<link href="{{URL::asset('assets/admin/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
@endsection
@section('content')
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper  page page-h ">
			<img src="{{URL::asset('assets/admin/img/media/500.png')}}" class="error-page" alt="error">
			<h2>Oopps. your account is not active please contact Admin</h2>
			<h6>watsapp:01156846579</h6><a class="btn btn-outline-danger" href="{{ url('/' . $page='index') }}">Back to Home</a>
		</div>
		<!-- /Main-error-wrapper -->
@endsection
@section('js')
@endsection
