<?php
namespace App\Helpers;
use Illuminate\Support\Str;
 
class Minikal {

    public static function convert_to_rupiah($angka)
	{
		return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
	}
    
    public static function convert_to_angka($rupiah)
	{
        $harga = Str::after($rupiah , 'Rp ');
        $total = Str::remove('.', $harga);
		return $total;
	}

}