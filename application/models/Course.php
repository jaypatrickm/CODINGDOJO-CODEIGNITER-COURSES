<?php
class Course extends CI_Model
{
	public function add_course($post)
	{
		$query = "INSERT INTO courses (name, description, created_at, updated_at)
			  	  VALUES (?,?,NOW(),NOW())";
		$values = array($post['name'], $post['description']);
		return $this->db->query($query, $values);		
	}

	public function get_courses()
	{
		$query = "SELECT id, name, description, created_at FROM courses";
		return $this->db->query($query)->result_array();
	}

	public function one_course($id)
	{
		$query = "SELECT name, description, id FROM courses WHERE id = $id";
		return $this->db->query($query)->row_array();
	}

	public function delete_course($id)
	{
		$query = "DELETE FROM courses WHERE courses.id = $id";
		return $this->db->query($query);
	}

}
?>