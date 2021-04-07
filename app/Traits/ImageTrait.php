<?php

namespace App\Traits;

use App\Models\Image;

trait ImageTrait
{
    public function AddSingleImage($request,$path){
        $request->validate(['image' => 'required|mimes:jpg,png,jpeg,gif']);
        $file=$request->file('image');
        $fileName=time().'_'.$file->getClientOriginalName();
        $file->move($path,$fileName);
        return $fileName;
    }

    public function unlinkImage($path){
        unlink($path);
    }

    public function AddGroupOfImages($request,$product){
        if ($request->groupImage){
            $request->validate([
                'groupImage' => 'required|array|min:1',
                'groupImage.*' => 'mimes:jpeg,jpg,png',
            ]);
            $files=$request->file('groupImage');
            foreach ($files as $file){
                $fileName=time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/products/'),$fileName);
                Images::create(['name'=>$fileName])->product()->associate($product->id)->save();
            }
        }
    }
    public function unlinkGroupOfImage($images){
        foreach ($images as $image){
            unlink('images/products/'.$image->name);
        }
    }
}
