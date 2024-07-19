<?php session_start();?>
<html>
    <head>
	    <title>Microproject Evaluation Sheet</title>
        <link rel="stylesheet" href="bootstrap1/css/bootstrap.min.css" type="text/css"/>
        <script type="text/javascript" src="bootstrap1/js/bootstrap.min.js"></script>
		<script src="jquery.js"></script>
        
		<script src="bootstrap1/js/jquery-3.6.0.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       
		<link rel="stylesheet" href="styling.css" type="text/css"/>

		
    </head>
    <body style=" background-color:#bcd4e6;">
		<div class="container" ><b><p id="title1" class="shadow-sm" style="font-family:Abril Fatface; font-size:30px; color:#ffffff;"> Student List</p></b></div>
		<div class="row">
		<div class="col-lg-5" style="margin-left: 40px;">
			<table class="table table-primary table-hover shadow-lg" style="font-size:small">
				<tbody>
					<tr>
						<th>Roll No</th>
						<th>Name</th>
						<th>Status</th>
					</tr>
					<?php
						$db=mysqli_connect("localhost","root","","mp");
						if($db){
								$retval=mysqli_query($db,"select * from students;");
								if(mysqli_num_rows($retval)>0)
									{
										while($row=mysqli_fetch_assoc($retval)){
											?><tr>
											<td><?php echo $row["rollno"]?></td>
											<td><?php echo $row["name"]?></td>
											<td><?php echo $row["status"]?></td>
											</tr><?php
										}
									}
								}?>
					
				</tbody>
			</table>
		</div>
		<div class="col-lg-6 d-inline fw-bold shadow-lg" style="background-color:#e6e6fa; margin-left: 20px; margin-bottom: 20px; font-size:small">
				<form style="margin-top:30px;" action="second_page.php" method="POST" name="f1">
				Roll No. of Student 1:<input type="text" name="t1" style="margin-left: 20px; border:none;" class="shadow"/><br><br>
				Roll No. of Student 2:<input type="text" name="t2" style="margin-left: 20px; border:none;" class="shadow"/><br><br>
				Roll No. of Student 3:<input type="text" name="t3" style="margin-left: 20px; border:none;" class="shadow"/><br><br>
				Roll No. of Student 4:<input type="text" name="t4" style="margin-left: 20px; border:none;" class="shadow"/><br><br>
				<p class="fw-lighter">NOTE: If you don't want to pass all the fields, enter only fields you want to pass from first serially. Keep remaining fields empty.</p><br>
				Title of Micro Project: <input type="text" name="t5" style="margin-left: 15px; border:none;" class="shadow" size="50"required/><br>
				<p class="fw-lighter">NOTE: Must pass the title... </p><br>
				Course Outcomes:<br><br>
				<table class="table table-success table-striped shadow" style="font-size:small">
					<tbody>
					<tr>
						<th>CO</th>
						<th>Course Outcome</th> 
					</tr>
					<tr>
						<td>a</td>
						<td>Develop program using control statement</td>
					</tr>
					<tr>
						<td>b</td>
						<td>Perform operations based on arrays and graphics</td>
					</tr>
					<tr>
						<td>c</td>
						<td>Develop program by applying various object oriented concepts</td>
					</tr>
					<tr>
						<td>d</td>
						<td>Use form controls with validation to collect user input</td>
					</tr>
					<tr>
						<td>e</td>
						<td>Perform database operations using php</td>
					</tr>
					</tbody>
				</table><br>
				Select Outputs:<br>
				<input type="checkbox" style="margin-left:30px;" name="cb[]" value="Develop program using control statement.">a 
				<input type="checkbox" style="margin-left:30px;" name="cb[]" value="Perform operations based on arrays and graphics.">b 
				<input type="checkbox" style="margin-left:30px;" name="cb[]" value="Develop program by applying various object oriented concepts.">c 
				<input type="checkbox" style="margin-left:30px;" name="cb[]" value="Use form controls with validation to collect user input.">d
				<input type="checkbox" style="margin-left:30px;" name="cb[]" value="Perform database operations using php.">e <br><br>

				<center><input class="btn btn-primary shadow" id="btn-print-this" type="submit" name="s1" value="Submit"/></center>
			</form>
			<?php
			/*
				if(isset($_POST["s1"])){


					if(isset($_POST["t1"])&&isset($_POST["t2"])&&isset($_POST["t3"])&&isset($_POST["t4"]))
					{
					$total=4;
					$_SESSION['stotal']=$total;
					$r1=$_POST["t1"];
					$_SESSION['sr1']=$r1;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r1;");
					$r2=$_POST["t2"];
					$_SESSION['sr2']=$r2;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r2;");
					$r3=$_POST["t3"];
					$_SESSION['sr3']=$r3;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r3;");
					$r4=$_POST["t4"];
					$_SESSION['sr4']=$r4;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r4;");
     				}

				elseif(isset($_POST["t1"])&&isset($_POST["t2"])&&isset($_POST["t3"])){
					$total=3;
					$_SESSION['stotal']=$total;
					$r1=$_POST["t1"];
					$_SESSION['sr1']=$r1;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r1;");
					$r2=$_POST["t2"];
					$_SESSION['sr2']=$r2;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r2;");
					$r3=$_POST["t3"];
					$_SESSION['sr3']=$r3;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r3;");
				}

				elseif(isset($_POST["t1"])&&isset($_POST["t2"])){
					$total=2;
					$_SESSION['stotal']=$total;
					$r1=$_POST["t1"];
					$_SESSION['sr1']=$r1;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r1;");
					$r2=$_POST["t2"];
					$_SESSION['sr2']=$r2;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r2;");
				}

				else if(isset($_POST["t1"])){
					$total=1;
					$_SESSION['stotal']=$total;
					$r1=$_POST["t1"];
					$_SESSION['sr1']=$r1;
					echo"p".$r1;
					mysqli_query($db,"update students set status=\"selected\" where rollno=$r1;");
				}
				
				else{}

				if(!empty($_POST['cb'])){
					$count=count($_POST['cb']);
					$a[]=$_POST['cb'];
					$i=0;
						foreach($_POST['cb'] as $selected){
						echo"<p>.$selected.</p>";
						$i++;
					}
					$_SESSION['scount']=$count;
					$_SESSION['sa']=$a;
				}
		}		
				
			*/
			?>
		</div>
		</div>
	</body>
</html>