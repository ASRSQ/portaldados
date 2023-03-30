@extends('layouts.main')

@section('title','Principal')


@section('content')
<div class=" container">
                    
  <div class="mw-100 container">
     
      <div class=" row justify-content-center align-items-center vh-100">
          
          
     <div class=" container">
                    
      <div class="mw-100 container">
          
          <div class=" row justify-content-center align-items-center vh-100">
                        

    <div class="col-6 container">
        <h2>Pesquise um conjunto de dados</h2>
        <?php
          $Vendedores='';
          foreach ($carros as $value) {
            $Vendedores.="$value->Vendedor";
            $Vendedores.=',';
          }
        ?>
        {{-- {{$carros}}
        {{$tipo}} --}}
        <div class="row">
            <input id="tags" type="text" class="form-control col" placeholder="Nome/CPF/Número" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button  onClick="buscar()" id="pesquisar"type="button" class="btn btn-primary " data-toggle="modal" >
                Pesquisar
              </button>
              <!-- Modal -->
              <div class="modal fade " id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div id="modal-body" class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="button" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
<?php
  // Obtém uma lista única de vendedores da tabela "carro_olx"
  $vendedores = DB::table('carro_olx')->distinct()->pluck('Vendedor')->toArray();
  // Converte a lista em um formato de string JSON para uso no script jQuery
  $vendedores_json = json_encode($vendedores);
?>
<script>
  // Armazena o valor de $Vendedores em uma variável
  var vendedores = '<?php echo $Vendedores ?>';

  // Cria um escopo seguro para o jQuery usando noConflict
  var $j = jQuery.noConflict(true);

  $j(document).ready(function() {
    $j("#tags").autocomplete({ 
      // Limita a quantidade de resultados exibidos
      maxResults: 10,
      source: function(request, response) {
        // Filtra os resultados baseados no termo de busca
        var results = $j.ui.autocomplete.filter(vendedores.split(','), request.term);
        
        // Remove valores duplicados em results
        var uniqueResults = [];
        $j.each(results, function(i, el){
            if($j.inArray(el, uniqueResults) === -1) uniqueResults.push(el);
        });
        
        response(uniqueResults.slice(0, this.options.maxResults));
      }
    }).autocomplete("instance")._renderItem = function(ul, item) {
      return $j("<li>")
        .append("<div>" + item.label + "</div>")
        .appendTo(ul);
    };
  });

  // Importação do jQuery remoto
  var script = document.createElement('script');
  script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
  script.type = 'text/javascript';
  document.getElementsByTagName('head')[0].appendChild(script);

  // Importação do jQuery UI remoto
  var script2 = document.createElement('script');
  script2.src = 'https://code.jquery.com/ui/1.13.1/jquery-ui.min.js';
  script2.type = 'text/javascript';
  document.getElementsByTagName('head')[0].appendChild(script2);
    function buscar(){
      b=document.getElementById("tags").value
      window.open('/mostradados?nome='+b)
    }
  </script>


@endsection

