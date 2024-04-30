@extends('layout')

@section('content')    
<div class="content">
  <h1>Visit</h1>
  <div class="search">
    <input type="text" name="search" class="searchCard form-control" placeholder="Search ..">
  </div>
    <div class="mt-1 row row-cols-1 row-cols-md-3 g-3">
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit1" role="button" aria-expanded="false" aria-controls="collapseVisit1">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title text-wrap">
                  <span>AA1</span>
                  <span> - </span>
                  PT. ABC Indonesia 
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit1">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit2" role="button" aria-expanded="false" aria-controls="collapseVisit2">
          {{-- ADD CLASS VISITED FOR CARD ALREADY VISITED --}}
          <div class="cardVisit visited">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA2</span>
                  <span> - </span>
                  PT. CDE Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit2">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit visited">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
      <div class="col wrappervisit">
        <a class="btn " data-bs-toggle="collapse" href="#collapseVisit3" role="button" aria-expanded="false" aria-controls="collapseVisit3">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>AA3</span>
                  <span> - </span>
                  PT. EFG Indonesia
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit3">
                <span class="text-wrap">Gedung ABC Jl. Tomang Raya Kav 21  23, Jakarta Barat</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info</a>
                  <a href="#" class="btn btn-primary rounded-lg p-1 px-3" id="visited"><i class="fa fa-check-square"></i> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>      
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#visited').click(function () {
      $('#visited').parent().parent().parent().parent().addClass('visited');
    })
  })
</script>
@endsection
