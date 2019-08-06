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

function statTest($file)
{
    uv_fs_open(uv_default_loop(),$file,UV::O_RDONLY,0,function($readStream){
        /*打开的文件接口*/

        uv_fs_fstat(uv_default_loop(), $readStream, function($readStream,$fileState){
            /*
             * $readStream  文件数据量
             * $fileState   文件状态信息
             * $fileState = [
             *      "dev" =>
             *      "ino" =>
             *      "mode" =>
             *      "nlink" =>
             *      "rdev" =>
             *      "size" =>
             *      "atime"=>
             *      "mtime"=>
             *      "ctime"=>
             * ]
             * */
            var_dump($fileState);
        });

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


/*文件watch*/
function filePollTest($file)
{
    $poll = uv_fs_poll_init(uv_default_loop());
    uv_fs_poll_start($poll,function(...$r){
        var_dump($r);
    },$file,1);
    uv_run();
}


function fileEventTest($file)
{
    $fsevent =  uv_fs_event_init(uv_default_loop(),$file,function(...$r){
        var_dump($r);
    },0);

    uv_run();
}

//$testmkDir = "mkdir";
//makeDirTest($testmkDir);
//renameTest($testmkDir,"renameDir");


//$dir = ".";
//readDirTest($dir);

//$json = "uv_0.2.4.json";
//fileReadTest($json);
//statTest($json);


//filePollTest("testRead.txt");
//fileEventTest("testRead.txt");
