<?php

namespace Ace\ExperimentalUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AceExperimentalUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}

}
