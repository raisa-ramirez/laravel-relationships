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
              <img src="{{ $user->image->url }}" class="float-start rounded-circle img-thumbnail bg-info" style="width:10%; margin-right:1%; margin-bottom:1%">
              <h1 class="card-title text-white">{{ $user->name }}</h1>
              <h5 class="bg-white p-3">
                <span class="badge text-bg-dark">Level</span> 
                <a href="{{ route('level', $user->level_id) }}" class="btn btn-outline-primary" 
                style="--bs-btn-padding-y: .18rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .80rem;">
                  {{ $user->level->name }}
                </a> 
              </h5>                 
              <div class="accordion accordion-flush bg-dark" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header bg-dark">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#firstPanel">
                        Social Networks
                      </button>
                    </h2>
                    <div id="firstPanel" class="accordion-collapse collapse show">
                      <div class="accordion-body">
                          <p><span class="badge text-bg-info rounded-pill">Instagram</span> {{ $user->profile->instagram }}</p>
                          <p><span class="badge text-bg-info rounded-pill">Github</span> {{ $user->profile->github }}</p>
                          <p><span class="badge text-bg-info rounded-pill">Web</span> {{ $user->profile->web }}</p> 
                      </div>
                    </div>
                  </div>

                  <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#secondPanel">
                          Personal Information
                        </button>
                      </h2>
                      <div id="secondPanel" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          <p><span class="badge text-bg-info rounded-pill">Country</span> {{ $user->location->country }}</p>
                          <p><span class="badge text-bg-info rounded-pill">Email</span> {{ $user->email }}</p>
                        </div>
                      </div>
                  </div>

                  <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#thirdPanel">
                          Groups
                        </button>
                      </h2>
                      <div id="thirdPanel" class="accordion-collapse collapse">
                        <div class="accordion-body">
                          @forelse ($user->groups as $item)
                              <span class="badge text-bg-info rounded-pill">{{ $item->name }}</span>
                          @empty
                          <p class="text-center text-primary">El usuario no tiene grupos.</p>
                          @endforelse
                        </div>
                      </div>
                  </div>

                  <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fourthPanel">
                          Posts
                        </button>
                      </h2>
                      <div id="fourthPanel" class="accordion-collapse show collapse">
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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fifthPanel">
                          Videos
                        </button>
                      </h2>
                      <div id="fifthPanel" class="accordion-collapse show collapse">
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