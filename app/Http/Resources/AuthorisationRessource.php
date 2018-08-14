<?php

namespace App\Http\Resources;

use App\Authorisation;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorisationRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $auth  = new Authorisation();
        $access_token = $auth->getAcessToken();
        return [ 'access_token' => $access_token];
    }
}
