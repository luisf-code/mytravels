@extends ("plantilla")
@section ("content")

    <div class="container">
        <h1 class="text-center">Resultados de la busqueda</h1>
        <?php
            $dinero = $_POST["dinero"];
            $alojamiento = $_POST["alojamiento"];
            $aux = 0;
        ?>  
        <div class="container__grid">
            @foreach($queryDA AS $q)
                @if($q -> valorCU < $dinero)
                    <div class="item__grid">
                        <div>
                            <img src="../../.././img/tipoAloja.jpeg" alt="">
                        </div>
                        <div>
                            <p><strong>{{ $q -> titulo }}</strong></p>
                            <p><span>${{ $q -> valorCU }}</span></p>
                            <p><strong>{{ $alojamiento }}</strong></p>
                        </div>
                        <div>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perferendis incidunt sint ab doloribus saepe voluptas quaerat dolores cumque maxime at, maiores, molestias harum nobis, nihil consequatur! Recusandae tenetur nesciunt fugiat?</p>
                        </div>
                    </div>
                    <?php
                        $aux++                                    
                    ?>
                @endif
            @endforeach                        
        </div> 
        @if($aux == 0)
            <h3 class="text-center">Lo sentimos, no tienes dinero suficiente para realizar una compra.</h3>
        @endif           
    </div>

@endSection