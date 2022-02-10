<?php

/**
 * Always remember:
 * "up" is for run migration
 * "down" is for the rollback, reverse the migration
 * 
 */
$test_table = [
	"mode" => "NEW",
	"table"	=> "test",
	"primary_key" => "id",
	"up" => [
		"id" => "INT(11) unsigned NOT NULL AUTO_INCREMENT",
		"title" => "varchar(200) DEFAULT NULL",
		"description" => "varchar(200) DEFAULT NULL",
	],
	"down" => [
		"" => ""
	]
];
