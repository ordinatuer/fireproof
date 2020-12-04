<?php
namespace app\components;

trait BiKey
{
    /**
        get string values by binary key

        @return string
    */
    protected function biKeyToString(array $allValues, $biKey):string
    {
        $values = $this->biKeyToList($allValues, $biKey);
        $values = array_values($values);

        if (0 < count($values)) {
            $string = implode(', ', $values);
            $string = mb_strtolower($string);

            return $string;
        }

        return '';
    }

    /**
        get list key=>values by binary key
    */
    protected function biKeyToKeys(array $allValues, $biKey):array
    {
        $values = $this->biKeyToList($allValues, $biKey);

        return array_keys($values);
    }

    protected function biKeyToList(array $allValues, $biKey):array
    {
        $values = [];

        foreach($allValues as $key => $value) {
            if ($biKey & $key) {
                $values[$key] = $value;
            }
        }

        return $values;
    }

    /**
        save array as binary key
    */
    protected function biKeySave(string $attr)
    {
        $biKey = 0;
        $values = $this->$attr;

        foreach($values as $value) {
            $biKey += $value;
        }

        $this->$attr = $biKey;
    }
}