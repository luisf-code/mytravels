@extends ("plantilla")
@section ("content")

    <div class="container">
        <h1 class="text-center">Resultados de la busqueda</h1>
        <div class="container__grid">
            @foreach($queryDA AS $q)                
                <div class="item__grid">
                    <div>
                        <img src="../../.././img/tipoAloja.jpeg" alt="">
                    </div>
                    <div>
                        <p><strong>{{ $q -> titulo }}</strong></p>
                        <p><span>${{ $q -> valorCU }}</span> Precio por persona</p>                        
                    </div>
                    <div>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis incidunt sint ab doloribus saepe voluptas quaerat dolores cumque maxime at, maiores, molestias harum nobis, nihil consequatur! Recusandae tenetur nesciunt fugiat?</p>
                    </div>
                </div>                                
            @endforeach                        
        </div>                    
    </div>

@endSection