<?php


namespace rain1208\deadByDayLight\listener;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerToggleSneakEvent;
use rain1208\deadByDayLight\Main;

class PlayerEventListener implements Listener
{
    public function onSneak(PlayerToggleSneakEvent $event)
    {
        if (Main::getInstance()->gameExists()) {
            Main::getInstance()->getGame()->setFlag($event->getPlayer(),$event->isSneaking());
        }
    }
}