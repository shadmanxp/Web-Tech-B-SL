$(function() {
  $(window).resize(function() {
    var wSize = $(window).width();
    if(wSize >= 576) {
      if(document.getElementById("logindiv").classList.contains("col-sm-auto"))
      {
        $('#logindiv').removeClass('col-sm-auto')
        $('#logindiv').addClass('col-7')
      }
      else
      {
        $('#logindiv').addClass('col-7')
      }
      //.addClass('col-4');
    } 
    else {
      if(document.getElementById("logindiv").classList.contains("col-7"))
      {
        $('#logindiv').removeClass('col-7')
        $('#logindiv').addClass('col-sm-auto')
      }
      else
      {
        $('#logindiv').addClass('col-sm-auto')
      }
      //.addClass('col-sm-auto');
    }
  });
});
