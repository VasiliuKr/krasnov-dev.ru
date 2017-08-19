<?
	// вывод массива
	function printr($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

// получение массива из JSON с внешнего сайта
	function getJson($url) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_URL, $url);
	$response = curl_exec($curl);
	curl_close($curl);
	$content = json_decode($response,true);
	return $content;
}