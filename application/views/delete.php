<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses - Add a new course</title>
	<link rel="stylesheet" href="/assets/css/normalize.css">
	<link rel="stylesheet" href="/assets/css/add_course_style.css">
</head>
<body>
	
	<div id="wrapper">
		<div id="add_form">
			<h2>Are you sure you want to delete the following course?</h2>
			<form action="/courses/remove" method="post">
				<div>
					<h2>Name:</h2>
					<h4><?= $course['name'] ?></h4>
					<h2>Description:</h2>
					<h4><?= $course['description'] ?> </h4> 
					<button type="submit" id="add_button" name="course_id" value="<?= $course['id'] ?>">Yes ! I want to delete this!</button>
				</div>
			</form>
			<a href="/"><button>No!</button></a>
		</div>

	</div>
</body>
</html>