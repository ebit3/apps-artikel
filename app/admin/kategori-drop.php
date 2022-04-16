<?php

require_once 'function/fungsi.php';

$id = $_GET['id'];

if (drob_kategori($id) > 0) {

    return true;
} else {

    return false;
}
