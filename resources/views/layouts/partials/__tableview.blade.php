<form class="d-flex" method="GET" action="{{ route('dashboard.show') }}">
  @csrf
  <div class="col">
    <div class="mb-3">
      <input type="text" name="search" value="{{ $search }}" id="" class="form-control" placeholder="Search" aria-describedby="helpId">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @if (count($users) > 0)
          <?php $i = 1 ?>
           @foreach ($users as $user)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone}}</td>
              <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
            </tr>
           @endforeach 
        @endif
    </tbody>
</table>
<nav aria-label="Page navigation">
  <ul class="pagination">
    @if (request()->has('page') && request()->get('page') > 0)
      <?php 
      $previous = request()->get('page') - 1;
      ?>
      <li class="page-item">
        <a class="page-link" href="{{route('dashboard.show', ['page' => $previous, 'search' => $search])}}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    @endif

    <?php 
    $pages = ceil($count / 10);
    $search = request()->input('search');
    ?>
    @for ($i = 0; $i < $pages; $i++)
      @if (request()->input('page') == $i)
        <li class="page-item active" aria-current="page">
          <a class="page-link" href="{{route('dashboard.show', ['page' => $i, 'search' => $search])}}">{{$i+1}}</a>
        </li>
      @else
        <li class="page-item"><a class="page-link" href="{{route('dashboard.show', ['page' => $i, 'search' => $search])}}">{{$i+1}}</a></li>
      @endif
    @endfor
    @if ($pages > 1)
      <?php 
      $next = 1;
      if(request()->has('page')){
        $next = request()->get('page') + 1;
      }
      ?>
      <li class="page-item">
        <a class="page-link" href="{{route('dashboard.show', ['page' => $next, 'search' => $search])}}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    @endif
  </ul>
</nav>