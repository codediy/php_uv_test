<?php

$fsevent = uv_fs_event_init(uv_default_loop(),"/tmp/",function(...$r){
	var_dump($r);
	print PHP_EOL;
},0);

uv_run();
