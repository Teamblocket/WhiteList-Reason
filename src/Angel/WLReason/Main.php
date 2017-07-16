<?php

namespace Angel\WLReason;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\Config;

class Main extends \pocketmine\plugin\PluginBase implements \pocketmine\event\Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->saveDefaultConfig();
  }
  
  public function onLogin(\pocketmine\event\player\PlayerPreLoginEvent $ev){
    if(!$this->getServer()->isWhitelisted(($p = $ev->getPlayer()->getName()))){
      $p->kick($this->getConfig()->get("reason"), false);
    }
  }
}
