<?php

namespace App\Repositories;

use App\Partner;

class PartnerRepository extends Repository
{
    /**
     * Create new instance of partner repository.
     *
     * @param Partner $partner Partner model
     */
    public function __construct(Partner $partner)
    {
        parent::__construct($partner);
        $this->partner = $partner;
    }
}
