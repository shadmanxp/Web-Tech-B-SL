function showusers($str,$pagecount,$begining,$end,$search) {
  if($str=="notset")
  {
    $str=document.getElementById("selectuser").value;
  }
  $filter=document.getElementById("filter").value;
  var xhttp;  
  if ($str == "") {
    document.getElementById("showusers").innerHTML = "Select user type to show list here...";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showusers").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getusers.php?q="+$str+"&pagecount="+$pagecount+"&begining="+$begining+"&end="+$end+"&search="+$search+"&filter="+$filter, true);
  xhttp.send();
}

function showorders($str,$pagecount,$begining,$end,$search)
{
  if($str=="notset")
  {
    $str=document.getElementById("selectorder").value;
  }
  $filter=document.getElementById("filter").value;
  var xhttp;  
  if ($str == "") {
    document.getElementById("showorders").innerHTML = "Select order status to show list here...";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("showorders").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getorders.php?q="+$str+"&pagecount="+$pagecount+"&begining="+$begining+"&end="+$end+"&search="+$search+"&filter="+$filter, true);
  xhttp.send();

}

function pageup($str,$pagecount,$pages,$begining,$end,$countusers,$search,$filter)
  {
    if ($pagecount<$pages) {
      $pagecount++;
      $begining=Number($begining)+Number($filter);
      $end=Number($end)+Number($filter);
      if ($end>=$countusers) { $end=$countusers}
    }
    if($str=='admin' || $str=='farmer' || $str=='client' || $str=='allusers')
      {
        showusers($str,$pagecount,$begining,$end,$search);
      }
    else if($str=='allorders'|| $str=='processing' || $str=='delivered')
      {
        showorders($str,$pagecount,$begining,$end,$search); 
      }
  }
function pagedown($str,$pagecount,$pages,$begining,$end,$countusers,$search,$filter)
  {
    if ($pagecount>'1') {
      $pagecount--;
      $begining=Number($begining)-Number($filter);
      if ($end>=$countusers)
      {
        $end=Number($pages)*Number($filter)-Number($filter);
      }
      else
      {
        $end=Number($end)-Number($filter);
      }

    }
    if($str=='admin' || $str=='farmer' || $str=='client' || $str=='allusers')
      {
        showusers($str,$pagecount,$begining,$end,$search);
      }
    else if($str=='allorders'|| $str=='processing' || $str=='delivered')
      {
        showorders($str,$pagecount,$begining,$end,$search); 
      }
    
  }
