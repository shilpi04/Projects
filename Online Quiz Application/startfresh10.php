<html>
<head><title>Start</title>
	</head>
	<body bgcolor="blue" text="white">
<?php
session_start();
if($_SESSION['name']=='admin')
{
echo'<font face="verdana"><b>';
	if(!isset($_POST['sub10']))
	{			$_SESSION['q9']=$_POST['q9'];
				$server="localhost";
				$user="root";
				$password="";
				$database="quiz";
				$string="Submit Test";
				$con=mysqli_connect($server,$user,$password,$database);
					if(!$con)
					echo 'Connection failed !';
					else
				echo'
				<center><h2>Quiz Page</h2><hr><br><center>Test has started !<br>Instructions : It is compulsory to attempt all questions.<br>
				1 Mark will be awarded for right answer.<br>- 0.5 Mark will be deducted for wrong answer or for no response.<br>
				0.5 Mark will be awarded in case your score is not a whole number.<br>
				Total Marks : 10<br>The "<i>'.$string.'</i>" button submits the test and displays the result.<br><br><br><br></center>';
				echo'<form name="formsdf4dfds53df2" action="startfresh10.php" method="post">';
				
				$i=10;
				if($i==10)
				{
					echo '<font face="verdana"><center><table>';
					$query="select number,question,option1,option2,option3,option4 from questions where number=$i";
					$result=mysqli_query($con,$query);
						if($result)
						{
							while ($row=mysqli_fetch_array($result)) // jab tak usko data milte rahe //  jab 
							{
							echo'<tr><th><center>Q'.$row[0].'.</th><th colspan="2"><p align="left">'.$row[1].'</th></tr>';
							echo'<tr><th><center>A :</th><th><p align="left">'.$row[2].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="1"></th></tr>';
							echo'<tr><th><center>B :</th><th><p align="left">'.$row[3].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="2"></th></tr>';
							echo'<tr><th><center>C :</th><th><p align="left">'.$row[4].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="3"></th></tr>';
							echo'<tr><th><center>D :</th><th><p align="left">'.$row[5].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="4"></th></tr>';
							}
						echo '</table><br><br><input type="submit" name="sub10" value="Submit">';
						}
						
				
				}
				
				echo '</form>';
				
				//if($_POST['sub4']) $i=3;
				//echo '<input type="submit" name="submute" value="Submit Test">';
				
				
		}
	
	
			else 
			{
			$_SESSION['q10']=$_POST['q10'];
			echo ' '.$_SESSION['q1'].' '.$_SESSION['q2'].' '.$_SESSION['q3'].' '.$_SESSION['q4'].' '.$_SESSION['q5'].' '.$_SESSION['q6'].' ';
			echo ' '.$_SESSION['q7'].' '.$_SESSION['q8'].' '.$_SESSION['q9'].' '.$_SESSION['q10'].' ';
			//header('Location: startfresh10.php');
			
			$marks=0;
			$server="localhost";
			$user="root";
			$password="";
			$database="quiz";
			$con=mysqli_connect($server,$user,$password,$database);
			if(!$con)
			echo 'Connection failed !';
			else
			$result1=mysqli_query($con,"select answer from questions");
				if($result1)
				{	$i=1;
					while ($row=mysqli_fetch_array($result1)) // jab tak usko data milte rahe //  jab tak usko row mein value milte rahega
					{
					$answerwa[$i]=$row[0];
					$i++;
					}
				}
				
				for($i=1;$i<=10;$i++)
				{$answerac[$i]=$_SESSION['q'.$i.''];}
				
				/*for($i=1;$i<=10;$i++)
				echo ' '.$answerac[$i].' '; 
				
				
				echo '<br>';
				for($i=1;$i<=10;$i++)
				echo ' '.$answerwa[$i].' ';*/
				
				for($i=1;$i<=10;$i++)
				if($answerac[$i]==$answerwa[$i]) $marks++; else $marks=$marks-.5;
				
				
				
				$userlogin=$_SESSION['animal'];
				$pass=$_SESSION['password'];
				$server="localhost";
				$user="root";
				$password="";
				$database="quiz";
				//echo ''.$userlogin.''.$pass.'';
				$con=mysqli_connect($server,$user,$password,$database);
				if(!$con)
				echo 'Connection failed !';
				$result3=mysqli_query($con,"select * from users where name='$userlogin' and password=$pass");
				//echo "select * from users where name='$userlogin' and password=$pass";
				$row=mysqli_fetch_array($result3);
				$roll=$row[2];
				
				//echo ''.$roll;

				$result1=mysqli_query($con,"insert into result values('$userlogin',$roll,$marks)");
				//echo "insert into result values('$userlogin',$roll,$marks)";
				$result2=mysqli_query($con,"update users set status=3 where name='$userlogin' and roll=$roll");
				//echo "update users set status=3 where name='$userlogin' and roll=$roll";
				//kill session after changing status to 3
				header('Location: Result.php');
			
			}
}

else if($_SESSION['name']=='normaluser')
{
echo'<font face="verdana"><b>';
	if(!isset($_POST['sub10']))
	{			$_SESSION['q9']=$_POST['q9'];
				$server="localhost";
				$user="root";
				$password="";
				$database="quiz";
				$string="Submit Test";
				$con=mysqli_connect($server,$user,$password,$database);
					if(!$con)
					echo 'Connection failed !';
					else
				echo'
				<center><h2>Quiz Page</h2><hr><br><center>Test has started !<br>Instructions : It is compulsory to attempt all questions.<br>
				1 Mark will be awarded for right answer.<br>- 0.5 Mark will be deducted for wrong answer or for no response.<br>
				0.5 Mark will be awarded in case your score is not a whole number.<br>
				Total Marks : 10<br>The "<i>'.$string.'</i>" button submits the test and displays the result.<br><br><br><br></center>';
				echo'<form name="formsdf4dfds53df2" action="startfresh10.php" method="post">';
				
				$i=10;
				if($i==10)
				{
					echo '<font face="verdana"><center><table>';
					$query="select number,question,option1,option2,option3,option4 from questions where number=$i";
					$result=mysqli_query($con,$query);
						if($result)
						{
							while ($row=mysqli_fetch_array($result)) // jab tak usko data milte rahe //  jab 
							{
							echo'<tr><th><center>Q'.$row[0].'.</th><th colspan="2"><p align="left">'.$row[1].'</th></tr>';
							echo'<tr><th><center>A :</th><th><p align="left">'.$row[2].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="1"></th></tr>';
							echo'<tr><th><center>B :</th><th><p align="left">'.$row[3].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="2"></th></tr>';
							echo'<tr><th><center>C :</th><th><p align="left">'.$row[4].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="3"></th></tr>';
							echo'<tr><th><center>D :</th><th><p align="left">'.$row[5].'</th><th><p align="right"><input type="radio" name="q'.$i.'" value="4"></th></tr>';
							}
						echo '</table><br><br><input type="submit" name="sub10" value="Submit">';
						}
						
				
				}
				
				echo '</form>';
				
				//if($_POST['sub4']) $i=3;
				//echo '<input type="submit" name="submute" value="Submit Test">';
				
				
		}
	
	
			else 
			{
			$_SESSION['q10']=$_POST['q10'];
			echo ' '.$_SESSION['q1'].' '.$_SESSION['q2'].' '.$_SESSION['q3'].' '.$_SESSION['q4'].' '.$_SESSION['q5'].' '.$_SESSION['q6'].' ';
			echo ' '.$_SESSION['q7'].' '.$_SESSION['q8'].' '.$_SESSION['q9'].' '.$_SESSION['q10'].' ';
			//header('Location: startfresh10.php');
			
			$marks=0;
			$server="localhost";
			$user="root";
			$password="";
			$database="quiz";
			$con=mysqli_connect($server,$user,$password,$database);
			if(!$con)
			echo 'Connection failed !';
			else
			$result1=mysqli_query($con,"select answer from questions");
				if($result1)
				{	$i=1;
					while ($row=mysqli_fetch_array($result1)) // jab tak usko data milte rahe //  jab tak usko row mein value milte rahega
					{
					$answerwa[$i]=$row[0];
					$i++;
					}
				}
				
				for($i=1;$i<=10;$i++)
				{$answerac[$i]=$_SESSION['q'.$i.''];}
				
				/*for($i=1;$i<=10;$i++)
				echo ' '.$answerac[$i].' '; 
				
				
				echo '<br>';
				for($i=1;$i<=10;$i++)
				echo ' '.$answerwa[$i].' ';*/
				
				for($i=1;$i<=10;$i++)
				if($answerac[$i]==$answerwa[$i]) $marks++; else $marks=$marks-.5;
				
				
				
				$userlogin=$_SESSION['animal'];
				$pass=$_SESSION['password'];
				$server="localhost";
				$user="root";
				$password="";
				$database="quiz";
				//echo ''.$userlogin.''.$pass.'';
				$con=mysqli_connect($server,$user,$password,$database);
				if(!$con)
				echo 'Connection failed !';
				$result3=mysqli_query($con,"select * from users where name='$userlogin' and password=$pass");
				//echo "select * from users where name='$userlogin' and password=$pass";
				$row=mysqli_fetch_array($result3);
				$roll=$row[2];
				
				//echo ''.$roll;

				$result1=mysqli_query($con,"insert into result values('$userlogin',$roll,$marks)");
				//echo "insert into result values('$userlogin',$roll,$marks)";
				$result2=mysqli_query($con,"update users set status=3 where name='$userlogin' and roll=$roll");
				//echo "update users set status=3 where name='$userlogin' and roll=$roll";
				//kill session after changing status to 3
				header('Location: Result.php');
			
			}
}
else header('Location: Login.php');

	?>
</body>
</html>