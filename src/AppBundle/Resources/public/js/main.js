$(document).ready(function(){
  $('.doctor').on('change', function() {
    if ($(this).val() != 0) {
      $('.datepicker').removeClass('display-none')
    }
  });


  // $('.datepicker').datepicker({
  // onSelect: function(dateText, inst) {
  //   console.log(dateText);
  //   $('.table').removeClass('display-none')
  // }
  // });
});
$( function() {
  $( ".datepicker" ).datepicker();
} );
