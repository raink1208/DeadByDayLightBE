<?php


namespace rain1208\deadByDayLight\game;


use pocketmine\Server;
use rain1208\deadByDayLight\Main;
use rain1208\deadByDayLight\map\Map;

class Game
{
    /** @var Map  */
    private $map;

    /** @var GameTask */
    private $gameTask;

    public function __construct(Map $map)
    {
        $map->reset();
        $this->map = $map;
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