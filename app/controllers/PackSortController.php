<?php

class PackSortController extends BaseController {

    /**
     * Get all the cards in a set from ManaStack's search API and order them into $sortedSet
     * based on rarity, then pass the sorted set into the PackGeneratorController to create the
     * pack.
     * @param  string  $set           The set to pack a pack with
     * @param  integer $numCardsInSet The number of cards in the set.
     * @return [type]                 [description]
     */
    public function getCards($set = 'm13', $numCardsInSet = 249)
    {
        $sortedSet = array("Mythic" => array(), 'Rare' => array(), 'Uncommon' => array(), 'Common' => array());
        $pack = [];

        $data = file_get_contents('http://manastack.com/api/cardSearch?sets=' . $set . '&limit=' . $numCardsInSet);
        $setCards = json_decode($data, true);

        // Split up the returned array into rarity.
        foreach($setCards as $card)
        {
            $sortedSet[$card['rarity']][] = $card;
        }

        $packGenerate = new PackGeneratorController;
        $packGenerate->getPack($sortedSet);
    }
}