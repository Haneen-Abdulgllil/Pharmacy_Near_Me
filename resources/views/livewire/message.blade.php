

<?php

if (!function_exists('isPhoto')) 
{
    function isPhoto($path) 
    {
        // Get the file extension from the path
        $exploded = explode('.', $path);
        $ext = strtolower(end($exploded));
        // Define the photos extensions
        $photoExtensions = ['png', 'jpg', 'jpeg', 'gif', 'jfif', 'tif', 'webp'];
        // Check if this extension belongs to the extensions we defined
        if (in_array($ext, $photoExtensions)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isVideo')) 
{
    function isVideo($path) 
    {
        // Get the file extension from the path
        $exploded = explode('.', $path);
        $ext = end($exploded);
        // Define the videos extensions
        $videoExtensions = ['mov', 'mp4', 'avi', 'wmf', 'flv', 'webm'];
        // Check if this extension belongs to the extensions we defined
        if (in_array($ext, $videoExtensions)) {
            return true;
        }
        return false;
    }
}

?>

<div>
    <div class="row justify-content-center m-5" wire:poll="mountComponent()">
        @if(auth()->user()->is_active == true)
            <div class="col-md-4" wire:init>
                <div class="card">
                    <div class="card-header">
                        المستخدمين
                    </div>
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush" wire:poll="render">
                            @foreach($users as $user)
                                @php
                                    $not_seen = \App\Models\Messages::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                @endphp
                                <a href="{{ route('inbox.show', $user->id) }}" class="text-dark link">
                                    <li class="list-group-item" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                        <img class="img-fluid avatar" src="http://127.0.0.1:8000/uploads/avaters/client/avater.png">
                                        @if($user->is_online) <i class="fa fa-circle text-success online-icon"></i> @endif {{ $user->name }}
                                        @if(filled($not_seen))
                                            <div class="badge badge-success rounded">{{ $not_seen->count() }}</div>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(isset($clicked_user)) {{ $clicked_user->name }}

                    @elseif(auth()->user()->is_active == true)
                     .
                    @elseif($admin->is_online)
                        <i class="fa fa-circle text-success"></i> We are online
                    @else
                        Messages
                    @endif
                </div>
                    <div class="card-body message-box">
                        @if(!$messages)
                            No messages to show
                        @else
                            @if(isset($messages))
                                @foreach($messages as $message)
                                    <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                        <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                                        <p class="my-0">{{ $message->message }}</p>
                                        @if (isPhoto($message->file))
                                            <div class="w-100 my-2">
                                                <img class="img-fluid rounded" loading="lazy" style="height: 250px" src="{{ $message->file }}">
                                            </div>
                                        @elseif (isVideo($message->file))
                                            <div class="w-100 my-2">
                                                <video style="height: 250px" class="img-fluid rounded" controls>
                                                    <source src="{{ $message->file }}">
                                                </video>
                                            </div>
                                        @elseif ($message->file)
                                            <div class="w-100 my-2">
                                                <a href="{{ $message->file}}" class="bg-light p-2 rounded-pill" target="_blank"><i class="fa fa-download"></i> 
                                                    {{ $message->file_name }}
                                                </a>
                                            </div>
                                        @endif
                                        <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
                                    </div>
                                @endforeach
                            @else
                                No messages to show
                            @endif
                            @if(!isset($clicked_user) and auth()->user()->is_active == true)
                               اضغط على احد الاشخاص لمشاهدة المحادثة
                            @endif
                        @endif
                    </div>
                @if(auth()->user()->is_active == false)
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                            <div wire:loading wire:target='SendMessage'>
                               ارسال الرسالة . . . 
                            </div>
                            <div wire:loading wire:target="file">
                             تحميل الملف . . .
                            </div>
                            @if($file)
                                <div class="mb-2">
                                   You have an uploaded file <button type="button" wire:click="resetFile" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove {{ $file->getClientOriginalName() }}</button>
                                </div>
                            @else
                               لا يوجد ملفات محملة
                            @endif
                            <div class="row">
                                <div class="col-md-7">
                                    <input wire:model="messages" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" @if(!$file) required @endif>
                                </div>
                                @if(empty($file))
                                <div class="col-md-1 btn btn-submit btn-hover">
                                    <button type="button" class="border " id="file-area">
                                        <label>
                                            <i class="fa fa-file-upload"></i>
                                            <input type="file" wire:model="file">
                                        </label>
                                    </button>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <button class="btn btn-submit btn-hover  me-2 w-100"><i class="far fa-paper-plane"></i> ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>