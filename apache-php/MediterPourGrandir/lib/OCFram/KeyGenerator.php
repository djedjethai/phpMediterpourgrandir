<?php
namespace OCFram;

class KeyGenerator 
{

	public function generateKey($nbr)
	{
		$longueurKey = $nbr;
        $key = "";
        for($i=1;$i<$longueurKey;$i++) 
        {
            $key .= mt_rand(0,9);
        }

        return $key;

        //var_dump($key).'<br />';
	}

}