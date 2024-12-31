<?php

class Local
{
    public string $languageCode;
    public string $countryCode{
        set(string $value) => $this->countryCode = strtoupper($value);
    }
    public string $combineCode{
        get => sprintf('%s_%s',$this->languageCode, $this->countryCode);
        set(string $value){
            [$this->languageCode, $this->combineCode] = explode('_', $value, 2);
        }
    }

    public function __construct(string $languageCode, string $countryCode)
    {
        $this->languageCode = $languageCode;
        $this->countryCode = $countryCode;
    }

}

$obj = new Local('pt', 'br');
echo $obj->combineCode;