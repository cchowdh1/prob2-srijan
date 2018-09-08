<?php
/**
* Business Logic for Problem 2
*/

class Prob1
{
	function checkProblem($final_data)//Business Logic.
	{
		
		$all_words = array();
		$all_query = array();
		$final_result = '';
		for ($i=1;$i <= $final_data['no_word']; $i++) {
			$all_words[] = $final_data['word'.$i];
		}
		for ($i=1;$i <= $final_data['query_count']; $i++) {
			$all_query[] = urldecode($final_data['query_word'.$i]);
		}
		foreach($all_query as $key => $value) {
			$count_occur = 0;
			$positions = array();
			for ($i = 0 ; $i < $final_data['len_word']; $i++) {
				if($value[$i] != "?") {
					$positions[] = $i;
				}
			}
			foreach($all_words as $key_word => $word_val){
				$match_count = 0;
				foreach($positions as $pos_key => $pos_val) {
					if($value[$pos_val] != $word_val[$pos_val]){
						$match_count++;
						break;
					}
				}
				if($match_count == 0) {
					$count_occur++;
				}	
				
			}
			$final_result .= '<br / >'.$count_occur;
		}
		return $final_result;
	}
}
?>
