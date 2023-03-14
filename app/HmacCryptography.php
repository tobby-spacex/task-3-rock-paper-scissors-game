<?php

namespace App;

class HmacCryptography
{
    private $secureKey;

    public function __construct()
    {
        $this->secureKey = random_bytes(32);
    }

    public function hmacGenerating($computerMove)
    {
        $hmac = hash_hmac('sha256', $computerMove, $this->secureKey);
        
        return print "HMAC: " . strtoupper($hmac) . "\n";
    }

    public function hmacKey()
    {
        return print "HMAC key: " . strtoupper(bin2hex($this->secureKey)) . "\n";
    }
}
