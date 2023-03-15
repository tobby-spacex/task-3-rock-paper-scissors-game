<?php

namespace App;

class HmacCryptography
{
    private $secureKey;

    /**
     * HmacCryptography constructor.
     */
    public function __construct()
    {
        $this->secureKey = random_bytes(32);
    }

    /**
     * Generate the HMAC.
     * 
     * @param string $computerMove The input string.
     * 
     * @return string The generated HMAC.
     */
    public function hmacGenerating($computerMove): string
    {
        return hash_hmac('sha256', $computerMove, $this->secureKey);
    }

    /**
     * Get the HMAC key.
     * 
     * @return string The HMAC key.
     */
    public function hmacKey(): string
    {
        return strtoupper(bin2hex($this->secureKey));
    }
}
