<?php

	require_once '../dbConnection.php';
	require_once '../controller/adminfunctions.php';
	$q=$_GET['q'];
	$search=$_GET['search'];
	$filter=$_GET['filter'];
	$i=0;
	$begining=$_GET['begining'];
	if($_GET['end']<=$filter)
		{$end=$filter;}
	else
		{$end=$_GET['end'];}
	$users=fetch_user_bytype($q);
	$countusers=count($users);
	$pages = ceil($countusers/$filter);
	$pagecount=$_GET['pagecount'];
	echo "<div class='table-responsive-xl'>";
    echo "<table class='rounded-2 table-hover table table-striped'>";
	    echo "<thead>";
		    echo "<tr>";
			    echo "<th>USER ID</th>";
			    echo "<th>FIRST NAME</th>";
			    echo "<th>LAST NAME</th>";
			    echo "<th>USER NAME</th>";
			    echo "<th>USER TYPE</th>";
			    echo "<th>EMAIL</th>";
			    echo "<th>ADDRESS</th>";
			    echo "<th>PHONE</th>";
			    echo "<th>DATE OF CREATION</th>";
			    echo "<th></th>";
		    echo "</tr>";
	    echo "<thead>";
    	echo "<tbody>";
    if(!empty($search))
    {
    	$selectedusers=array();
    	$search=strtolower($search);
    	foreach ($users as $i => $user) 
    	{
    		foreach($user as $match)
    		{	
    			$match=strval($match);
    			$match=strtolower($match);
    			if(stristr($match, $search))
    			{	
    				array_push($selectedusers,$user);
    				break;
    			}
    		}
    		
    	}
    	$users=$selectedusers;
    	$countusers=count($users);
		$pages = ceil($countusers/$filter);

    }
    if($countusers<=$end)
    {
    	$end=$countusers;
    }
    if(!empty($users))
    {
	    for($i=$begining; $i<$end; $i++)
	    {
	    	$id='"'.$users[$i]['user_id'].'"';
			echo "<tr>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['user_id'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['first_name'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['last_name'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['user_name'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['user_type'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['user_email'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['address'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['phone'] . "</td>";
				echo "<td onclick='viewprofile(".$id.")'>" . $users[$i]['created_at'] . "</td>";
				
				echo "<td>" . "<button type='button' id='editbutton' class='btn btn-warning' onclick='editpageredirect(".$id.")'>Edit</button>" . "</td>";
			echo "</tr>";
			echo "<tr id='viewprofilerow".$users[$i]['user_id']."' style='display:none;' class='table-info'>";
				echo "<td colspan='10'>"."<div id='editprofile' class='container-fluid'>"."
						<div class='row'>
							<div class='col-sm headerdisplaynone'>
							</div>
								<div id='editaddadmindiv' class='shadow p-3 mb-5 bg-white rounded'>
									<form name='editadminform' action='getusers.php' onsubmit='return validateeditadminForm()' method='POST' class='rounded' style='padding: 15px;' enctype='multipart/form-data'>
										<div class='row mb-2'>
											<div class='col-11 text-center'>
												<h3><span class='badge shadow badge-pill badge-success' style='text-align: center;'>VIEW PROFILE OF ".$users[$i]['user_name']."</span></h3>
											</div>
											<div class='col-1'>
												<button type='button' class='btn-close' aria-label='Close' onclick='viewprofile(".$id.")'></button>
											</div>
										</div>
										<div class='form-group mb-3'>
											<div class='input-group flex-nowrap mb-2'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>ID</span>
											    </div>
											  	<input type='text' class='form-control' name='userid' value='".$users[$i]['user_id']."'   id='userid' placeholder='Userid' aria-label='Userid' aria-describedby='addon-wrapping' readonly>
											</div>
											
										</div>
										<div class='form-group mb-3'>
											<div class='input-group flex-nowrap mb-2'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>Type</span>
											    </div>
											  	<input type='text' class='form-control' name='type' value='".$users[$i]['user_type']."' id='type' placeholder='Type' aria-label='Type' aria-describedby='addon-wrapping' readonly>
											</div>
											
										</div>
										<div class='row mb-2'>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-1'>
											    	<span class='input-group-text' id='addon-wrapping'>First Name</span>
											        <input type='text' class='form-control' name='firstname' value='".$users[$i]['first_name']."'  id='firstname' placeholder='Name' aria-describedby='addon-wrapping' readonly>
											        
											    </div>
										    </div>
										    <div class='col mb-2'>
											    <div class='form-group input-group flex-nowrap mb-1'>
											    	<span class='input-group-text' id='addon-wrapping'>Last Name</span>
											        <input type='text' class='form-control' name='lastname' value='".$users[$i]['last_name']."'  id='lastname' placeholder='Name' aria-describedby='addon-wrapping' readonly>
											        
											    </div>
											    
										    </div>
										</div>
										<div class='form-group mb-3'>
											<div class='input-group flex-nowrap mb-2'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>Username</span>
											    </div>
											  	<input type='text' class='form-control' name='username' value='".$users[$i]['user_name']."'   id='username' placeholder='Username' aria-label='Username' aria-describedby='addon-wrapping' readonly>
											</div>
											
										</div>
										 <div class='form-group mb-3'>
										    <div class='input-group flex-nowrap mb-1'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>Password</span>
											    </div>
											    <input type='text' class='form-control' name='password' value='".$users[$i]['user_password']."' id='password' placeholder='Input your password' aria-describedby='addon-wrapping' readonly>
											</div>
											
									    </div>
										<div class='form-group mb-3'>
											<div class='input-group flex-nowrap mb-1'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>Email</span>
											    </div>
											    <input type='text' class='form-control' name='email' value='".$users[$i]['user_email']."'  id='email' placeholder='name@example.com' aria-describedby='addon-wrapping' readonly>
											</div>
										    
									    	
										</div>
										<div class='form-group mb-3'>
											<div class='input-group flex-nowrap mb-1'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>Address</span>
											    </div>
											    <input type='text' class='form-control' name='address' id='address' value='".$users[$i]['address']."'  placeholder='House # , Block # , Road # , Flat # , Area , City' aria-describedby='addon-wrapping' readonly>
											</div>
										   
									    	
										</div>
										<div class='form-group mb-3'>
											<div class='input-group flex-nowrap mb-1'>
											    <div class='input-group-prepend'>
											    	<span class='input-group-text' id='addon-wrapping'>Phone</span>
											    </div>
											    <input type='text' class='form-control' name='phone' value='".$users[$i]['phone']."'   id='phone' placeholder='+880' aria-describedby='addon-wrapping' readonly>
											</div>
									    	
										</div>
									    <button type='button' id='editbutton' class='btn btn-warning' onclick='editpageredirect(".$id.")'>Edit</button>
								    </form>
								</div>
							<div class='col-sm headerdisplaynone'>
							</div>
						</div>".
				"</div>"."</td>";
			echo "</tr>";
			echo "<tr style='display:none;'>";
				echo "<td colspan='10'>"."</td>";
			echo "</tr>";
		}
	}
	else
    {
			echo "<tr>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>".'EMPTY'."</td>";
				echo "<td>" . "<button type='button' id='editbutton' class='btn btn-warning disabled'>Edit</button>" . "</td>";
			echo "<tr>";

    }
		echo "</tbody>";
	echo "</table>";
	$pagestr='"'.$q.'","'.$pagecount.'","'.$pages.'","'.$begining.'","'.$end.'","'.$countusers.'","'.$search.'","'.$filter.'"';
	echo "<nav aria-label='Page navigation example'>
		  <ul class='pagination'>
		    <li class='page-item'><a class='page-link' href='#' onclick='pagedown(".$pagestr.")'>Previous</a></li>
		    <li class='page-item'><a class='page-link' href='#'>Page ".$pagecount."/".$pages."</a></li>
		    <li class='page-item'><a class='page-link' href='#' onclick='pageup(".$pagestr.")' >Next</a></li>
		  </ul>
		</nav>";
	echo "<div>";

?>