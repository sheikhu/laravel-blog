<?php

namespace App\Menu\Matcher\Voter;

use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\Voter\VoterInterface;

/**
 * Voter based on the uri
 */
class UriVoter implements VoterInterface
{
    private $uri;

    public function __construct($uri = null)
    {
        $this->uri = $uri;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function matchItem(ItemInterface $item)
    {
        if (null === $this->uri || null === $item->getUri()) {
            return null;
        }


        if ($item->getUri() === $this->uri)
            return true;


        if(strpos($this->uri, $item->getUri().'/') !== false)
            return true;

        return null;
    }
}
