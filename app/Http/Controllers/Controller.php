<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Interact an instance.
     *
     * @param $interactionInstance
     * @param $data
     * @param null $method
     * @return mixed
     */
    public function interact($interactionInstance, $data, $method = null)
    {
        return app(\App\Contracts\Interactions\Interaction\Interaction::class)
            ->interact($interactionInstance, $data, $method);
    }
}
