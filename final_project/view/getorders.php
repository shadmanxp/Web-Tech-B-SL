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
	$orders=fetch_orders($q);
	$countorders=count($orders);
	$pages = ceil($countorders/$filter);
	$pagecount=$_GET['pagecount'];
	echo "<div class='table-responsive-xl'>";
    echo "<table class='rounded-2 table-hover table table-striped'>";
	    echo "<thead>";
		    echo "<tr>";
			    echo "<th>ORDER ID</th>";
			    echo "<th>ORDER BY</th>";
			    echo "<th>SHIPPING ADDRESS</th>";
			    echo "<th>PRODUCT NAME</th>";
			    echo "<th>QUANTITY</th>";
			    echo "<th>SHIPPING COST</th>";
			    echo "<th>TOTAL</th>";
			    echo "<th>STATUS</th>";
			    echo "<th>SHIPPER</th>";
		    echo "</tr>";
	    echo "<thead>";
    	echo "<tbody>";
    if(!empty($search))
    {
    	$selectedorders=array();
    	$search=strtolower($search);
    	foreach ($orders as $i => $order) 
    	{
    		foreach($order as $match)
    		{	
    			$match=strval($match);
    			$match=strtolower($match);
    			if(stristr($match, $search))
    			{	
    				array_push($selectedorders,$order);
    				break;
    			}
    		}
    		
    	}
    	$orders=$selectedorders;
    	$countorders=count($orders);
		$pages = ceil($countorders/$filter);

    }
    if($countorders<=$end)
    {
    	$end=$countorders;
    }
    if(!empty($orders))
    {
	    for($i=$begining; $i<$end; $i++)
	    {
	    	$id='"'.$orders[$i]['order_id'].'"';
			echo "<tr>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['order_id'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['full_name'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['shipping_address'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['product_name'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['quantity'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['shipping_cost'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['total'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['order_status'] . "</td>";
				echo "<td onclick='vieworder(".$id.")'>" . $orders[$i]['shipper_name'] . "</td>";
			echo "</tr>";
			echo "<tr id='vieworderrow".$orders[$i]['order_id']."' style='display:none;' class='table-info'>";
				echo "<td colspan='9'>"."<div id='editprofile' class='container-fluid'>"."
						<div class='row'>
							<div class='col-sm headerdisplaynone'>
							</div>
								<div id='vieworderdiv' class='shadow p-3 mb-5 bg-white rounded'>
										<div class='row mb-2'>
											<div class='col-11 text-center'>
												<h3><span class='badge shadow badge-pill badge-success' style='text-align: center;'>ORDER NUMBER ".$orders[$i]['order_id']."</span></h3>
											</div>
											<div class='col-1'>
												<button type='button' class='btn-close' aria-label='Close' onclick='vieworder(".$id.")'></button>
											</div>
										</div>
										<div class='row'>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>ORDER ID</span>
											        <input type='text' class='form-control' name='order_id' value='".$orders[$i]['order_id']."' readonly>
											        
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>ORDERED BY</span>
											        <input type='text' class='form-control' name='full_name' value='".$orders[$i]['full_name']."' readonly>
											    </div>
										    </div>
										    <div class='col '>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>ID</span>
											        <input type='text' class='form-control' name='user_id' value='".$orders[$i]['user_id']."' readonly>
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>CONTACT NO:</span>
											        <input type='text' class='form-control' name='phone' value='".$orders[$i]['phone']."' readonly>
											        
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>ORDER DATE:</span>
											        <input type='text' class='form-control' name='order_date' value='".$orders[$i]['order_date']."' readonly>
											        
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>SHIPPING ADDRESS:</span>
											        <input type='text' class='form-control' name='shipping_address' value='".$orders[$i]['shipping_address']."' readonly>
											        
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>BILLING ADDRESS:</span>
											        <input type='text' class='form-control' name='billing_address' value='".$orders[$i]['billing_address']."' readonly>
											        
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>PRODUCT ID:</span >
											        <input type='text' class='form-control' name='product_id' value='".$orders[$i]['product_id']."' readonly>
											    </div>
										    </div>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>NAME:</span>
											        <input type='text' class='form-control' name='product_name' value='".$orders[$i]['product_name']."' readonly>
											    </div>
										    </div>
										    <div class='col '>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>CATAGORY:</span>
											        <input type='text' class='form-control' name='category_name' value='".$orders[$i]['category_name']."' readonly>
											    </div>
										    </div>
										    <div class='col '>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>QUANTITY:</span>
											        <input type='text' class='form-control' name='quantity' value='".$orders[$i]['quantity']."' readonly>
											    </div>
										    </div>
										    <div class='col '>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>SELLER ID:</span>
											        <input type='text' class='form-control' name='farmer_seller' value='".$orders[$i]['farmer_seller']."' readonly>
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>SUB TOTAL:</span >
											        <input type='text' class='form-control' name='sub_total' value='".$orders[$i]['sub_total']." TK' readonly>
											    </div>
										    </div>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>SHIPPING FEE:</span>
											        <input type='text' class='form-control' name='shipping_cost' value='".$orders[$i]['shipping_cost']." TK' readonly>
											    </div>
										    </div>
										    <div class='col '>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>TOTAL:</span>
											        <input type='text' class='form-control' name='total' value='".$orders[$i]['total']." TK' readonly>
											    </div>
										    </div>
										</div>
										<div class='row '>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2 '>
											    	<span class='input-group-text' id='addon-wrapping'>STATUS:</span >
											        <input type='text' class='form-control' name='order_status' value='".$orders[$i]['order_status']."' readonly>
											    </div>
										    </div>
										    <div class='col'>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>DELIVERY MAN:</span>
											        <input type='text' class='form-control' name='shipper_name' value='".$orders[$i]['shipper_name']."' readonly>
											    </div>
										    </div>
										    <div class='col '>
											    <div class='form-group input-group flex-nowrap mb-2'>
											    	<span class='input-group-text' id='addon-wrapping'>CONTACT NO:</span>
											        <input type='text' class='form-control' name='contact_no' value='".$orders[$i]['contact_no']."' readonly>
											    </div>
										    </div>
										</div>
								</div>
							<div class='col-sm headerdisplaynone'>
							</div>
						</div>".
				"</div>"."</td>";
			echo "</tr>";
			echo "<tr style='display:none;'>";
				echo "<td colspan='9'>"."</td>";
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
				echo "<td>".'EMPTY'."</td>";
			echo "<tr>";

    }
		echo "</tbody>";
	echo "</table>";
	$pagestr='"'.$q.'","'.$pagecount.'","'.$pages.'","'.$begining.'","'.$end.'","'.$countorders.'","'.$search.'","'.$filter.'"';
	echo "<nav aria-label='Page navigation example'>
		  <ul class='pagination'>
		    <li class='page-item'><a class='page-link' href='#' onclick='pagedown(".$pagestr.")'>Previous</a></li>
		    <li class='page-item'><a class='page-link' href='#'>Page ".$pagecount."/".$pages."</a></li>
		    <li class='page-item'><a class='page-link' href='#' onclick='pageup(".$pagestr.")' >Next</a></li>
		  </ul>
		</nav>";
	echo "<div>";

?>