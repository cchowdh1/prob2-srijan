$(document).ready(function(){

  $( ".add-case" ).click(function() {
	var no_word_len = $('#no_word_len').val();
	
	if (no_word_len == '' || no_word_len == " ") {
		alert("Cannot be empty");
		return false;
	}
	no_word_len = no_word_len.split(' ');
	console.log(no_word_len);
	var no_word = no_word_len[0];
	var len_word = no_word_len[1];
   $.ajax({
      type: "POST",
      dataType: "json",
      url: "form_fields.php?time=34", 
      data: {
              no_word: no_word,
              len_word:  len_word
            },
      success: function(data) {
		
        $(".test-case").html(data);
        
      },
	  error: function(data) {
        alert("Something went wrong");
      }
    });
  });
  $(document).on("click", ".add-query", function(e) {
   //$( ".add-query" ).click(function() {
	var query_count = $('#query_count').val();
	var len_word = $('#len_word').val();
	
	if (query_count == '' || query_count == " ") {
		alert("Cannot be empty");
		return false;
	}
   $.ajax({
      type: "POST",
      dataType: "json",
      url: "form_fields.php?time=34", 
      data: {
              query_count: query_count,
              len_word: len_word,
            },
      success: function(data) {
		$("#form-test-case .query_data").remove();
        $("#form-test-case").append(data);
        
      },
	  error: function(data) {
        alert("Something went wrong");
      }
    });
	return false;
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