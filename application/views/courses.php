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
			<?php if($this->session->userdata('error')){ echo "<h4>" . $this->session->userdata('error') . "</h4>"; } ?>
			<?php if($this->session->flashdata('OK')){ echo "<h4>" . $this->session->flashdata('OK') . "</h4>"; } ?>
			<h2>Add a new course</h2>
			<form action="/courses/add" method="post">
				<div <?php if($this->session->userdata('name_flag')){ echo "class='" . $this->session->userdata('name_flag') . "'"; } ?>>
					<?php if($this->session->userdata('name_error')){ echo "<h4>" . $this->session->userdata('name_error') . "</h4>"; } ?>
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" placeholder="How to algorithm" size="250" maxlength="250" value="<?php if($this->session->userdata('name')){ echo $this->session->userdata('name'); } ?>">
				</div>
				<div>
					<label for="description">Description:</label>
					<textarea name="description" id="description" cols="50" rows="7" placeholder="A class covering the fundamentals of problem-solving..." size="500" maxlength="500"><?php if($this->session->userdata('description')){ echo $this->session->userdata('description'); } ?></textarea>
				</div>
				<div>
					<input type="submit" id="add_button" value="Add Course">
				</div>
			</form>
		</div>
		<div id="course_table">
			<h2>Courses</h2>
			<table>
				<tr>
					<th>Course Name</th>
					<th>Description</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>
				<?php  foreach($get_result as $row) { ?>
				<tr>
					<td><?= $row['name'] ?></td>
					<td><?= $row['description'] ?></td>
					<td><?= $row['created_at'] ?></td>
					<td><a href="/courses/delete/<?= $row['id'] ?>">Delete</a></td>
				</tr>
				<?php }?>
			</table>
		</div>
		<div class="shape">
		</div> 
	</div>
</body>
</html>