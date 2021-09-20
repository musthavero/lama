<?php

namespace Modules\Frontend\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class FrontendPolicies
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
