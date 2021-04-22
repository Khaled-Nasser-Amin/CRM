<?php

namespace App\Http\Actions;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Providers\TwoFactorAuthenticationProvider;

class EnableTwoFactorAuthentication
{
    /*
     * The two factor authentication provider.
     *
     * @var \Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider
     */
    protected $provider;

    /*
     * Create a new action instance.
     *
     * @param  \Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider  $provider
     * @return void
     */
    public function __construct(TwoFactorAuthenticationProvider $provider)
    {
        $this->provider = $provider;
    }

    /*
     * Enable two factor authentication for the user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function __invoke($user)
    {
        $user->forceFill([
            'two_factor_secret' => encrypt($this->provider->generateSecretKey()),
            'two_factor_recovery_codes' => encrypt(json_encode(Collection::times(8, function () {
                return $this->generate();
            })->all())),
        ])->save();
    }


    public static function generate()
    {
        return Str::random(10).'-'.Str::random(10);
    }
}
