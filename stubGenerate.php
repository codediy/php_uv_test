<?php

/*
    phpstorm-stubs生成器

    - Extension       扩展生成器 Reflection
        - INIEntries  ini配置信息
        - Constants   常量
        - Classes     类
        - Functions   函数

    - FrameWork       框架生成器 PHPParser
        - Constants   框架常量
        - Classes     框架类
        - Functions   框架函数
*/

/**
 * @param string $ext 扩展名称
 */
function extensionStubs($ext)
{

}


/**
 * @param string $src 框架根目录
 */
function frameWorkStubs($src)
{

}


class StubExtension extends ReflectionExtension
{
    private $outDir = "";
    private $outFile = "";

    private $INI = [];
    private $Constants = [];
    private $Functions = [];
    private $Classes = [];

    public function __construct($name)
    {
        parent::__construct($name);
    }

    /*获取扩展信息*/
    public function parser()
    {
        $this->INI       = $this->getINIEntries();
        $this->Constants = $this->getConstants();
        $this->Functions = $this->getFunctions();
        $this->Classes   = $this->getClasses();
    }

    /*扩展生成器*/
    public function render()
    {
        /*创建文件*/
        $this->createStubFile();
        $this->renderINI();
        $this->renderConstants();
        $this->renderFunctions();
        $this->renderClasses();
    }

    public function renderINI()
    {
        if(is_array($this->INI) && count($this->INI) > 0){
            foreach ($this->INI as $k => $v) {
                $tempClass = new StubINI($k,$v);
                file_put_contents($this->outFile,$tempClass->render());
            }
        }
    }

    public function renderConstants()
    {
        if(is_array($this->Constants) && count($this->Constants) > 0){
            foreach ($this->Constants as $k => $v) {
                $tempConstant = new StubConstant($k,$v);
                file_put_contents($this->outFile,$tempConstant->render());
            }
        }
    }

    public function renderFunctions()
    {
        if(is_array($this->Functions) && count($this->Functions) > 0){
            foreach ($this->Functions as $k => $v) {
                try {
                    $tempFunction = new StubFunction($v->getName());
                    file_put_contents($this->outFile,$tempFunction->render());
                } catch (ReflectionException $e) {

                }

            }
        }
    }

    public function renderClasses()
    {
        if(is_array($this->Classes) && count($this->Classes) > 0){
            foreach ($this->Classes as $k => $v) {
                try {
                    $tempClass = new StubClass($v->getName());
                    file_put_contents($this->outFile,$tempClass->render());
                } catch (ReflectionException $e) {
                }
            }
        }
    }

    private function createStubFile()
    {
        $this->outFile = $this->outDir.$this->getName().".php";
        if(!is_dir($this->outDir)){
            mkdir($this->outDir);
        }
        if(!is_file($this->outFile)){
            touch($this->outFile);
        }
    }

}


class StubFrameWork
{
    private $src = "";
    private $Constants = [];
    private $Classes = [];
    private $Functions = [];

    public function __construct($src)
    {
        if (is_file($src)) {
            $this->src = $src;
        }
    }

    /*获取扩展信息*/
    public function parser()
    {

    }

    /*扩展生成器*/
    public function render()
    {

    }
}


class StubClass extends ReflectionClass
{
    public function __construct($className)
    {
        parent::__construct($className);
    }

    /*生成Class stub*/
    public function render()
    {
        /*签名*/
        $this->initClass();
        /*常量*/
        $this->renderConstants();
        /*属性*/
        $this->renderProperty();
        /*Traits*/
        $this->renderTrait();
        /*方法*/
        $this->renderMethod();
    }

    public function initClass()
    {
        /*修饰符*/
        /*类名*/
        /*父类*/
        /*接口*/
    }

    public function renderConstants()
    {

    }

    public function renderProperty()
    {

    }

    public function renderTrait()
    {

    }

    public function renderMethod()
    {

    }
}
class StubClassConstant extends ReflectionClassConstant
{

}
class StubProperty extends  ReflectionProperty
{

}
class StubParameter extends ReflectionParameter
{

}
class StubMethod extends ReflectionMethod
{

}
class StubFunction extends ReflectionFunction
{
    public function __construct($funcName)
    {
        parent::__construct($funcName);
    }

    /*生成Function Stub*/
    public function render()
    {
        return "";
    }
}


class StubConstant
{
    private $name;
    private $value;
    private $doc;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * @param mixed $doc
     */
    public function setDoc($doc): void
    {
        $this->doc = $doc;
    }

    public function __construct($name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /*生成Constant Stub*/
    public function render()
    {
        return "";
    }
}

class StubINI
{
    private $name;
    private $value;
    private $doc;

    public function __construct($name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * @param mixed $doc
     */
    public function setDoc($doc): void
    {
        $this->doc = $doc;
    }

    /*生成INI Stub*/
    public function render()
    {
        return "";
    }
}
