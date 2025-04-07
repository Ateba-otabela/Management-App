<x-layout>
<div class="container mt-4 ">
<div>
    <div class="d-flex justify-content-between">
        <div>
            <h3>Notifications ({{ auth()->user()->unreadNotifications->count() }})</h3> <!-- Show unread count -->

        </div>
        <div>
            <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary">
                    Mark All as Read
                </button>
            </form>
        </div>
    </div>
    
    @foreach(auth()->user()->notifications as $notification)
        <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 10px;">
            <p>{{ $notification->data['message'] }}</p>
            <small>{{ $notification->created_at->diffForHumans() }}</small>

            @if($notification->read_at == null)
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-success">
                        Mark as Read
                    </button>
                </form>
            @else
                <span class="text-secondary fw-bold">✔ Read</span>
            @endif
        </div>
    @endforeach
</div>


</x-layout>