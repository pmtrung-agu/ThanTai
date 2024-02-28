<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class FileController extends Controller
{
    function uploads(Request $request){
      $files = $request->file('dinhkem_files');
    	if(!empty($files)):
    		foreach($files as $file):
          $extension = $file->getClientOriginalExtension();
          $realname = $file->getClientOriginalName();
          $filename = date("YmdHis") . '_' . strtolower(uniqid()) . '.' . $extension;
          Storage::put('public/files/'.$filename, file_get_contents($file), 'public');
          $size = Storage::size('public/files/'.$filename);
          echo '<div class="form-group row items draggable-element">
            <input type="hidden" name="file_aliasname[]" value="'.$filename.'" readonly/>
            <input type="hidden" name="file_filename[]" value="'.$realname.'" class="form-control"/>
            <div class="col-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="hidden" name="file_size[]" value="'.$size.'" class="form-control">
                  <input type="hidden" name="file_type[]" value="'.strtolower($extension).'" class="form-control">
                  <input type="text" name="file_title[]" placeholder="Chú thích tập tinh đính kèm" value="'.$realname.'" class="form-control form-control-sm">
                  <div class="input-group-append">
                    <a href="'.env('APP_URL').'file/delete/'.$filename.'" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                  </div>
              </div>
            </div>
            </div>
          </div>';
    		endforeach;
    	endif;
    }

    function download(Request $request, $filename){
      return Storage::download('public/files/'.$filename);
    }

    function delete(Request $request, $filename){
      Storage::delete('public/files/'.$filename);
    }

    static function remove($filename){
      Storage::delete('public/files/'.$filename);
    }

    static function removeReport($filename){
      Storage::delete('public/files/report/'.$filename);
    }
}
