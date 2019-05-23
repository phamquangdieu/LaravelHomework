<!DOCTYPE html>
<html>
<head>
	<title>Add event</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<meta charset="utf-8">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	<script type="text/javascript">       
		$(function () {
			$('#datepicker').datepicker();
		});        
	</script>
    
</head>
<body>
	<div class="container">
		<form action="{{route('events.update',$id)}}" method="post" role= "form">
			@csrf
			{{method_field('put')}}
			<div class="form-group">
				<legend>Edit Event</legend>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2 text-center"><label class="control-label">Title</label></div>
					<div class="col-md-9"><input type="text" name="title" class="form-control"
						value="{{$event->title}}"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2 text-center"><label class="control-label">Content</label></div>
					<div class="col-md-9"><input type="text" name="content" class="form-control" value="{{$event->content}}"></div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2 text-center"><label class="control-label">Time</label></div>
					<div class="col-md-9">
						<input type="" name="time" id="datepicker" class="form-control" value="{{$event->time}}">
					</div>             	
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2 text-center"><label class="control-label">Location</label></div>
					<div class="col-md-9"><input type="text" name="location" class="form-control" value="{{$event->location}}"></div>
				</div>
			</div>
			<div class="form-group">
					<div class="col-md-12" style="margin-left: 500px">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
		</form>
	</div>
</body>
{{-- <script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</html>