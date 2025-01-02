<?php

//🚀 PHP 8.4 (Released: November 2024)

//Key Features:

//1)  Property Hooks
//* Property hooks allow developers to define custom behavior when accessing or
// modifying class properties. This feature provides greater control over property interactions, enabling more robust and encapsulated designs.
class Locale
{
    public string $languageCode;

    public string $countryCode
        {
            set (string $countryCode) {
                $this->countryCode = strtoupper($countryCode);
            }
        }

    public string $combinedCode {
        get => \sprintf("%s_%s", $this->languageCode, $this->countryCode);

        set(string $value) {
            [$this->languageCode, $this->countryCode] = explode('_', $value, 2);
        }
    }

    public function __construct(string $languageCode, string $countryCode)
    {
        $this->languageCode = $languageCode;
        $this->countryCode = $countryCode;
    }
}

$brazilianPortuguese = new Locale('pt', 'br');
var_dump($brazilianPortuguese->countryCode); // BR
var_dump($brazilianPortuguese->combinedCode); // pt_BR


//2)  Asymmetric Visibility
//* Property hooks allow developers to define custom behavior when accessing or
// Asymmetric visibility allows different access levels for property getters and setters, providing more granular control over property accessibility.
class PhpVersion
{
    public private(set) string $version = '8.4';

    public function increment(): void
    {
        [$major, $minor] = explode('.', $this->version);
        $minor++;
        $this->version = "{$major}.{$minor}";
    }
}


//3)  #[\Deprecated] Attribute
//* The new #[\Deprecated] attribute makes PHP’s existing deprecation mechanism available to user-defined functions, methods, and class constants.
class PhpVersion
{
    #[\Deprecated(
        message: "use PhpVersion::getVersion() instead",
        since: "8.4",
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

$phpVersion = new PhpVersion();
// Deprecated: Method PhpVersion::getPhpVersion() is deprecated since 8.4, use PhpVersion::getVersion() instead
echo $phpVersion


//4) new MyClass()->method() without parentheses
    //* Properties and methods of a newly instantiated object can now be accessed without wrapping the new expression in parentheses.
class PhpVersion
{
    public function getVersion(): string
    {
        return 'PHP 8.4';
    }
}

var_dump(new PhpVersion()->getVersion());
