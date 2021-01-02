function showwelcomeboard($id)
{
	var xhttp;  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("view").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "farmer1welcomeboard.php?id="+$id, true);
  xhttp.send();
}
function viewfarmerprofile($id,$firstnameE,$lastnameE,$usernameE,$emailE,$previouspasswordE,$passwordE,$repeatpasswordE,$addressE,$phoneE)
{
	var xhttp;  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("view").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "viewfarmerprofile.php?id="+$id+"&firstnameE="+$firstnameE+"&lastnameE="+$lastnameE+"&usernameE="+$usernameE+"&emailE="+$emailE+"&previouspasswordE="+$previouspasswordE+"&passwordE="+$passwordE+"&repeatpasswordE="+$repeatpasswordE+"&addressE="+$addressE+"&phoneE="+$phoneE, true);
  xhttp.send();
}