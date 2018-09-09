<?php
/**
 * @file
 * Contains \Drupal\srijan_block\Custom\SrijanBlockPrint.
 */


namespace Drupal\srijan_block\Custom;
Class SrijanBlockPrint{

	public function blockPrint(){
		
		
		$SelectedQues = array();
		$QuestionDetail= array();
		$query = db_select('srjan_block', 'sb');
		$query->fields('sb');
		$result = $query->execute();
		$tiles = array();
		while($query_result = $result->fetchAssoc()){
			if($this->checkPage($query_result['page_url'],$query_result['display_page']) && $this->checkIp($query_result['ip_address'],$query_result['display_ip'])){
				$tiles[$query_result['id']]['title'] = $query_result['title'];
				$tiles[$query_result['id']]['image_path'] = file_url_transform_relative(file_create_url($query_result['image_path']));
				$tiles[$query_result['id']]['description'] = $query_result['description1'];
			}
			
		}
		if(count($tiles) > 0){
			return array(
				'#theme' => 'srijan',
				'#item' => $tiles,
			);
		}
		else {
			return ;
		}
	
	}
	public function checkPage($pages,$display_opt) {
		if($display_opt == 1 && empty($pages)) {
			return true;
		}
		else if ($display_opt == 0 && empty($pages)) {
			return false;
		}
		$page_arr= explode(',',$pages);
		$current_path = \Drupal::service('path.current')->getPath();
		$result = \Drupal::service('path.alias_manager')->getAliasByPath($current_path);
		if($display_opt == 1 && in_array($result,$page_arr)){
			return true;
		}
		else if ($display_opt == 0 && !in_array($result,$page_arr)) {
			return true;
		}
		else {
			return false;
		}
		
	}
	public function checkIp($ip,$display_opt) {
		if($display_opt == 1 && empty($ip)) {
			return true;
		}
		else if ($display_opt == 0 && empty($ip)) {
			return false;
		}
		$ip_arr= explode(',',$ip);
		
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
			$ip_add=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
			$ip_add=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip_add=$_SERVER['REMOTE_ADDR'];
		}
		
		
		if($display_opt == 1 && in_array($ip_add,$ip_add)){
			return true;
		}
		else if ($display_opt == 0 && !in_array($ip_add,$ip_add)) {
			return true;
		}
		else {
			return false;
		}
		
	}
	

}



?>