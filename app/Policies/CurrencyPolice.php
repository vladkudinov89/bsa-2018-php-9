<?php

namespace App\Policies;

use App\Currency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolice
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Currency $currency
     * @return bool
     */
    public function view(User $user, Currency $currency)
    {
        return true;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->getAttribute('is_admin');
    }

    /**
     * @param User $user
     * @param Currency $currency
     * @return mixed
     */
    public function update(User $user, Currency $currency)
    {
        return $user->getAttribute('is_admin');
    }

    /**
     * @param User $user
     * @param Currency $currency
     * @return mixed
     */
    public function delete(User $user, Currency $currency)
    {
        return $user->getAttribute('is_admin');
    }


}
