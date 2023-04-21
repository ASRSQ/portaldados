@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center justify-content-between">
    <div class="col-md-15">
      <div class="card">
        <div class="card-header">{{ __('Resultados da Pesquisa') }}</div>
        <div class="card-body">
          <h2>Carros</h2>
          <ul>
            @foreach($carros->take(1) as $carro)
            <li>
              <div style="flex: 1 1 50%;">
                <div style="display: flex; flex-direction: column;">
                    <div>
                        <strong>Vendedor:</strong> {{ $carro->Vendedor }}
                    </div>
                    <div>
                        <strong>Cidade:</strong> {{ $carro->Cidade }}
                    </div>
                    <div>
                        <strong>Telefone:</strong> {{ $carro->Telefone }}
                    </div>
                    <div>
                        <strong>Telefone Descrição:</strong> {{ $carro->Telefone_Descricao }}
                    </div>
                </div>
                    <div>
                      <a href="/portaldados/public/mostradados?nome={{ $carro->Vendedor }}">Ver mais</a>
                    </div>
                </div>
            </li>
        @endforeach
          </ul>

          

          <h2>FGTS</h2>
          <ul>
            @foreach($fgts as $fgt)
            <li>
              <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1 1 50%;">
                  <div>
                    <strong>Nome:</strong>
                    <span>{{ $fgt->nome }}</span>
                  </div>
                  <div>
                    <strong>CPF:</strong>
                    <span>{{ $fgt->CPF2 }}</span>
                  </div>
                  <div>
                    <strong>Nascimento:</strong>
                    <span>{{ date('d/m/Y', strtotime($fgt->nasc)) }}</span>
                  </div>
                  <div>
                    <strong>Endereço:</strong>
                    <span>{{ $fgt->endereco }}</span>
                  </div>
                  <div>
                    <strong>Bairro:</strong>
                    <span>{{ $fgt->bairro }}</span>
                  </div>
                  <div>
                    <strong>Cidade:</strong>
                    <span>{{ $fgt->cidade }}</span>
                  </div>
                  <div>
                    <strong>CEP:</strong>
                    <span>{{ $fgt->cep }}</span>
                  </div>
                  <div>
                    <strong>Móvel 1:</strong>
                    <span>{{ $fgt->movel1 }}</span>
                  </div>
                  <div>
                    <strong>Móvel 2:</strong>
                    <span>{{ $fgt->movel2 }}</span>
                  </div>
                  <div>
                    <strong>Móvel 3:</strong>
                    <span>{{ $fgt->movel3 }}</span>
                  </div>
                </div>
               <div>
                <a href="/portaldados/public/user-fgts/{{ $fgt->nome }}">Ver mais</a> 
              </div>
                </div>
              </li>
              @endforeach
            </ul>
            <div class="pagination">
              {{ $fgts->links() }}
            </div>

 
          <h2>Prefeituras</h2>
          @foreach($prefeituras as $prefeitura)
          <li>
            <div style="display: flex; flex-wrap: wrap;">
              <div style="flex: 1 1 50%;">
                <div>
                  <strong>NOME_A:</strong>
                  <span>{{ $prefeitura->NOME_A }}</span>
                </div>
                <div>
                  <strong>NASC:</strong>
                  <span>{{ date("d/m/Y", strtotime($prefeitura->NASC)) }}</span>
                </div>
                <div>
                  <strong>CPF:</strong>
                  <span>{{ $prefeitura->CPF }}</span>
                </div>
                <div>
                  <strong>LOGR:</strong>
                  <span>{{ $prefeitura->LOGR }}</span>
                </div>
                <div>
                  <strong>NUM:</strong>
                  <span>{{ $prefeitura->NUM }}</span>
                </div>
                <div>
                  <strong>COMPL:</strong>
                  <span>{{ $prefeitura->COMPL }}</span>
                </div>
                <div>
                  <strong>BAIRRO:</strong>
                  <span>{{ $prefeitura->BAIRRO }}</span>
                </div>
                <div>
                  <strong>CEP:</strong>
                  <span>{{ $prefeitura->CEP }}</span>
                </div>
                <div>
                  <strong>CIDADE:</strong>
                  <span>{{ $prefeitura->CIDADE }}</span>
                </div>
                <div>
                  <strong>UF:</strong>
                  <span>{{ $prefeitura->UF }}</span>
                </div>
                <div>
                  <strong>DDD:</strong>
                  <span>{{ $prefeitura->DDD }}</span>
                </div>
                <div>
                  <strong>TEL:</strong>
                  <span>{{ $prefeitura->TEL }}</span>
                </div>
                <div>
                  <strong>DDD2:</strong>
                  <span>{{ $prefeitura->DDD2 }}</span>
                </div>
                <div>
                  <strong>TEL2:</strong>
                  <span>{{ $prefeitura->TEL2 }}</span>
                </div>
                <div>
                  <strong>DDDCEL:</strong>
                  <span>{{ $prefeitura->DDDCEL }}</span>
                </div>
                <div>
                  <strong>CEL:</strong>
                  <span>{{ $prefeitura->CEL }}</span>
                </div>
                <div>
                  <strong>CELOP:</strong>
                  <span>{{ $prefeitura->CELOP }}</span>
                </div>
              </div>
            <div>
              <a href="/portaldados/public/user-prefeitura/{{ $prefeitura->NOME_A }}">Ver mais</a>
            </div>
              </div>
            </li>
          @endforeach
          <div class="pagination">
            {{ $prefeituras->links() }}
          </div>
          
        
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

</div>
<style>
  .pagination{
    padding: 10px;
  }
  .w-5{
      display:none;
  }
</style>

@endsection
