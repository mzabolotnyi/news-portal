<?php


class View
{
    protected $data = [];

    public function __set($key, $value){
        $this->data[$key] = $value;
    }

    public function __get($key){
        if (isset($this->data[$key])){
            return $this->data[$key];
        }

        return false;
    }

    public function render($template){
        foreach ($this->data as $key=>$val){
            $$key = $val;
        }

        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_clean();

        return $content;
    }

    public function display($template){
        echo $this->render($template);
    }
}