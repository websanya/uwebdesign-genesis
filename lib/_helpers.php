<?php

//* Russian comments.
function russian_comments($number, $after) {
	$cases = array (2, 0, 1, 1, 1, 2);
	if ( $number == 0 ) {
		return 'нет комментариев';
	}
	return $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}