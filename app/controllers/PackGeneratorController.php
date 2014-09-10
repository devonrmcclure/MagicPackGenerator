<?php

use MagicPackGenerator\Card\Card;

class PackGeneratorController extends BaseController {

    /**
     * Take the $sortedSet and create a 15 card MTG pack with it.
     * @param  array $sortedSet The sorted set from PackSortController
     * @return [type]            [description]
     */
    public function getPack($set = 'm13', $cardsInSet = 295)
    {
        // TODO: Make sure no duplicates in pack
        // TODO: Add foils and allow duplicate if it's a foil
        $cards = new Card;
        $cards->search($set, $cardsInSet);
        $cards->sort($cards->setCards);
        $sortedSet = $cards->sortedSet;
        $pack = [];

        // 1 in 8 chance of a pack having a mythic.
        $rand = Rand(1,7);
        // Add a mythic to the pack
        if($rand == 1 && count($sortedSet['Mythic']) != 0)
        {
            $randCard = Rand(0, count($sortedSet['Mythic'])-1);
            $pack[] = $sortedSet['Mythic'][$randCard];
        // Add a rare to the pack
        } elseif(count($sortedSet['Rare']) != 0)
        {
            $randCard = Rand(0, count($sortedSet['Rare'])-1);
            $pack[] = $sortedSet['Rare'][$randCard];
        }

        // Add 3 uncommons to the pack
        for($i = 0; $i < 3;)
        {
            $randCard = Rand(0, count($sortedSet['Uncommon'])-1);
            $card = $sortedSet['Uncommon'][$randCard];
            if(!$pack)
            {
                $pack[] = $card;
            }

            if(!in_array($card, $pack))
            {
                $pack[] = $card;
                $i++;
            }

        }

        // Add commons to the pack for the remainder of the slots available
        do
        {
            $randCard = Rand(0, count($sortedSet['Common'])-1);
            $card = $sortedSet['Common'][$randCard];

            if(!in_array($card, $pack))
            {
                $pack[] = $card;

            } else {
                echo 'dupe';
            }
        } while(count($pack) < 15);

        return View::make('index')
                ->with('pack', $pack);
/*
                function checkDuplicate(&$pack, &$cardNames, $i, $randNum)
                    {
                        if(in_array($cardNames[$randNum], $pack))
                        {
                            //echo $cardNames[$randNum] . '-----<br />';
                            $randNum = rand(0,count($cardNames)-1);
                            $i - 1;
                            checkDuplicate($pack, $cardNames, $i, $randNum);
                        }
                        else
                        {
                            $pack[$i] = $cardNames[$randNum];
                            return $pack;
                        }
                }*/
    }

}