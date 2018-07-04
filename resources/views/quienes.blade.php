@extends('layouts.app')

@section('title', 'Oliveto - Quienes Somos')
@section('body-class', 'landing-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/fondo.jpg')  }}'); height: 80vh;">
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Quiénes Somos?</h1>
            <h4><b>Oliveto</b> es un emprendimiento de Nuclex La Rioja SA, que identifica a una empresa de tipo familiar que exporta
            aceite de oliva y aceitunas en conserva desde los años 60 hasta el dia de hoy.</h4>
            <br/>
        </div>
      </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center" id="td_texto">
      <div id="texto">
        <span class="texto">
          Motivados por la aceptación en la venta minorista en nuestra fábrica en la localidad de Cruz del Eje, <img class="foto_texto" src="{{ asset ('/img/quienes.jpg') }}"> Pcia. de Córdoba y la venta contrareembolso que efectuamos a nuestros clientes en todo el país es que comenzamos con la venta on line de nuestros productos desde Buenos Aires.<br><br>

          El aceite de oliva <b>Oliveto</b> se elabora desde hace más de 50 años. Llegamos a su mesa directamente desde
          nuestra fábrica artesanal de tipo tradicional a prensa, la cual es una de las pocas que quedan en nuestro país
          produciendo aceite Virgen Extra de primera presión en frío. Las variedades de aceitunas aceiteras son seleccionadas cuidadosamente a fin de obtener un aceite de excelente calidad.  Nuestro  blend es original, de altas cualidades organolepticas (color, aroma y sabor) que nos distinguen por elaboración y zona de producción de otros aceites de oliva del pais.<br><br>

          La elaboración de aceitunas en conserva se realiza en nuestra planta de última generación en la localidad de
          Aimogasta, Pcia. de La Rioja.<br><br>

          Nuestra producción está orientada a brindar la mayor calidad al consumidor final, directo de fábrica, por lo que
          no encontrará nuestro producto en las góndolas.<br><br>

          <b>OLIVETO es un producto artesanal y de sabor inconfundible, que hace que nuestros clientes nos elijan
            hace años para estar en su mesa.</b><br><br>

          <h3>LOS OLIVOS</h3><br>

          Planta originaria del cercano oriente, de milenaria relación con el hombre, se fue trasladando alrededor del mediterráneo, llegando a ser una de las principales fuentes de alimentación de estos pueblos. Las aceitunas, que se consumían en principio negras (es decir cuando estaban totalmente maduras), producían un sabroso jugo, estaba naciendo el ACEITE. <img class="foto_texto" src="{{ asset ('/img/olivos.jpg') }}"> Sin el conocimiento de sus propiedades beneficas, que hoy gracias a la ciencia disponemos, aquella gente, instintivamente lo utilizaban para diferentes fines, y con el paso del tiempo, este producto se fue colocando en el sitio que hoy tiene. La palabra aceite viene del árabe “az-zait” que quiere decir “jugo de aceitunas”.

          El olivo tarda en dar sus primeros frutos alrededor de 5 años, empezando a ser rentable su explotación a partir de los 10.<br><br>

          <h3>EL ACEITE DE OLIVA</h3><br>

          Como todo “jugo de frutas”, debe obtenerse cuando las mismas se hallan en su estado justo de madurez, bien limpias, sin hojas -que le dan sabor amargo a los aceites- y después de lavadas se las debe moler con prontitud –para evitar su oxidación- . Hay que amasar la pasta obtenida -la aceituna se muele con carozo incluido-, en frio -temperatura ambiente- durante 40 a 45 minutos, ya que a mayores temperaturas se evaporan elementos esenciales y volátiles que hacen al aroma y sabor del aceite.

          Obtenida la pasta, se prensa INMEDIATAMENTE acondicionándola en capachos (discos de alambre tejido de forma circular), obteniéndose los siguientes PRODUCTOS (para 1 kilogramo de aceituna molida): 650 gramos de líquido y 350 gramos de residuo sólido ú orujo. Estos 650 gramos de líquido, se someten a un proceso de decantación -NO CENTRIFUGACION-, donde el aceite se separa del agua (o alpechín) por densidad en una proporción de 150 gramos de aceite y 500 gramos de agua.

          El aceite así obtenido, se trasvasa a tanques con fondo cónico, en los cuales continua la decantación de cualquier elemento sólido que permaneciera en suspensión por alrededor de 30 días, de acuerdo a la temperatura ambiente. Recordar que esta tarea se realiza en los meses de abril-mayo-junio, es decir en el otoño del hemisferio sur.

        </span>
      </div>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection
