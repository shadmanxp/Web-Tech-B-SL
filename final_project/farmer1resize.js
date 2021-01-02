$(function() {
  $(window).resize(function() {
    var wSize = $(window).width();
    if(wSize >= 576) {
      if(document.getElementById("registration-box").classList.contains("col-12"))
      {
        $('#registration-box').removeClass('col-12')
        $('#registration-box').addClass('col-7')
      }
      else
      {
        $('#registration-box').addClass('col-7')
      }
      //.addClass('col-4');
    } 
    else {
      if(document.getElementById("registration-box").classList.contains("col-7"))
      {
        $('#registration-box').removeClass('col-7')
        $('#registration-box').addClass('col-12')
      }
      else
      {
        $('#registration-box').addClass('col-12')
      }
      //.addClass('col-sm-auto');
    }
  });
});