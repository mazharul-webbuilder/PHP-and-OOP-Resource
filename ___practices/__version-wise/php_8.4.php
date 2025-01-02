<?php

// Property Hooks
class Local
{
    public string $languageCode;
    public string $countryCode{
        set(string $value) {
            $this->countryCode = strtoupper($value);
        }
    }

    public string $combineCode{
        get => sprintf("%s_%s",$this->languageCode,$this->countryCode);

        set(string $value) {
            [$this->languageCode, $this->countryCode] = explode("_",$value, 2);
        }
    }

    public function __construct($languageCode, $countryCode)
    {
        $this->languageCode = $languageCode;
        $this->countryCode = $countryCode;
    }
}

$brazilianPortuguese = new Local('pt', 'br');
echo $brazilianPortuguese->combineCode . PHP_EOL;

// Asymmetric Visibility
class PhpVersion_N1
{
    public private(set) string $version;

    public function __construct($version)
    {
        $this->version = $version;
    }

    public function increment(): void
    {
        [$major, $minor] = explode('.', PHP_VERSION);
        $minor++;
        $this->version = $major . '.' . $minor;
    }
}
$asymmetric = new PhpVersion_N1(8.4);
$asymmetric->increment();
echo $asymmetric->version . PHP_EOL;

// Deprecated Attribute
class PhpVersion_N2
{
    #[Deprecated(
        message: 'use PhpVersion::getVersion() instead',
        since: "8.4"
    )]
    public function getPhpVersion(): string
    {
        return $this->getVersion();
    }
    public function getVersion(): string
    {
        return '8.4';
    }
}
$depAttribute = new PhpVersion_N2();
echo $depAttribute->getVersion() . PHP_EOL;

// New Class Object without parenthesis
class PhpVersion_N3 extends PhpVersion_N2
{

}
echo new PhpVersion_N2()->getVersion();