<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Models;
use Image;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    //
    function uploads(Request $request){
      $files = $request->file('dinhkem');
    	if(!empty($files)):
    		foreach($files as $file):
          $extension = $file->getClientOriginalExtension();
          $realname = $file->getClientOriginalName();
          $filename = date("YmdHis") . '_' . strtolower(uniqid()) . '.' . $extension;
          //Storage::put('public/images/'.$filename, file_get_contents($file), 'public');
          Storage::put('private/images/'.$filename, file_get_contents($file), 'private');
          $origin = storage_path() . '/app/public/images/origin/'.$filename;
          Image::make($file->getRealPath())->save($origin);
          $thumb = storage_path().'/app/public/images/thumb_300x200/' . $filename;
          $thumb_800 = storage_path(). '/app/public/images/thumb_800x800/' . $filename;
          $thumb_785x476 =storage_path().'/app/public/images/thumb_785x476/' . $filename;
          Image::make($file->getRealPath())->resize(307, null, function($constraint){ $constraint->aspectRatio(); })->save($thumb);
          Image::make($file->getRealPath())->fit(800, 800, function ($constraint) {$constraint->aspectRatio();})->save($thumb_800);
          Image::make($file->getRealPath())->fit(785,476, function ($constraint) {$constraint->aspectRatio();})->save($thumb_785x476);
          echo '<div class="col-sm-6 col-md-4 items draggable-element text-center">
                <input type="hidden" name="hinhanh_aliasname[]" value="'.$filename.'" readonly/>
                <input type="hidden" name="hinhanh_filename[]" class="form-control" value="'.$realname.'" />
                  <a href="'.env('APP_URL').'storage/images/origin/'.$filename.'" class="image-popup">
                    <div class="portfolio-masonry-box">
                      <div class="portfolio-masonry-img">
                        <img src="'.env('APP_URL').'storage/images/thumb_300x200/'.$filename.'" class="thumb-img img-fluid" alt="work-thumbnail">
                      </div>
                      <div class="portfolio-masonry-detail">
                        <p>'.$realname.'</p>
                      </div>
                    </div>
                  </a>
                  <a href="'.env('APP_URL').'image/delete/'.$filename.'" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                    <i class="fa fa-trash"></i>
                  </a>
                  <input type="text" name="hinhanh_title[]" class="form-control" value="'.$realname.'" />
                </div>';
    		endforeach;
    	endif;
    }

    function delete(Request $request, $filename){
      Storage::delete('private/images/'.$filename);
      Storage::delete('public/images/origin/'.$filename);
      Storage::delete('public/images/thumb_300x200/'.$filename);
      Storage::delete('public/images/thumb_800x800/'.$filename);
      Storage::delete('public/images/thumb_785x476/'.$filename);
    }

    static function remove($filename){
      Storage::delete('private/images/'.$filename);
      Storage::delete('public/images/origin/'.$filename);
      Storage::delete('public/images/thumb_300x200/'.$filename);
      Storage::delete('public/images/thumb_800x800/'.$filename);
      Storage::delete('public/images/thumb_785x476/'.$filename);
    }
}
