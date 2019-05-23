<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Event</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<a href="{{ route('events.add') }}" class="btn btn-success">Add</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Content</th>
						<th>Time</th>
						<th>Location</th>
						<th>Created_at</th>
					</tr>
				</thead>
				<tbody>
					@foreach($events as $event)
					<tr>
						<td>{{ $event->id }}</td>
						<td>{{ $event->title }}</td>
						<td>{{ $event->content }}</td>
						<td>{{ $event->time }}</td>
						<td>{{ $event->location }}</td>
						<td>{{ $event->created_at }}</td>
						<td>
							<a style="display: inline-block; width: 67px;" href="{{ route('events.edit',$event->id) }}" class="btn btn-warning">Edit</a>
							<form style="display: inline-block;" action="{{ route('events.destroy',$event->id) }}" method="post" accept-charset="utf-8">
								@csrf
								{{method_field('delete')}}
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>		
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>