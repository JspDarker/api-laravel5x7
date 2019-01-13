<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request); # custom down

//        return [
//          'name' => $this->name,
//          'price' => $this->price,
//        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.9.1',
            '_author' => url('http://github.com/JspDarker')
        ];
    }

    public static function notFound()
    {
        return [
            'status' => 404,
            'msg' => 'data not found',
        ];
    }
}
