<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
			$count;
			if(empty($_POST['Name'])) $count++;
			$Name = $_POST['Name'];
			if(empty($_POST['ID'])) $count++;
  			$ID = $_POST['ID'];
  			if(empty($_POST['Course'])) $count++;
  			$Course = $_POST['Course'];
  			if(empty($_POST['Grade'])) $count++;
  			$Grade = $_POST['Grade'];
  			if(empty($_POST['CreditCard'])) $count++;
  			$CreditCard = $_POST['CreditCard'];
  			if(isset($_POST['cc'])) $count++;
  			$cc = $_POST['cc'];
  			$arr = array($Name,$ID,$CreditCard,$cc);
  
		# Ex 4 : 
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		if ($count!=0){
		?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely.<?=$count?> <a href="./gradestore.html">Try again?</a></p>
		
		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		} elseif (strpos($Name,'-')==false&&strpos($Name,' ')==false&&(ctype_alpha($Name) == NULL)) { 
		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="./gradestore.html">Try again?</a></p>
		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		} elseif(!is_numeric($CreditCard)||strlen($CreditCard)!=16){
		?>

			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="./gradestore.html">Try again?</a></p>

		<?php
		} else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<ul> 
			<li>Name: <?=$Name?></li>
			<li>ID: <?=$ID?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?=$Course?></li>
			<li>Grade: <?=$Grade?></li>
			<li>Credit Card: <?=$CreditCard?> (<?=$cc?>) <?=$count?></li>
		</ul>
		
		
		<?php
			$filename = "loosers.txt";
			foreach ($arr as $value) {
				file_put_contents($filename,$value,FILE_APPEND );
				file_put_contents($filename,";",FILE_APPEND );
			}
			file_put_contents($filename,"\n",FILE_APPEND );



			$str = file_get_contents($filename);
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		<p>Here are all the loosers who have submitted here:</p>

		<?=$str?>
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

		
		<?php
		}
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			
			function processCheckbox($names){ }
		?>
		
	</body>
</html>
