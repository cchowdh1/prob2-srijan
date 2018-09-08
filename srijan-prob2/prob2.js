$(document).ready(function(){

  $( ".add-case" ).click(function() {
	var test_case_count = $('#test_case').val();
	if (test_case_count == '' || test_case_count == 0) {
		alert("No of Testcase should be more than zero");
		return false;
	}
   $.ajax({
      type: "POST",
      dataType: "json",
      url: "form_fields.php?time=123234", 
      data: {
              test_case_count: test_case_count,
            },
      success: function(data) {
		
        $(".test-case").html(data);
        
      },
	  error: function(data) {
        alert("Something went wrong");
      }
    });
  });
  $(document).on("submit", "#form-test-case", function(e) {
      e.preventDefault();
	  datastring = $("#form-test-case").serialize();
	   $.ajax({
      type: "POST",
      dataType: "json",
      url: "form_fields.php?time=7", 
      data: {
              form_data: datastring,
            },
      success: function(data) {
        $(".test-case .result_output").remove();
        $(".test-case").append(data);
        
      },
	  error: function(data) {
        alert("Something went wrong");
      }
    });
  });
});