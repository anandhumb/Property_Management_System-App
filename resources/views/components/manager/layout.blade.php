<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('dashboard/assets/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('dashboard/assets/css/demo.css') }}">
</head>
<body>
    <x-manager.header/>
<x-manager.sidebar/>
<x-manager.content>
{{ $slot }}
@if(session()->has('status'))
<div class="alert alert-success">
	{{ session()->get('status') }}
</div>
@endif
@if(session()->has('delete'))
<div class="alert alert-danger">
{{ session()->get('delete') }}
</div>
@endif
</x-manager.content>

	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
						<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="{{ asset('dashboard/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/ready.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/demo.js') }}"></script>
</html>