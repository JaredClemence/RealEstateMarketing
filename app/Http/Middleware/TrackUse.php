<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Events\LinkFollowedEvent;
use App\Models\Email;

class TrackUse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->has('security') ){
            $mail = Email::where('id',$request->security)->first();
            /* @var $mail Email */
            if( !$mail || $mail->exists == false ){
                abort('401');
            }
            LinkFollowedEvent::dispatch($mail);
        }
        return $next($request);
    }
}
