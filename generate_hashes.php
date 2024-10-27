<?php
// This is for hashing the passwords initially (run this separately and store the result in your code)
$admin_password = password_hash('Adm1n123*', PASSWORD_BCRYPT);
$staff_password = password_hash('St@ff123*', PASSWORD_BCRYPT);

echo "Admin Password Hash: " . $admin_password . "<br>";
echo "Staff Password Hash: " . $staff_password . "<br>";
?>
