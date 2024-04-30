@extends('layout')

@section('content')    
<div class="content">
  <h1>Visit</h1>
  <div class="search">
    <!-- {{ url()->current() }} -->
    @if(str_contains(url()->current(), 'Customer'))
      <!-- <a href="{{ route('customer.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Customer</a> &nbsp -->
      <a href="{{ route('visit.listOutlet') }}" class="btn btn-primary">Memulai Campaign <i class="fa fa-arrow-right"></i></a> &nbsp
      <form action="{{ route('visit.searchCustomer') }}" method="GET" class="form-inline">
    @else
      <a href="{{ route('outlet.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Outlet</a> &nbsp
      <a href="{{ route('visit.listCustomer') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali ke Kunjungan Toko</a>
      <form action="{{ route('visit.searchOutlet') }}" method="GET" class="form-inline">
    @endif
      <!-- <input type="text" name="search" class="searchCard form-control" placeholder="Cari . . .">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Cari</button>
      </div> -->
      <div class="input-group mb-3">
      <input type="text" class="form-control searchCard" placeholder="Cari . . ." name="search">
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit">Cari</button>
        </div>
      </div>
    </form>
  </div>
    <div class="mt-1 row row-cols-1 row-cols-md-3 g-3">
      <!-- CARD -->
      @foreach($customers as $data)
      <div class="col wrappervisit">
        <a class="btn cardVisit" data-bs-toggle="collapse" href="#collapseVisit{{ $data->id }}" role="button" aria-expanded="false" aria-controls="collapseVisit{{ $data->id }}">
          <div class="cardVisit">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title ">
                  <span>{{ $data->code }}</span><span> - </span><span class="text-wrap">{{ $data->name }}</span>
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit{{ $data->id }}">
                <span class="text-wrap">{{ $data->address }}</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info Lokasi</a>
                  <a href="{{ route('visit.act', $data->id) }}" class="btn btn-primary rounded-lg p-1 px-3"> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach

      {{-- EXAMPLE VISITED --}}
      <div class="col wrappervisit">
        <a class="btn cardVisit" data-bs-toggle="collapse" href="#collapseVisit0" role="button" aria-expanded="false" aria-controls="collapseVisit0">
          {{-- IF VISIT, ADD CLASS VISITED --}}
          <div class="cardVisit visited">
            <div class="card-body d-flex flex-column justify-content-around flex-grow-1">
              <div class="title d-flex flex-column gap-2 mb-3">
                <h5 class="card-title">
                  <span>{{ $data->code }}</span><span> - </span><span class="text-wrap">{{ $data->name }}</span>
                </h5>
              </div>
              <div class="collapse align-self-end" id="collapseVisit0">
                <span class="text-wrap">{{ $data->address }}</span>
                <div class=" d-flex justify-content-end gap-2">
                  <a href="#" class="btn btn-secondary rounded-lg p-1 px-3"><i class="fa fa-info"></i> Info Lokasi</a>
                  <a href="{{ route('visit.act', $data->id) }}" class="btn btn-primary rounded-lg p-1 px-3"> Visit</a>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>
      <br><br>
      {{ $customers->links() }}
  </div>
</div>
@endsection
