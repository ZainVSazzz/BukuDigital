<?php

if (!function_exists('rupiah')) {
    function rupiah(int $number): string
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}
