<?php


namespace rain1208\deadByDayLight\game;


use pocketmine\Player;
use pocketmine\Server;
use rain1208\deadByDayLight\Main;
use rain1208\deadByDayLight\map\Map;
use rain1208\deadByDayLight\resource\Generator;

class Game
{
    /** @var Map  */
    private $map;

    /** @var GameTask */
    private $gameTask;

    /** @var Player[] */
    private $flags;

    private $resource;

    public function __construct(Map $map)
    {
        $map->reset();
        $this->map = $map;
        $this->resource = Main::getInstance()->getResourceManager()->getData($map->getName());
    }

    /** @return Player[] */
    public function getFlags(): array
    {
        return $this->flags;
    }

    public function setFlag(Player $player,bool $bool)
    {
        if ($bool) {
            $this->flags[$player->getName()] = $player;
        } else {
            unset($this->flags[$player->getName()]);
        }
    }

    /** @return Generator[] */
    public function getGenerator(): array
    {
        return $this->resource["generator"];
    }

    public function startGame(): void
    {
        Main::getInstance()->getScheduler()->scheduleRepeatingTask($this->gameTask = new GameTask($this),20);
        Server::getInstance()->broadcastMessage("ゲームを開始します");
    }

    public function endGame(): void
    {
        Server::getInstance()->broadcastMessage("ゲームを終了します");
        Main::getInstance()->getScheduler()->cancelTask($this->gameTask->getTaskId());
    }
}