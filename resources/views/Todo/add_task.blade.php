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
      
             <h5 class="text-muted">Create New Task</h5>               
          <div class="card">
            <div class="card-body p-5">
            <form action="{{ Route('create_todo') }}" method="post">
                        @csrf
                        <div class="mt-3">
                            <label for="title">Task_item</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter task item">
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="date">Due date</label>
                            <input type="date" class="form-control" id="date" name="date" >
                            @error('date')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                            @error('time')
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
              <a href="{{route('Task_list')}}"><button  class="btn btn-danger mt-3 ">Cancel</button></a>
          </div>
       </div>
       </div> 
      
</div>
  
  
  </section>

</body>
</x-layout>


