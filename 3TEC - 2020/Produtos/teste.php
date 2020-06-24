<script>
    $(document).ready(function() {
  var max_fields = 10; //maximum input boxes allowed
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  var add_button = $(".add_field_button"); //Add button ID

  var x = 1; //initlal text box count
  $(add_button).click(function(e) { //on add input button click
    e.preventDefault();
    var length = wrapper.find("input:text").length;

    if (x < max_fields) { //max input box allowed
      x++; //text box increment
      $(wrapper).append('<div><input type="text" name="Texto' + (length+1) + '" /><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
    //Fazendo com que cada uma escreva seu name
    wrapper.find("input:text").each(function() {
      $(this).val($(this).attr('name'))
    });
  });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })

});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="input_fields_wrap">
  <button class="add_field_button">Add More Fields</button>
  <div>
    <input type="text" name="mytext[]">
  </div>
</div>