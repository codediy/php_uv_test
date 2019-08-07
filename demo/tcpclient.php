<?php 

function tcpClientTest()
{   
    /* ======Client==== */
    $ip = "127.0.0.1";
    $port = 9999;
    
    /* 初始化客户端Socket */
    $client = uv_tcp_init();

    uv_tcp_connect($client,uv_ip4_addr($ip,$port),function($client,$state){

       
       var_dump($state);

       if ($state == 0) {

            uv_write($client,"Hello",function($socket, $state){
                uv_close($socket);
            });
        }

    });

     uv_run();
}

tcpClientTest();