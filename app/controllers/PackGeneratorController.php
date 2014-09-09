<?php

use MagicPackGenerator\Card\Card;

class PackGeneratorController extends BaseController {

    /**
     * Take the $sortedSet and create a 15 card MTG pack with it.
     * @param  array $sortedSet The sorted set from PackSortController
     * @return [type]            [description]
     */
    public function getPack($set = 'm13', $cardsInSet = 249)
    {
        // TODO: Make sure no duplicates in pack
        // TODO: Add foils and allow duplicate if it's a foil
        $cards = new Card;
        $cards->search($set, $cardsInSet);
        $cards->sort($cards->setCards);
        $sortedSet = $cards->sortedSet;

        // 1 in 8 chance of a pack having a mythic.
        $rand = Rand(1,8);
        // Add a mythic to the pack
        if($rand == 1)
        {
            $randCard = Rand(0, count($sortedSet['Mythic'])-1);
            $pack[] = $sortedSet['Mythic'][$randCard];
        // Add a rare to the pack
        } else
        {
            $randCard = Rand(0, count($sortedSet['Rare'])-1);
            $pack[] = $sortedSet['Rare'][$randCard];
        }

        // Add 3 uncommons to the pack
        for($i = 0; $i < 3; $i++)
        {
            $randCard = Rand(0, count($sortedSet['Uncommon'])-1);
            $pack[] = $sortedSet['Uncommon'][$randCard];
        }

        // Add 11 commons to the pack
        for($i = 0; $i < 11; $i++)
        {
            $randCard = Rand(0, count($sortedSet['Common'])-1);
            $pack[] = $sortedSet['Common'][$randCard];
        }

        return View::make('index')
                ->with('pack', $pack);
    }

}