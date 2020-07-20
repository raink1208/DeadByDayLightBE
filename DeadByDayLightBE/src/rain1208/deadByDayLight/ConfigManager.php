<?php


namespace rain1208\deadByDayLight;


use pocketmine\utils\Config;

class ConfigManager
{
    const Maps = 0;
    const Skills = 1;
    const Resources = 2;

    private $configs = [];

    public function __construct()
    {
        $f = Main::getInstance()->getDataFolder();
        $this->configs[self::Maps] = new Config($f."Map.json",Config::JSON);
        $this->configs[self::Skills] = new Config($f."Skill.json",Config::JSON);
        $this->configs[self::Resources] = new Config($f."Resource.json",Config::JSON);
    }

    public function get(int $id): Config
    {
        return $this->configs[$id];
    }
}