<?php
interface iReviewTable {
	public function getReviewsByLetter($letter,$options=array());
	public function getReviewsByKeyword($key,$options=array());
}