<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use Carbon\Carbon;
use App\Events ;
use http\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Builder\Class_;
use function Couchbase\defaultDecoder;


class ChatController extends Controller
{
    public function getAuthUser(){

        if( Auth::check() ) {

            $authUser = [
                'name' => Auth::user()->getUserFullName(),
                'id' => Auth::user()->id,
                'profilePicture' => Auth::user()->getUserAvatar(),
            ];
 
            return response()->json([
                'authUser' => $authUser,
            ]);

        }

        return response()->json([
            'authUser' => null,
        ]);       
    }

    public  function storeMessage(Request $request){

        $currentUser = Auth::user();
        $message = $request['message'];
        $participantsId = $request->participantsId;
        
        $senderUser = [
            'name' => $currentUser->getUserFullName(),
            'id' => $currentUser->id,
            'profilePicture' => $currentUser->getUserAvatar(),
        ];
    
        $senderMessage = [
            'content' => $message['content'] ,
            'myself' => false,
            'participantId' => $currentUser->id,
            'timestamp' =>  $message['timestamp'],
            'type' => 'text',
        ];

        // new Events\PrivateChat([
        //     'senderMessage' => $senderMessage,
        //     'senderUser' => $senderUser,    
        // ]);

        event(new App\Events\PrivateChat([
            'senderMessage' => $senderMessage,
            'senderUser' => $senderUser,    
        ]))
        // Events\PrivateChat::dispatch([
        //     'senderMessage' => $senderMessage,
        //     'senderUser' => $senderUser,    
        // ]);
        

        $currentUser->chats()->create([
            'message' => $message['content'],
            'participant_id' =>  $participantsId,  
        ]);    
       
        return response()->json([
           'success' => true,   
        ]);

    }

    public function getMessages() {

        $adminData = User::find(1);

        if( Auth::check() && Auth::user()->id != 1 ){

            $messagesArray = Auth::user()->chats;
            $participantMessagesArray = Chat::where('participant_id', Auth::user()->id)->get();
            
            $mergeMessages = $messagesArray->merge($participantMessagesArray);
            
            $admin = [
                'name' => $adminData->getUserFullName(),
                'id' => $adminData->id,
                'profilePicture' => $adminData->getUserAvatar(),
            ];

            return response()->json([
                'admin' => $admin,  
                'mergeMessages' => $mergeMessages
            ]);
        }
    }
}
