@include('include.header')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Agent List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active"><a href="#">Agent List</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Agent ID</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($featch as $row)
                    <tr>
                      <td>{{$row->agent_id}}</td>
                      <td>{{$row->mobile}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->password}}</td>
                      <td>{{$row->status}}</td>
                      <td><a href="EditAgent/{{$row->id}}" class="btn btn-primary    btn-sm">Edit</a>      <a href="DeleteAgent/{{$row->id}}" onclick="return confirm('Are you sure you want to delete this Row ?');" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    @include('include.footer')