<?php

require_once('Permutation.php');

try {
    $perm = new Permutation('12345',3);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

echo 'max permutation ' . $perm->maxPermutation() . '<br>';

$result = $perm->permutation();

echo '<pre>';
print_r($result);
echo '</pre>';

