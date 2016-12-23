function GetShortURL() {
  $.ajax({
    url:'/php/getshorturl.php',
    type:'POST',
    cache:false,
    data: {longurl:$('#longurl').val(), desiredurl:$('#desiredurl').val()},
    success: function(data) {
      if (data.indexOf('db_error') + 1) {
        alert('There is no connection to the DB')
      }
      else {
        $('#shorturl').val(data);
      }
    }
  })
}
