<?php
if (is_numeric($_POST['num'])) {
    //zero is returned if the variable is numeric
    echo 0;
}
else {
    //1 is returned if the variable is not numeric
    echo 1;
}
?>
