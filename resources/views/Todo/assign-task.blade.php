<x-layout>

     <div class="card container mt-5 shadow">
        <div class="card-hearder">
           <h2 class="mt-3 ms-3">Assign a Task</h2>
       </div>
            <div class="card-body">
            <div>



<form action="{{ route('assign.todo') }}" method="POST">
    @csrf  {{-- Security token to prevent attacks --}}
    
    <div class="mb-3">
        <label for="assigned_to" class="form-label">Assign To:</label>
        <select name="assigned_to" id="assigned_to" class="form-control">
            <option value="">Select a User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('assigned_to')
            <small class="text-danger fw-bold">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Task:</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Enter task description">
        @error('title')
            <small class="text-danger fw-bold">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date:</label>
        <input type="date" name="date" id="date" class="form-control">
        @error('date')
            <small class="text-danger fw-bold">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="time" class="form-label">Time:</label>
        <input type="time" name="time" id="time" class="form-control">
        @error('time')
            <small class="text-danger fw-bold">{{ $message }}</smal>
        @enderror
    </div>
    <div class="d-flex justify-content-between">
        <div>
        <button type="submit" class="btn btn-primary">Assign Task</button>
        </div>
        <div>
        <a href="{{route('Task_list')}}"><button 
         class="btn btn-danger">Cancel</button></a>
        </div>
    </div>
  
</form>
</div>
            </div>
     </div>
    



</x-layout>