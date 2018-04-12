$('.delete').click(function() {
  const contactId = $(this)[0].attributes[0].value;
  $(this).parent().parent().remove();
  $.ajax({
    type: 'POST',
    url: 'includes/delete.php',
    dataType: 'json',
    data: {
      contactId
    },
    error: function() {
      $('.error').text(
        'Sorry there was an error with your request. Please try again later.'
      );
    }
  });
});

$('.add').click(function() {
  $.ajax({
    type: 'POST',
    url: 'includes/add.php',
    data: {
      first_name: $('.firstName').val(),
      last_name: $('.lastName').val(),
      email: $('.email').val(),
      phone: $('.phone').val()
    },
    dataType: 'json',
    success: function(data) {
      console.log(data);
    },
    error: function() {
      $('.error').text(
        'Sorry there was an error with your request. Please try again later.'
      );
    }
  });
  const firstNameVal = $('.firstName').val();
  const lastNameVal = $('.lastName').val();
  const emailVal = $('.email').val();
  const phoneVal = $('.phone').val();
  let newContact = $('<tr>');
  let firstNameElement = $('<td>', {
    text: firstNameVal
  });
  let lastNameElement = $('<td>', {
    text: lastNameVal
  });
  let emailElement = $('<td>', {
    text: emailVal
  });
  let phoneElement = $('<td>', {
    text: phoneVal
  });
  console.log('NEW CONTACT: ', newContact);
  newContact.append([
    firstNameElement,
    lastNameElement,
    emailElement,
    phoneElement
  ]);
  $('.contactList').append(newContact);
});
