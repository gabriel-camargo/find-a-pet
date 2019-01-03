<?php

namespace FindAPet;

class Model
{
    private $values = [];

    public function __call($name, $args)
    {
        $method = substr($name, 0, 4);
        $fieldName = substr($name, 4, strlen($name));

        switch ($method) {
            case "get_":
                return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
                break;

            case "set_":
                $this->values[$fieldName] = $args[0];
                break;
        }
    }

    public function setData($data = array())
    {
        foreach ($data as $key => $value) {
			
            $this->{"set_".$key}($value);
        }
    }

    public function getValues()
    {
        return $this->values;
    }
}