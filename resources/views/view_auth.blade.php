<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap" rel="stylesheet">
<style>
h2 {
	font-size: 26px;
    text-align: center;
    color: white;
    margin-bottom: 30px;
}


header{
    background-color:black;
    display: flex;
    justify-content: center;
    color: black;
}


header #header-menu{
    list-style: none;
    padding: 10%;
    display: flex;
    gap: 30%;
}


header #header-menu li > a{
    text-decoration: none;
    color: white;
    transition: all 1s;
}




footer{
    background-color:black;
    display: flex;
    justify-content: center;
}

footer #social{
    list-style: none;
    padding: 1.5%;
    display: flex;
    gap: 10%;

}

footer #social li > a{
    text-decoration: none;
    color: #000000;
}



p {
	margin: 0;
	padding: 0;
    font-size: 20px;
}</style>
</head>
<body>

    <header>
        <nav
          class="navbar navbar-expand-sm navbar-light"
          style="background-color: #fff"
        >
          <div class="container">
            <a href="/index"  class="btn btn-success p-2" style="margin-left: 4%;margin-top:2%">back</a>

            <button
              class="navbar-toggler d-lg-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapsibleNavId"
              aria-controls="collapsibleNavId"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
        
            </div>
          </div>
        </nav>
      </header>
      {{-- <a href="/sortUp"><button  class="btn btn-primary">sort up</button></a></div> --}}
    <a href="/sortDown"><button  class="btn btn-primary">sort Down</button></a></div>

<div class=" d-flex" >
    <div class="card m-6" style="width: 500px;">
        <div class="card-body">
            <h5 class="card-title mb-4">Author Name : <b>{{$author['name']}}</b></h5>
            <p class="card-text">Author Nathonality: <b>{{$author['nationality']}}</b></p>
            <p class="card-text">Author Email : <b>{{$author['email']}}</b></p>
        </div>
    </div>


@foreach ($books as $book)
<div id="cardsDiv" class="card m-5" style="width: 15rem;">
    <img src="data:image/jpg;charset=utf8;base64,{{$book['book_image']}}" class="card-img-left" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$book['book_title']}}</h5>
      <p class="card-text"><a href="author/{{$book['author_id']}}"></a>{{$book['book_auther']}}</p>
      <p class="card-text">{{$book['book_description']}}</p>
      <a href="delete/{{$book['id']}}"  class="btn btn-primary">Delete</a>
      <a href="update/{{$book['id']}}" class="btn btn-primary">Update</a>
    </div>
  </div>

  @endforeach
</div>
  <footer>
    <ul id="social">


      <li><p style="font-size: 15px">@waad</p></li>
    </ul>
  </footer>
</body>
</html>
