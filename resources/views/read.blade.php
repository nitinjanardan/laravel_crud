@include('inc.header')

<div class="container">
    <div class ="row">
        <legend>Read Article</legend>
          <p class="lead"> {{ $articles->title }}  </p>
          <p> {{ $articles->description }}</p>

            <a href ="{{ url('/') }}" class="btn btn-primary">Back</a>
        </div>   
    </div>    
@include('inc.footer')

