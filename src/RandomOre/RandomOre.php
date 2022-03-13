<?php

namespace RandomOre;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\item\VanillaItems;
use pocketmine\block\BlockFactory;
use pocketmine\item\ItemFactory;

class RandomOre extends PluginBase implements Listener {

    public $cfg;

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->cfg = $this->getConfig();
        $this->saveDefaultConfig();
    }

    public function onBreak(BlockBreakEvent $event) {
        $block = $event->getBlock();
        $player = $event->getPlayer();

      if ($block->getId() == $this->cfg->get("Id") && $block->getMeta() == $this->cfg->get("Meta")) {
        $num = rand(0,100); 
        if($num >= 0 && $num <= 20){
          $event->setDrops([
            ItemFactory::getInstance()->get($this->cfg->get("1Drops"), 0, 1)
          ]);
          $player->sendTip($this->cfg->get("1Message"));
        }
        if($num >= 20 && $num <= 40){
            $event->setDrops([
                ItemFactory::getInstance()->get($this->cfg->get("2Drops"), 0, 1)
            ]);
            $player->sendTip($this->cfg->get("2Message"));
        }
        if($num >= 40 && $num <= 60){
            $event->setDrops([
              ItemFactory::getInstance()->get($this->cfg->get("3Drops"), 0, 1)
            ]);
            $player->sendTip($this->cfg->get("3Message"));
        }
        if($num >= 60 && $num <= 80){
            $event->setDrops([
              ItemFactory::getInstance()->get($this->cfg->get("4Drops"), 0, 1)
            ]);
            $player->sendTip($this->cfg->get("4Message"));
        }
        if($num >= 80 && $num <= 100){
            $event->setDrops([
              ItemFactory::getInstance()->get($this->cfg->get("5Drops"), 0, 1)
            ]);
            $player->sendTip($this->cfg->get("5Message"));
        }
      } 
    }
}