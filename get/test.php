<?php
			$uri = 'http://www.ci.pro/api/post/books.php';
			$reqPrefs['http']['method'] = 'GET';
			//$reqPrefs['http']['header'] = 'X-Auth-Token: 9cbd013965a74aef92e31036f373b979';
			$stream_context = stream_context_create($reqPrefs);
			$data = file_get_contents($uri, false, $stream_context);
			$json_arr = json_decode($data,true);
			$x = 0; 
			while($x < sizeof($json_arr)) {
				$name = $json_arr[$x];
				print_r($name["book_name"]);
				$x++;
			} 
			
			
				
?>