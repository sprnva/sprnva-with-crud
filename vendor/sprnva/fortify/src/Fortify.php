<?php

namespace App\Core\Install;

use App\Core\Filesystem\Filesystem;

class Fortify
{
	public function handle_install()
	{
		if(!file_exists('app/controllers/Auth')){
			// Controllers...
			(new Filesystem)->ensureDirectoryExists('app/controllers/Auth');
			(new Filesystem)->copyDirectory(__DIR__.'/../stubs/default/app/controllers/Auth', 'app/controllers/Auth', '.php');
		}

		if(!file_exists('app/views/auth')){
			// Views...
	        (new Filesystem)->ensureDirectoryExists('app/views/auth');
	        (new Filesystem)->copyDirectory(__DIR__.'/../stubs/default/app/views/auth', 'app/views/auth');
	    }

	    if(!file_exists('config/routes/auth.php')){
	        // Routes...
	        copy(__DIR__.'/../stubs/default/config/routes/auth.php', 'config/routes/auth.php');
	    }

	    echo "Fortified.\n";
	}
}
