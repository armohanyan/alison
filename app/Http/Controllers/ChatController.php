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
    public  function storeMessage(Request $request){

        dd($request->all());
        $currentUser = Auth::user();
        $message = $request['message'];
        $participants = $request->participantsId;
        // $admin = User::find($participants);

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

        Events\PrivateChat::dispatch([
            'senderMessage' => $senderMessage,
            'senderUser' => $senderUser,
        ]);
        
        $currentUser->chats()->create([
            'message' => $message['content'],
            'participant_id' =>  $participants  
        ]);
       
       return response()->json([
           'success' => true,
       ]);

    }

    public function getMessages() {

        $messagesArray = Auth::user()->chats;
        $participantMessagesArray =  Chat::where('participant_id', Auth::user()->id)->get();

        $userParticipant = collect([]);
        $messages = collect([]);

        foreach ( $messagesArray as $messageArray ){

            $currectType = [
                'content' => $messageArray->message ,
                'myself' => true,
                'participantId' => $messageArray->participant_id,
                'timestamp' => $messageArray->created_at,
                'type' => 'text',
            ];
            $messages->push($currectType);

        }

        foreach ( $participantMessagesArray as $participantMessageArray ){

            $currectType = [
                'content' => $participantMessageArray->message ,
                'myself' => false,
                'participantId' => $participantMessageArray->user_id,
                'timestamp' => $participantMessageArray->created_at,
                'type' => 'text',
            ];
            $messages->push($currectType);

            $userParticipantCorrectType = [
                'name' => $participantMessageArray->user->getUserFullName(),
                'id' => $participantMessageArray->user_id,
                'profilePicture' => $participantMessageArray->user->getUserAvatar(),
            ];
            $userParticipant->push($userParticipantCorrectType);

        }

        $authUser = [
            'name' => Auth::user()->getUserFullName(),
            'id' => Auth::user()->id,
            'profilePicture' => Auth::user()->getUserAvatar(),
        ];

        return response()->json([
            'messages' => $messages,
            'authUser' => $authUser,
            'userParticipant' => $userParticipant->unique('id')->values(),
        ]);
    }
}
