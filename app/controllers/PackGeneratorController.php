<?php

class PackGeneratorController extends BaseController {

    /**
     * Take the $sortedSet and create a 15 card MTG pack with it.
     * @param  array $sortedSet The sorted set from PackSortController
     * @return [type]            [description]
     */
    public function getPack($sortedSet)
    {
        // TODO: Make sure no duplicates in pack
        // TODO: Add foils and allow duplicate if it's a foil

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


        foreach($pack as $card)
        {
            echo '<img src="http://manastack.com/cards/images/' . $card['set'] . '/' . $card['num'] . '.jpg" />';
        }
    }

}


    /*
     * Created: 2014/05/07 @ 15:55 PST.
     *
     * Purpose: To create a random pack of magic cards from 28 different cards.
     *
     * TODO: Deal with duplicate cards in the pack.
     */
    /*
    $pack = array();

    $cardNames = [
      'Force Of Will',
      'Mana Drain',
      'Uril The Mistalker',
      'Heritage Druid',
      'Leyline Of Lifeforce',
      'Counterspell',
      'Terror',
      'Blood Moon',
      'Nicol Bolas',
      'Pilli-Palla',
      'Sol Ring',
      'Copper Myr',
      'Sword Of Kaladra',
      'Darksteel Plate',
      'Necropotence',
      'Kessig Wolf-Run',
      'Island',
      'Bayou',
      'Delver Of Secrets',
      'Black Vice',
      'Rain Of Gore',
      'Ranger Of Eos',
      'Horde Of Notions',
      'Fireblast',
      'Pyroblast',
      'Blue Elemental Blast',
      'Llanowar Elves',
      'Birds Of Paradise'
    ];

    for($i = 0; $i < 15; $i++)
    {
        $randNum = rand(0,count($cardNames)-1);
        $pack[$i] = $cardNames[$randNum];
        checkDuplicate($pack, $cardNames, $i, $randNum);

    }

    for($ii = 0; $ii < count($pack); $ii++)
    {
        echo '++++' . $pack[$ii] . '<br />';
    }

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
    }
?>
*/