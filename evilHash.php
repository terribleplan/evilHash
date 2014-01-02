<?php
/**
 * Name: evilHash.php
 * Author: terriblepln
 * License: WTFPL
 */
Class EvilHash {
	public static function hash($input, $key=false, $iterations=1) {
		//Figure out what we will use for our HMAC key
		if ($key === false) {
			$keyConstant = "EVILHASH_KEY";
			if (defined($keyConstant)) {
				$key = constant($keyConstant);
			} else {
				$key = "ThisShouldBeAR4n|)0mzSTRNG";
			}
		}
		
		//Determine the number of times each hash will be run
		if ($iterations < 1) {
			$iterations = 1;
		}
		
		//These are the hashes that will be run, see hash_algos() for what your PHP installation supports
		$algo = array('whirlpool', 'sha512', 'ripemd320', 'haval256,5', 'tiger192,4', 'sha1', 'md5');
		
		//Calculate the hash value, note that we do add information to both the key and the input data
		$increment = 0;
		foreach ($algo as $hashType) {
			$hashRuns = 0;
			while ($hashRuns < $iterations) {
				$input = hash_hmac($hashType, $increment++ . $hashRuns++ . $input, $key . $hashType);
			}
		}
		
		return $input;
	}
}
