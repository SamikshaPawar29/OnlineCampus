<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

$sql = "SELECT *
FROM job_post
JOIN company ON job_post.id_company = company.id_company";


 if(!empty($_GET['qualification'])) {
	$sql = $sql . " WHERE qualification='$_GET[qualification]'";
}
$result = $conn->query($sql);
if($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) {

		if(isset($_SESSION['id_user'])) {
			$sql1 = "SELECT * FROM apply_job_post WHERE PRN='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]'";
			$result1 = $conn->query($sql1);
			if($result1->num_rows > 0) 
			{
				$apply = "<strong>Applied</strong";
			} else {
				$apply = "<a href='apply-job-post.php?id=".$row['id_jobpost']."'>Apply</a>";
			}
		} else {
				$apply = "<a href='apply-job-post.php?id=".$row['id_jobpost']."'>Apply</a>";
			}

		
		$json[] = array(
			0 => $row['jobtitle'],
			1 => $row['companyname'],
			2 => $row['minimumsalary'],
			3 => $row['maximumsalary'],
			4 => $row['vacancy'],
			5 => $row['qualification'],
			6 => $apply,
			);
	}

	echo json_encode($json);
	
}