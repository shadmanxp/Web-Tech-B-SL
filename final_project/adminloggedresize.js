$(function() {
  $(window).resize(function() {
    var wSize = $(window).width();
    if(wSize >= 768) {
      if(document.getElementById("addadmindiv").classList.contains("col-sm-auto"))
      {
      	$('#addadmindiv').addClass('col-sm-auto')}
      //.addClass('col-4');
    } 
    else {
        $('#addadmindiv').addClass('col-sm-auto')
      //.addClass('col-sm-auto');
    }
    if (wSize<=1391) {
    	if(document.getElementById("navbardiv").classList.contains("btn-group-vertical"))
	    	{
	    		$('#navbardiv').removeClass('btn-group-vertical')
	    	}
    	}
    else{
    	$('#navbardiv').addClass('btn-group-vertical')
    }
  });
});