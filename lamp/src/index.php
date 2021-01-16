<html>
<body>


<?php
include("functions.php");
include("build.php");


function AddCust(){
	print("<form action='' method='post'>");
	print("Name: <input type='text' name='name'><br>");
	print("E-mail: <input type='text' name='email'><br>");
	print("<input type='submit' name='insert' value='Add'>");
	print("</form>");
}

function EditCust($id, $name, $email){
	print("<form action='' method='post'>");
	print("Name: <input type='text' name='name' value='$name'><br>");
	print("E-mail: <input type='text' name='email' value='$email'><br>");
	print("<input type='hidden' name='custID' value='$id'>");
	print("<input type='submit' name='update' value='Update'>");
	print("</form>");
}



function ShowCust(){
	print("<table>");
	print("<th>ID</th>");
	print("<th>Name</th>");
	print("<th>Email</th>");

	$info = ReturnQuery("select * from CUSTOMERS order by customerID;");
	while ($row = mysqli_fetch_row($info)){
		print("<tr>");
		print("<td>$row[0]</td>");
		print("<td>$row[1]</td>");
		print("<td>$row[2]</td>");

		print("<td>");
			print("<form action='' method='post'>");
			print("<input type='hidden' name='custID' value='$row[0]'>");
			print("<td><input type='submit' name='edit' value='Edit'/></td>");
			print("</form>");
		print("</td>");

			print("<td>");
			print("<form action='' method='post'>");
			print("<input type='hidden' name='custID' value='$row[0]'>");
			print("<td><input type='submit' name='delete' value='Delete'/></td>");
			print("</form>");
			print("</td>");

		print("</tr>");

	}
	print("</table>"); 
	print("</div>");
}

if (isset($_POST['edit'])){
	$custID = $_POST['custID']; 
	$r = ReturnQuery("select * from CUSTOMERS where customerID = $custID;");
	$row = mysqli_fetch_row($r);
	$id = $row[0];
	$name = $row[1];
	$email = $row[2];
	EditCust($id, $name, $email);
	ShowCust();
}

elseif (isset($_POST['update'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$custID = $_POST['custID'];

	Query("update CUSTOMERS set name = '$name', email = '$email' where customerID = '$custID';");
	AddCust();
	ShowCust();
}

elseif (isset($_POST['delete'])){
    $custID = $_POST['custID']; 
	Query("delete from CUSTOMERS where customerID = $custID;");
	AddCust();
	ShowCust();
}

elseif (isset($_POST['insert'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	Query("insert into CUSTOMERS (name, email) values ('$name', '$email');");
	AddCust();
	ShowCust();
}
else {
	AddCust();
	ShowCust();
}

?>


</body>
</html>
