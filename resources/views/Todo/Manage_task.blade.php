<x-layout>
<body>
  <!-- Start your project here-->
  <section class="vh-70" style="background-color: #eee;">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-sm-15 col-lg-13 col-md-15 col-xl-20">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center  pb-3">Manage Your Personal Task </h4>

            <form action="{{route('search')}}" method="get" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                    <div class="col-12">
                      <div class="form-outline">
                        <input type="search" id="form1" class="form-control" name="search"/>
                        <label class="form-label" for="form1">Search a task here</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Search</button>
                    </div>
              </form>
           
          

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($todos as $todo)
                  
              
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$todo->title}}</td>
                  <td>{{$todo->date}}</td>
                  <td>{{$todo->time}}</td>
                  <td>{{$todo->status}}</td>
                  <td>
                    <button type="submit" class="btn-sm btn-success p-sm-2">View</button>
                
                    
                    <a href="{{route('edit_show',$todo->id)}}"><button type="submit" class="btn-sm btn-info p-sm-2">Edit</button></a>
                      
                    
                
                      
                  
                      
                   

                                                    
    <!-- Button to trigger the delete confirmation modal -->
    <button type="button" class="btn-sm btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
        Delete
        <i class="fs-6 bi-trash"></i></button>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmLabel" >Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this file? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('delete_todo',$todo->id)}}"><button type="button" class="btn btn-danger" data-id="{{ $todo->id }} id="confirmDelete" >Yes, Delete</button></a>
                </div>
            </div>
        </div>
    </div>
     
        

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmLabel" >Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   fhfhfhfhfhf
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href=""><button type="submit" class="btn btn-danger" id="confirmDelete" >Yes, Delete</button></a>
                </div>
            </div>
        </div>
    </div>
                   
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>


</x-layout>





