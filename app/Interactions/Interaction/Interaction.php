<?php

namespace App\Interactions\Interaction;

use App\Contracts\Interactions\Interaction\Interaction as Contract;

class Interaction implements Contract
{
    /**
     * Interact an instance.
     *
     * @param $interactionInstance
     * @param array $data
     * @param $method
     * @return mixed
     */
    public function interact($interactionInstance, array $data, $method = null)
    {
        return app()->call($interactionInstance . '@interact', $data, $method);
    }
}
