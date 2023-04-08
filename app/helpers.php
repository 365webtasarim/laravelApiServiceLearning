<?php
// dosya: app/helpers.php
function search($array, $search)
{

    foreach ($array as $a){
        if ($a->category_id===$search){
            return true;
        }else{
            return false;
        }
    }

}
