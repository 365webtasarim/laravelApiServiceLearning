<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'action' =>'<a href="'.route('editSlider', $this->id).'" class="btn btn-success btn-xs tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a> <a data-method="delete" data-trans-button-cancel="Hayır" data-trans-button-confirm="Sil" data-trans-title="Silmek istediğinize emin misiniz?" class="btn btn-xs btn-danger tooltips" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
    <form method="POST" action="'.route('deleteSlider', $this->id).'" accept-charset="UTF-8" name="delete_item" class="hidden"><input name="_method" type="hidden" value="DELETE"></form></a>' ,
        ];
    }
}
