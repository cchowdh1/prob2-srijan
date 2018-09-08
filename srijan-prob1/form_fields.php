<?php
/**
 * Creation of Form fields
 */
require 'Prob1.php';

if (isset($_POST['no_word']) && $_POST['no_word'] > 0 && isset($_POST['len_word']) && $_POST['len_word'] > 0) {
	$html = '<form action="#" method="post" id="form-test-case"><div><p>ENTER WORDS</p>';
	for ($i=1;$i<= $_POST['no_word'];$i++) {
		$html .= '<p><input id="word'.$i.'" type="text" name="word'.$i.'" required maxlength="'.$_POST['len_word'].'"></p>';
	}
	$html .= '<p>Query Count</p><input id="query_count" type="text" name="query_count" required"><button class="add-query">Add Query</button><input type="hidden" id="len_word" name="len_word" value="'.$_POST['len_word'].'"><input type="hidden" id="len_word" name="no_word" value="'.$_POST['no_word'].'"></form>';
	echo json_encode($html);exit;
}
else if (isset($_POST['query_count']) && !empty($_POST['query_count'])){
	$html = '<div class="query_data"><p>ENTER QUERY WORDS</p>';
	for ($i=1;$i<= $_POST['query_count'];$i++) {
		$html .= '<p><input id="query_word'.$i.'" type="text" name="query_word'.$i.'" required maxlength="'.$_POST['len_word'].'"></p>';
	}
	echo json_encode($html.'<input type="submit" value="FINAL SUBMIT"></div>');exit;
}	
else if (isset($_POST['form_data']) && !empty($_POST['form_data'])){
	$all_data = explode("&", $_POST['form_data']);
	$final_data = array();
	$final_result = '<div class="result_output">';
	foreach($all_data as $key => $value) {
		$temp_arr = explode("=",$value);
		$final_data[$temp_arr[0]] = $temp_arr[1];
	}
	$newObj = new Prob1();
	
		$final_result .= $newObj->checkProblem($final_data);
	echo json_encode($final_result."</div>");exit;
}
else {
	
}
 
?>