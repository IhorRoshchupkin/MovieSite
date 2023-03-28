<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
		<meta name="description" content="University website">
		<meta name="keywords" content="HTML, CSS, PHP">
		<meta name="author" content="Mykola Muts 150522">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Application layout</title>
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {background-color: #ccffcc;}
      </style>
    <title>My first aplication</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
<body>
<header>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="home" aria-selected="true">View movies</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="insert-tab" data-bs-toggle="tab" data-bs-target="#insert" type="button" role="tab" aria-controls="profile" aria-selected="false">Insert new movie</button>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login</a>
			</li>
		</ul>
	</div>
</header>