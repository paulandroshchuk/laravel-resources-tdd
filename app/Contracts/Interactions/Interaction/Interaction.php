<?php

namespace App\Contracts\Interactions\Interaction;

interface Interaction
{
    /**
     * Interact an instance.
     *
     * @param $interactionInstance
     * @param array $data
     * @param $method
     * @return mixed
     */
    public function interact($interactionInstance, array $data, $method);
}
