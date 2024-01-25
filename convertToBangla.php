<?php

		function e2b($englishNumber)
		{


		$bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
		$banglaNumber = str_replace(range(0, 9),$bn_digits, $englishNumber);
		return $banglaNumber;
		}
		
		function b2e($bnNo)
		{
		//$bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
		//$bn_digits=array('0','1','2','3','4','5','6','7','8','9');
		//$enNumber = str_replace($bn_digits,range(0, 9),$bnNo);
		$search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
		$replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
		$en_number = str_replace($search_array, $replace_array, $bnNo);
			
		return $en_number;
		}
		
		function BloodGroup($grp)
		{
		$search_array= array("বি পজিটিভ", "ও পজিটিভ", "এ পজিটিভ", "এবি পজিটিভ", "বি নেগেটিভ", "এ নেগেটিভ", "বি মাইনাস", "ও নেগেটিভ", "এবি নেগেটিভ");
		$replace_array= array("B+", "O+", "A+","AB+", "B-", "A-", "B-", "O-", "AB-");
		$optGrp = str_replace($search_array, $replace_array, $grp);
	
		return $optGrp;
		}

?>

