<?php

namespace Backend\src\Client\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * @SWG\Definition(
 *      definition="Survey",
 *      required={
 *          "name",
 *          "code",
 *      },
 *      @SWG\Property(property="name", type="string", description="the Survey name"),
 *      @SWG\Property(property="code", type="string", description="the Survey unique code"),
 * )
 */
class Survey extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
        ];
    }
}
