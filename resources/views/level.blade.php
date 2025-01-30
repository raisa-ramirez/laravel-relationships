<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-12 mt-3">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('home') }}" class="btn btn-outline-warning" type="button">Go Home</a>
          </div>
        </div>
      </div>
      <div class="card border-dark mt-4">             
          <div class="card-body bg-dark">
              <h5><span class="badge text-bg-info">Level</span></h5> 
              <h1 class="card-title text-white">{{ Str::upper($level->name) }}</h1>                                
              <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#firstPanel">
                          All posts in level {{ $level->name }}
                        </button>
                      </h2>
                      <div id="firstPanel" class="accordion-collapse show collapse">
                        <div class="accordion-body">
                          <div class="row">
                              @forelse ($posts as $item)
                                <div class="col-6">
                                  <div class="card mb-3 border-info">
                                      <div class="row no-gutters">
                                        <div class="col-md-4">
                                          <img src="{{ $item->image->url }}" class="card-img">
                                        </div>
                                        <div class="col-md-8">
                                          <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">
                                              <small class="text-body-secondary">
                                                  <span class="badge text-bg-primary">{{ $item->category->name }}</span>
                                                  with {{ ($item->comments_count==0)?0:$item->comments_count }} {{ Str::plural("Comment", $item->comments_count) }}
                                              </small>
                                              <br>
                                              <p class="fw-semibold text-primary">
                                              @foreach ($item->tags as $tag)
                                                #{{ $tag->name }}                                                      
                                              @endforeach  
                                              </p>                                                 
                                            </p>
                                          </div>                                            
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              @empty
                                <p class="text-center text-primary">El usuario no ha realizado publicaciones.</p>
                              @endforelse                               
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#secondPanel">
                          All videos in level {{ $level->name }}
                        </button>
                      </h2>
                      <div id="secondPanel" class="accordion-collapse show collapse">
                        <div class="accordion-body">
                          <div class="row">
                            @forelse($videos as $item)
                              <div class="col-6">
                                <div class="card mb-3 border-info">
                                  <div class="row no-gutters">
                                    <div class="col-md-4">
                                      <img src="{{ $item->image->url }}" class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                      <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">
                                          <small class="text-body-secondary">
                                              <span class="badge text-bg-primary">{{ $item->category->name }}</span>
                                              with {{ ($item->comments_count==0)?0:$item->comments_count }} {{ Str::plural("Comment", $item->comments_count) }}
                                          </small>
                                          <br>
                                          <p class="fw-semibold text-primary">
                                          @foreach ($item->tags as $tag)
                                              #{{ $tag->name }}                                                      
                                          @endforeach  
                                          </p>                                                 
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @empty
                              <p class="text-center text-primary">El usuario no ha publicado videos.</p>
                            @endforelse                                
                          </div>
                        </div>
                      </div>
                  </div>
              </div>                              
          </div>            
      </div>
    </div>
    
</body>
</html>