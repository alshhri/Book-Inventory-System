<?php

/*
Yanbu University College
Develped by Hassan Alshhri 8110210
2010
*/
//change 13/1/2010
function random_letters($requested_letters=6)
{
	$random_letters;

	$letters = "A1B2C3D4E5F6G7H8I9J0KLMNOPQRSTWXYZ";

	if($requested_letters>300)
	{
	$requested_letters = 300;
	}

	for ($l=0; $l<$requested_letters; $l++)
	{
		$letter = $letters[rand(0,33)];
		//$letter = ( rand(1,2) == 1 ? $letter : strtoupper($letter) );

		$random_letters .= $letter;
	}

	return $random_letters;
}
function random_number($requested_letters=6)
{
	$random_letters;

	$letters = "12345678901234567890";

	if($requested_letters>300)
	{
	$requested_letters = 300;
	}

	for ($l=0; $l<$requested_letters; $l++)
	{
		$letter = $letters[rand(0,19)];
		//$letter = ( rand(1,2) == 1 ? $letter : strtoupper($letter) );

		$random_letters .= $letter;
	}

	return $random_letters;
}

?>