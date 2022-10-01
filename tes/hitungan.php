<?php
$value = 0;
$cars = array("1", "0.5", null);
for ($i = 0; $i < 3; $i++) {
    if ($cars[$i] !== null) {
        $value = $value + 1;
    }
}
echo $value;
