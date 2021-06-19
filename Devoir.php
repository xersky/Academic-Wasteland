<?php 
function survive($n,$s,$k){
    if($n==0) return 0;
    return (survive($n-1,$s,$k)+$s+$k-1)%($n+1);
}
$n = readline("entrer le nombres des soldats : ");
$s = readline("entrer le nombres des premier soldat : ");
$k = readline("entrer le pas : ");
$r = survive($n,$s,$k);
echo "la place securisée est : $r"
?>