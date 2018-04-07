$('.delete').click(function() {
  const contactId = $(this)[0].attributes[0].value;
  $(this).parent().parent().remove();
  $.ajax({
    type: 'POST',
    url: 'delete.php',
    dataType: 'json',
    data: {
      contactId
    },
    success: function(data) {
      console.log('AJAX DELETE WAS CALLED:', data);
    },
    error: function() {
      console.log('THERE WAS AN ERROR');
    }
  });
});
