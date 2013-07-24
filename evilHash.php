<?php
/**
 * Name: evilHash.php
 * Author: terriblepln
 * License: WTFPL
 */
Class EvilHash {
	public static function hash($input, $key=false) {
		$c = "EVILHASH_KEY";
		if ($key === false) {
			if (defined($c)) {
				$key = constant($c);
			} else {
				$key = "ThisShouldBeAR4n|)0mzSTRNG";
			}
		}
		$algo = array('whirlpool', 'sha512', 'ripemd320', 'haval256,5', 'tiger192,4', 'sha1', 'md5');
		$i = 0;
		foreach ($algo as $h) {
			$input = hash_hmac($h, $i . $input, $key . $h);
			$i++;
		}
		return $input;
	}
}
?>