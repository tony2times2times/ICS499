
$(function() {
  if ($('#goal').val() === 'Maintain') {
    $('#weight').val('').hide();
  } else  {
    $('#weight').show();
  }
});
