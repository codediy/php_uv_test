<?php


function makeDirTest($file)
{
    uv_fs_mkdir(uv_default_loop(),$file,0777,function(...$status){
        var_dump($status);
    });

    uv_run();
}
function renameTest($file,$to)
{
    uv_fs_rename(uv_default_loop(),$file,$to,function(...$status){
        var_dump($status);
    });
    uv_run();
}

function statTest($file)
{

}

function readDirTest($file)
{
    uv_fs_readdir(uv_default_loop(),$file,0,function($status,$file){
        /*
         * $status 状态信息
         * $file 文件信息
         */
    });

    uv_run();
}

function fileOpenTest($file)
{
    uv_fs_open(uv_default_loop(),$file,UV::O_RDONLY,0,function($readStream){
        /*打开的文件接口*/
        var_dump($readStream);
    });

    uv_run();
}

function fileReadTest($file)
{
    uv_fs_open(uv_default_loop(),$file,UV::O_RDONLY,0,function($readStream){
        uv_fs_read(uv_default_loop(),$readStream,0,1024,function($readStream,$length,$content){
          /*
           *$readStream 文件
           *$length   读取的内容长度
           *$content 读取的内容
           *  */
          var_dump($content);
        });
    });

    uv_run();
}

$testmkDir = "mkdir";
//makeDirTest($testmkDir);

renameTest($testmkDir,"renameDir");


//$dir = ".";
//readDirTest($dir);

//$json = "uv_0.2.4.json";
//fileReadTest($json);


