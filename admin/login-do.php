<?php
	if(isset($_REQUEST['u_name']) && isset($_REQUEST['u_pass']))
	{	 
		include("../root/db_connection.php");
		$user_name=str_replace("'","",$_REQUEST['u_name']);
		$user_pass=str_replace("'","",$_REQUEST['u_pass']);
		$query=$db->query("select * from user_information where user_name='$user_name' and user_pass='$user_pass' and delstatus=0") or die("error");	
		if($query->rowCount()==0)
		{
			echo "err";
		}
		else
		{
			while($result=$query->fetch(PDO::FETCH_ASSOC))
			{
				if($user_name==$result['user_name'] && $user_pass==$result['user_pass'])
				{
					$admin_id=$result['uid'];
					$expireTime=time()+60*60*24*30;
					setcookie("login",$admin_id,$expireTime);
					echo "succ";
				}
				else
				{
					echo "err";
				}
			}
		}
	}
	else
	{
		echo "err";
	}
?>

