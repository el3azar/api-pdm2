<?php
$route = file_get_contents('/proc/net/route');
echo "<pre>$route</pre>";

// Parsear gateway por defecto
foreach (explode("\n", trim($route)) as $line) {
    $parts = preg_split('/\s+/', $line);
    if (isset($parts[1]) && $parts[1] === '00000000') {
        $hex = $parts[2];
        $ip = long2ip(hexdec(implode('', array_reverse(str_split($hex, 2)))));
        echo "Gateway: $ip";
    }
}