<?php

if (!function_exists('getContrastColor')) {
    function getContrastColor($hexColor)
    {
        // Remove the '#' if it's present
        $hexColor = ltrim($hexColor, '#');

        // Convert the hex to RGB
        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));

        // Calculate luminance
        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

        // Return black for light colors, white for dark colors
        return $luminance > 0.5 ? '#000000' : '#FFFFFF';
    }
}
