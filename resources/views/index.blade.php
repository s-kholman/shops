@extends('layouts.base')
@section('title', 'Главная')

@section('info')
    @guest
        <div class="container">
            <div class="bg-light border rounded-3 p-3">
                <h4>Добро пожаловать гость</h4>
                <p>Для продолжения работы на сайте вам необходимо зарегестрироваться или выполнить вход</p>
            </div>
        </div>

    @endguest
    @auth


       @if(!empty($product))
          @forelse($product as $value)
               <div class="container">
                   <div class="row">
                       <div class="col-5 border border-1 text-center" style="height: 150px">{{$value->name}}<br><br><p class="small">Цена: {{$value->price}}</p>
                            @foreach(\App\Models\Meaning::query()->where('product_id', $value->id)->get() as $item)
                                 {{$item->id . ' '}},
                            @endforeach
                       </div>
                   </div>
               </div>
           @empty
               <div class="container">
                   <div class=" bg-light border rounded-3 p-3">
                       <h4>Данная категория пуста</h4>
                   </div>
               </div>
           @endforelse
          <div class="g-9 container">
              <div class="row ">
                  <div class="g-4 col-5">
                      {{$product->links()}}
                  </div>
              </div>
          </div>


       @elseif(!empty($filter))
           @foreach($filter as $value)
               <div class="container">
                   <div class="row">
                       <div class="col-5 border border-1 text-center" style="height: 150px">{{$value->Product->name}}<br><br><p class="small">Цена: {{$value->Product->price}}</p>
                       @foreach(\App\Models\Meaning::query()->where('product_id', $value->Product->id)->get() as $item)
                           {{$item->id . ' '}},
                       @endforeach
                       </div>
                   </div>
               </div>
           @endforeach
       @else
           <div class="container">
               <div class=" bg-light border rounded-3 p-3">
                   <h4>Добро пожаловать</h4>
                   <p>Вы зарегистрировались на e-mail: {{\Illuminate\Support\Facades\Auth::user()->email}}. </p>
               </div>
           </div>
       @endif


    @endauth
@endsection('info')

@section('menu')
    @auth
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
        <li class="nav-item">
            <a href="/" class="nav-link align-middle px-0">
                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Главная</span>
            </a>
        </li>
        @forelse($menu as $value)
            <li class="nav-item">
                <a class="nav-link align-middle px-0" href="/category/{{$value->id}}" class="nav-link px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">{{$value->name}}</span></a>
            </li>
        @empty
        @endforelse

    </ul>
    @endauth
@endsection('menu')

@section('feature')
    @if(!empty($meaning))

    <form action="{{route('product.filter')}}" method="POST">
        @csrf
    @foreach($meaning as $value)
        <input type="checkbox" name="{{$value->feature_id}}"> {{$value->Feature->name}} = {{$value->property}}<br>
    @endforeach
        <input hidden name="category" value="{{$category_id}}">
        <div class="p-2">
            <input class="form-control-sm" type="submit" value="Применить фильтр">
        </div>
    </form>
    @endif

@endsection
