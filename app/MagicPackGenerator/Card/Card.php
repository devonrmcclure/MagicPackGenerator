<?php
namespace MagicPackGenerator\Card;

class Card {

    public $setCards;
    public $sortedSet;

    public function search($set, $cardsInSet)
    {
        $data = file_get_contents('http://manastack.com/api/cardSearch?sets=' . $set . '&limit=' . $cardsInSet);
        $this->setCards = json_decode($data, true);
        return $this->setCards;
    }

    public function sort($setCards)
    {
        $this->sortedSet = array("Mythic" => array(), 'Rare' => array(), 'Uncommon' => array(), 'Common' => array());

        // Split up the returned array into rarity.
        foreach($this->setCards as $card)
        {
            $this->sortedSet[$card['rarity']][] = $card;
        }

        return $this->sortedSet;
    }

}