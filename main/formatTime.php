<?php
function formatTime($seconds) {
    $days = floor($seconds / (24 * 60 * 60));
    $hours = floor(($seconds % (24 * 60 * 60)) / (60 * 60));
    $minutes = floor(($seconds % (60 * 60)) / 60);
    $secs = $seconds % 60;

    return "{$days}d {$hours}h {$minutes}m {$secs}s";
}
?>
