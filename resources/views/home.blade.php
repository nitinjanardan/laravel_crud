@include('inc.header')

<div class="container">
    <div class ="row">
        <legend>Laravel CRUD Application</legend>
        <div class = "row">
            
                @if(session('info'))
                    <div class="class-md-6 col-lg-6 alert alert-success">
                        {{ session('info') }}
                    </div>    
                @endif
            
        </div>
       <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Title</th>{{ session('info') }}
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
                @if(count($articles) > 0)
                    @foreach($articles->all() as $article )
            <tr class="table-active">
              <th scope="row">{{ $article->id }}</th>
              <td>{{ $article->title }}</td>
              <td>{{ $article->description }}</td>
              <td>
                  <a href = '{{ url("/read/{$article->id}") }}' class ="label label-primary">Read</a>
                  <a href = '{{ url("/update/{$article->id}") }}'class ="label label-success">Update</a>
                  <a href = '{{ url("/delete/{$article->id}") }}' class ="label label-danger">Delete</a>
              </td>
            </tr>
                    @endforeach
                @endif    
          </tbody>
</table>  
    </div>    
</div>    

@include('inc.footer')

