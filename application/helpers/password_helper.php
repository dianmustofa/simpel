<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('hash_password')) {
    /**
     * Hashes the password using BCRYPT algorithm and default salt.
     *
     * @param string $password The password to be hashed.
     * @return string The hashed password.
     */
    function hash_password(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

if (!function_exists('verify_password')) {
    /**
     * Verifies if the given password matches the hashed password using BCRYPT algorithm and default salt.
     *
     * @param string $password The password to be verified.
     * @param string $hash The hashed password to be compared against.
     * @return bool TRUE if the password matches the hash, FALSE otherwise.
     */
    function verify_password(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
