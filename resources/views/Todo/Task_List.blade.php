<x-layout>
<body>
  <!-- Start your project here-->
  <section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">
          <div class=" justify-content-between">
          <div>
                <a href="{{route('assign.task')}}"><button type="button" class="btn btn-primary mb-4">Assign Task</button></a>
          </div>
      
          </div>
          
          <div class="card">
            <div class="d-flex justify-content-between card-header">
                <div class=" p-3">
                  <h5 class="mb-0"><i class="fas fa-tasks me-2"></i>Task List</h5>
                </div>
                <div class=" p-3">
                    <h5>List of all assiged tasks</h5>
                </div>
            </div>
          
            <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">

              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">Team Member</th>
                    <th scope="col">Task Item</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($todos as $todo)
                    
                  
                  <tr class="fw-normal">
                    <th>
                      <img src="{{asset('storage/'.$todo->assignedBy->profile_picture)}}" class="shadow-1-strong rounded-circle" alt="avatar 1"
                        style="width: 40px; height: 40px;">
                      <span class="ms-2">{{$todo->assignedBy->name}}</span>
                    </th>
                    <td class="align-middle">
                      <span >{{$todo->title}}</span >
                    </td>
                    <td class="align-middle">
                      <h6 class="mb-0"><span class="badge bg-danger">{{$todo->status}}</span></h6>
                    </td>
                    <td class="align-middle">
                      <a href="{{route('edit_show', $todo->id)}}" data-mdb-toggle="tooltip" title="Done" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{route('delete_todo', $todo->id)}}" data-mdb-toggle="tooltip" title="Remove" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach 
                
        </div>
      </div>
      
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>

</body>


</x-layout>

