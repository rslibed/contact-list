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
$('.edit').click(function() {
  var row = $(this).parent().parent().children();
  if (!$(this).parent().parent().children().attr('contenteditable')) {
    for (let i = 0; i <= 3; i++) {
      row[i].setAttribute('contenteditable', 'true');
    }
    $('.edit')
      .text('Stop Edit')
      .removeClass('btn-info')
      .addClass('btn-warning');
  } else {
    for (let i = 0; i <= 3; i++) {
      row[i].setAttribute('contenteditable', 'false');
    }
    $('.edit').text('Edit').addClass('btn-info').removeClass('btn-warning');
  }
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
