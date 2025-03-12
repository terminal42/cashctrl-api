<?php

use ShipMonk\ComposerDependencyAnalyser\Config\Configuration;
use ShipMonk\ComposerDependencyAnalyser\Config\ErrorType;

return (new Configuration())
    ->ignoreErrorsOnExtensionAndPath('ext-dom', 'src/XmlHelper.php', [ErrorType::SHADOW_DEPENDENCY])
;
