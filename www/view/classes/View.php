<?php


class View
{
    protected $data = [];

    public function setData($key, $value){
        $this->data[$key] = $value;
    }

    public function getData($key){
        if (isset($this->data[$key])){
            return $this->data[$key];
        }

        return false;
    }

    public function display($template){
        include $template;
    }
}