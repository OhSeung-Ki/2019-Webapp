<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		# } elseif () {
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		# } elseif () {
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		-->

		<?php
		# if all the validation and check are passed
		# } else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<?php $course_list = ["cse326", "cse107", "cse603", "cin870"]?>
		<ul>
			<li>Name: <?=	$_POST['name'] ?> </li>
			<li>ID: <?= $_POST['id'] ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= processCheckbox($course_list) ?></li>
			<li>Grade: <?= $_POST['grade'] ?></li>
			<li>Credit Card: <?= $_POST['cc_num'] ?> (<?= $_POST['cc_type']?>)</li>
		</ul>
			<p>Here are all the loosers who have submitted here:</p>
		<?php
			file_put_contents("loosers.txt",$_POST['name'].";".$_POST['id'].";".$_POST['cc_num'].";".$_POST['cc_type']."\n", FILE_APPEND);
			$loosers = file_get_contents("loosers.txt");
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		<pre><?= $loosers ?></pre>

		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->


		<?php
		# }
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				$checked_name = [];
				foreach($names as $name){
					$name = strtoupper($name);
					if(isset($_POST[$name]))array_push($checked_name , $name);
				}
				$returnstring = implode(", ",$checked_name);
				return $returnstring;
				}
		?>
	</body>
</html>
