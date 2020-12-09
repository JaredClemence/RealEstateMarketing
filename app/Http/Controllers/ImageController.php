<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Email;
use App\Events\EmailOpenedEvent;

class ImageController extends Controller
{
    public function serve(Request $request, $filePath){
        if( $request->has('security') ){
            $this->processKey( $request->security );
        }
        // here i'm getting only the path from the root (this way we can change the root later) / also we can change the structor on the store itself, change in one place config.fs.
      // $filePath = Storage::url($filePath); <== this doesn't work don't use
      // check for existance
       if (!Storage::disk('public')->exists($filePath)){ // as mentionned precise relatively to storage disk root (this one work well not like Storage:url()
          abort('404');
       }
       // if there is parameters [you can change the files, depending on them. ex serving different content to different regions, or to mobile and desktop …etc] // repetitive things can be handled through helpers [make helpers]
       return response()->file(public_path($filePath)); // the response()->file() will add the necessary headers in our place
    }

    public function processKey($mailId) {
        $mail = Email::where('id',$mailId)->first();
        /* @var $mail Email */
        if( !$mail || $mail->exists == false ){
            abort('401');
        }
        EmailOpenedEvent::dispatch($mail);
    }

}
