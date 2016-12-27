function GetShortURL() {
  $.ajax({
    url:'/php/getshorturl.php',
    type:'POST',
    cache:false,
    data: {longurl:$('#longurl').val(), desiredurl:$('#desiredurl').val()},
    success: function(data) {
      $('#shorturl').val(data);
    }
  })
}
