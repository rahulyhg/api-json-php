<?php
			$uri = 'http://api.football-data.org/v2/competitions/2021/standings';
			$reqPrefs['http']['method'] = 'GET';
			$reqPrefs['http']['header'] = 'X-Auth-Token: 9cbd013965a74aef92e31036f373b979';
			$stream_context = stream_context_create($reqPrefs);
			$data = file_get_contents($uri, false, $stream_context);
			$json_arr = json_decode($data,true);
			
			foreach($json_arr['standings'][0]['table'] as $standings)
			{
				echo '<pre>';
				$team=$standings['position'];
				print ($team);
				echo '</pre>';	
			}
				
?>