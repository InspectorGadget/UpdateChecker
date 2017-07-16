<?php

/* 
 * Copyright (C) 2017 RTG
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace RTG\UpdateChecker;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase {
    
    public function onEnable() {
        $this->checkUpdate();
    }
    
    public function checkUpdate() {
        
        $url = \pocketmine\utils\Utils::getURL("https://raw.githubusercontent.com/InspectorGadget/UpdateChecker/master/plugin.yml");
        $yaml = yaml_parse($url);
        
        if ($this->getDescription()->getVersion() != $yaml['version']) {
            $this->getLogger()->warning("Please get the latest version of UpdateChecker from GitHub!");
        } else {
            $this->getLogger()->warning("You are using the latest version of UpdateChecker!");
        }
        
    }
     
}