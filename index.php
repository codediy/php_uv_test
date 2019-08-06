<?php

function exInfo($ex)
{
    $ext = new ReflectionExtension($ex);

    $name = $ext->getName();
    $version = $ext->getVersion();

    $extName = $name."_".$version.".json";

    $extInfo = [];
    /* iniConfig */
    $extInfo['ini'] = extIniConfig($ext);
    /* constants */
    $extInfo["constants"] = extConstants($ext);
    /* functions */
    $extInfo['functions'] = extFunctions($ext);
    /* classes */
    //$extInfo['classes'] = extClasses($ext);

    return ["ext"=>$extName,"info"=>$extInfo];
}


function extIniConfig($ext)
{
    $Ini = $ext->getINIEntries();
    ksort($Ini);
    return $Ini;
}
function extConstants($ext)
{
    $Constants = $ext->getConstants();
    ksort($Constants);
    return $Constants;
}

function extFunctions($ext)
{
    $Functions = $ext->getFunctions();
    /*生成函数方法信息*/
    $FunInfo = [];
    foreach ($Functions as $k => $v) {
        $tempInfo = funInfo($v);
        $FunInfo[$tempInfo["fun"]] = $tempInfo;
    }

    ksort($FunInfo);
    return array_values($FunInfo);
}
function extClasses($ext)
{
    $Classes = $ext->getClasses();
    line("Class");
    var_dump($Classes);
    line("Class");
}



/*生成函数信息*/
function funInfo($func)
{
    $name = $func->getName();
    $args =  [];

    if($func->getNumberOfParameters() > 0){
        foreach ($func->getParameters() as $k => $v) {
            $args[] = $v->getName();
        }
    }

    $sign = "function {$name}(";
    $sign .= implode(", ",array_map(function($arg){
        return "$".$arg;
    },$args));
    $sign .= ")";
    $temp = [
        "fun" => $sign,
        "name" => $name,
        "args" => $args,
        "return"=>"",
    ];

    return $temp;
}

function line($info)
{
    echo "==========={$info}==========\n";
}

$extInfo = exInfo("uv");

file_put_contents($extInfo["ext"],json_encode($extInfo["info"]));
