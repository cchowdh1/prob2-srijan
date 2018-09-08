<?php
/**
* Business Logic for Problem 2
*/

class Prob2
{
	function checkProblem($first_line,$second_line,$third_line,$fourth_line)//Business Logic.
	{
		//echo $first_line.$second_line.$third_line.$fourth_line;exit;
		$positions = array();
		$lastPos = $fourth_line;
		$first_line = urldecode($first_line);
		if ($third_line == 'Y') {
			
			while (($lastPos = strpos($first_line, $second_line, $lastPos))!== false) {
					$positions[] = $lastPos;
					
					
					//var_dump($first_line);
					//echo $lastPos."aaa".($lastPos+strlen($second_line))."aaa".$first_line[2];
					//echo "test2".$first_line[($lastPos-1)].$first_line[($lastPos+strlen($second_line))]."test";
					if($lastPos == 0 && $first_line[$lastPos+strlen($second_line)] == ' ') {
						return $lastPos;
						
					}
					else if ($first_line[$lastPos-1] == ' ' && isset($first_line[$lastPos+strlen($second_line)]) &&  $first_line[$lastPos+strlen($second_line)] == ' ') {
						
						return $lastPos;
					}
					else if ($first_line[$lastPos-1] == ' ' && (($lastPos+strlen($second_line)) == strlen($first_line))) {
						
						return $lastPos;
					}
					else  if ($first_line == $second_line) {
						
						return $lastPos;
					}
				//}
				echo $lastPos = $lastPos + strlen($second_line);exit;
			}
		}
		else if ($third_line == 'N') {
			while (($lastPos = strpos($first_line, $second_line, $lastPos))!== false) {
				$positions[] = $lastPos;
				if($lastPos >= $fourth_line) {
					return $lastPos;
				}
				$lastPos = $lastPos + strlen($needle);
			}
		}
		
		if (count($positions) == 0) {
			return "No worries";
		}
	}
}
?>
