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

        $edit_route = '';
        $delete_route = '';
        $type = $request->type;

        switch ($type) {
            case 'video':
                $edit_route = 'editVideo';
                $delete_route = 'VideoDelete';
                $view_route = 'video';
                break;
            case 'article':
                $edit_route = 'editMakale';
                $delete_route = 'makaleDelete';
                $view_route='kose-yazisi';
                break;
            case 'post':
                $edit_route = 'editSohbet';
                $delete_route = 'SohbetDelete';
                $view_route='makale';
                break;
            default:
                $edit_route = 'editSlider';
                $delete_route = 'deleteSlider';
                break;
        }

        if($this->type == null){
            return [
                'id' => $this->id,
                'title' => $this->title,
                'device' => $this->device,
                'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
                'action' =>'<a href="'.route('editSlider', $this->id).'" class="btn btn-success btn-xs tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a> <a data-method="delete" data-trans-button-cancel="Hayır" data-trans-button-confirm="Sil" data-trans-title="Silmek istediğinize emin misiniz?" class="btn btn-xs btn-danger tooltips" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
    <form method="POST" action="'.route('deleteSlider', $this->id).'" accept-charset="UTF-8" name="delete_item" class="hidden"><input name="_method" type="hidden" value="DELETE"></form></a>' ,
            ];
        }else{
            return [
                'id' => $this->id,
                'title' => $this->title,
                'hit' => $this->hit,
                'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
                'action' =>'<a href="/'.$view_route.'/'.$this->slug.'" class="btn btn-primary btn-xs tooltips" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-eye"></i></a> <a href="'.route($edit_route, $this->id).'" class="btn btn-success btn-xs tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a> <a data-method="delete" data-trans-button-cancel="Hayır" data-trans-button-confirm="Sil" data-trans-title="Silmek istediğinize emin misiniz?" class="btn btn-xs btn-danger tooltips" style="cursor:pointer;" onclick="$(this).find(&quot;form&quot;).submit();"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
    <form method="POST" action="'.route($delete_route, $this->id).'" accept-charset="UTF-8" name="delete_item" class="hidden"><input name="_method" type="hidden" value="DELETE"></form></a>' ,
            ];
        }

    }
}
