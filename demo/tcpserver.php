<?php 

function tcpTest()
{   
    $ip = "127.0.0.1";
    $port = 9999;
    /* =====Server===== */
    /* 初始化服务器socket */
    $tcp = uv_tcp_init();   

    /* 绑定服务器socket端口 */
    uv_tcp_bind($tcp,uv_ip4_addr($ip,$port));

    /* 监听服务器socket */
    uv_listen($tcp,1000,function($server){
        var_dump("Client 请求信息");
        /* 初始化客户端socket */
        $client = uv_tcp_init();

        /* 绑定请求到 */
        uv_accept($server,$client);

        /* 打印客户端信息 */
        var_dump(uv_tcp_getsockname($server));

        /* 注册读取数据回调 */
        uv_read_start($client,function($socket, $nread, $buffer) use ($server){
            var_dump("Client 发送内容");
            var_dump($buffer);
            uv_close($socket);
            uv_close($server);
        });
    });
    
    uv_run();
}

tcpTest();