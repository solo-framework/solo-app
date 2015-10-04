<?php

use Meme\Output;
use Meme\Project;
use Meme\Task\Chmod;
use Meme\Task\Command;
use Meme\Task\CopyFile;
use Meme\Task\Mkdir;
use Meme\Types;
use Meme\Target;

/**
 * @var $project Project
 */

$project->setStartTarget("start");

//
// Write your targets and task below
//

// for example
$startTarget = new Target("start", function(){

	Output::comment("Updating composer");
//	(new Command("composer update"))->setTimeout(600)->run();

	Output::comment("Changing permissions for folders");
	$dirs = array(
		"./var",
		"./var/cache",
		"./var/compile",
		"./var/logs",
		"./var/tmp",
		"./public/assets"
	);

	(new Mkdir("./public/assets", 0777))->run();

	// for development we may use full permisssions
	(new Chmod($dirs, 0777))->run();

	if (!is_file("./config/local.php"))
	{
		Output::comment("Generating local.php");
		(new CopyFile("./config/local.php.distrib.php", "./config/local.php"))->run();
	}

}/*, add dependencies here*/);


// don't forget to add your targets to the project
$project->addTarget($startTarget);

