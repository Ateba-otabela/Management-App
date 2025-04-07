<x-layout>

<body>
  <!-- Start your project here-->
  <style>
 
  </style>
  <section class="vh-70 gradient-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
        <a href="{{route('Task_list')}}" data-mdb-toggle="tooltip" title="Set due date"><i class="fas fa-arrow-left fa-lg me-3 mb-3"></i>Back
        </a>
      <h5 class="text-muted">Edit Your Task</h5>
                            
          <div class="card">
            <div class="card-body p-5">
            <form action="{{route('update_todo', $todo->id)}}" method="post">
             
                        @csrf
                        <div class="mt-3">
                            <label for="title">Task_item</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
                            @error('task_item')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$todo->date}}">
                            @error('date')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="time">Time</label>
                            <input type="text" class="form-control" id="time" name="time" value="{{$todo->time}}">
                            @error('time')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="title">Status</label>
                            <input type="text" class="form-control" id="title" name="status" value="{{$todo->status}}">
                            @error('status')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
   
                       

                   
            </div>  
                
        </div>
       
       
      </div>
      
    </div>
    <div class="d-flex justify-content-between">
          <div class="d-block">    
              <button type="submit" class="btn btn-success mt-3 ">Save</button>
          </div>
          </form> 
          <div class="d-block">    
              <a href="{{route('manage_task')}}"><button  class="btn btn-danger mt-3 ">Cancel</button></a>
          </div>
       </div>
       </div> 
      
</div>
  
  
  </section>

</body>
</x-layout>


