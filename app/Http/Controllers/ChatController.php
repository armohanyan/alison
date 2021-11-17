<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Builder\Class_;
use function Couchbase\defaultDecoder;


class ChatController extends Controller
{
    public  function storeMessage(Request $request){

        $currentUser = Auth::user();

        if ($request->participantsId){
            foreach ( $request->participantsId as  $participantId ) {

                $currentUser->chats()->create([
                    'message' => $request->message['content'],
                    'participant_id' => $participantId
                ]);

            }
        }
        else{
            $currentUser->chats()->create([
                'message' => $request->message['content'],
            ]);;
        }


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
