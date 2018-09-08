<?php
/**
 * Creation of Form fields
 */
require 'Prob2.php';

if (isset($_POST['test_case_count']) && $_POST['test_case_count'] > 0) {
	$html = '';
	for ($i=1;$i<= $_POST['test_case_count'];$i++) {
		$html .= '<form action="#" method="post" id="form-test-case"><div><p>Testcase No. '.$i.'</p><p><label>First line</label><input id="first_line'.$i.'" type="text" name="first_line'.$i.'" required></p>';
		$html .= '<p><label>Second line</label><input id="second_line'.$i.'" type="text" name="second_line'.$i.'" required></p>';
		$html .= '<p><label>Third line</label><input id="third_line'.$i.'" type="text" name="third_line'.$i.'" required></p>';
		$html .= '<p><label>Fourth line</label><input id="fourth_line'.$i.'" type="text" name="fourth_line'.$i.'" required></p>';
	}
	$html .= '<input type="submit" vlaue="submit"><input type="hidden" name="case_no" value="'.$_POST['test_case_count'].'"></form>';
	echo json_encode($html);exit;
}
else if (isset($_POST['form_data']) && !empty($_POST['form_data'])){
	//echo "<pre>chiranjit";print_r(json_decode($_POST['form_data']));
	$all_data = explode("&", $_POST['form_data']);
	$final_data = array();
	$final_result = '<div class="result_output">';
	foreach($all_data as $key => $value) {
		$temp_arr = explode("=",$value);
		$final_data[$temp_arr[0]] = $temp_arr[1];
	}
	$newObj = new Prob2();
	for ($i=1;$i <= $final_data['case_no'];$i++) {
		$final_result .= "<br />".$newObj->checkProblem($final_data['first_line'.$i],$final_data['second_line'.$i],$final_data['third_line'.$i],$final_data['fourth_line'.$i]);
	}
	echo json_encode($final_result."</div>");exit;
}
else {
	
}
 
?>