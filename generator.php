<?php
function generateKey($length, $onlyDigits = false)
    {
        do {
            $key    = substr(bin2hex(openssl_random_pseudo_bytes(ceil($length / 2))), 0, $length);
            $result = preg_match_all('/[[:alpha:]]/', $key, $matches);
        } while (!($onlyDigits XOR $result));

        if (!$onlyDigits) {
            $chars       = array_shift($matches);
            $index       = strpos($key, $chars[array_rand($chars, 1)]);
            $key[$index] = strtoupper($key[$index]);
        }

        return $key;
    }
