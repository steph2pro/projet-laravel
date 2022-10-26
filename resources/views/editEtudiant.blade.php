
//cette page herite de la page master
@extends("layourt.master")
//et son contenu dinamyque sera:
@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Edition de l'etudiant {{$etudiant->nom}}</h6>
     <div class="mt-4"> 
        <div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                   <h4> {{ session()->get('success') }} </h4>
                </div>
            @endif

        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul >
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
           
        @endif
        <form style="width: 65%;" action="{{route('etudiant.update',['etudiant'=>$etudiant->id])}}" method="post">
          @csrf

          <input type="hidden" name="_method" value="put">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom de l'etudiant</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nom" value="{{$etudiant->nom}}">
               
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">prenom</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="prenom" value="{{$etudiant->prenom}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">classe</label>
                <select class="form-control" name="classe_id">
                    <option value=""></option>
                    @foreach($classes as $classe)
                        @if($classe->id == $etudiant->classe_id)
                        <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                        @else
                        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">enregistrer</button>
            <a href="{{route('etudiant')}}" class="btn btn-danger">anuller</a>
        </form>
     </div>
  </div>
@endsection