<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fgts;

class FgtsController extends Controller
{
    public function index(Request $request)
    {
        $uf = $request->input('uf');
        $cidade = $request->input('cidade');

        $query = Fgts::query();

        if ($uf) {
            $query->where('uf', $uf);
        }

        if ($cidade) {
            $query->where('cidade', $cidade);
        }

        $fgts = $query->paginate(25);

        $ufs = Fgts::select('uf')
            ->distinct()
            ->orderBy('uf')
            ->get();

        $cidadesByUf = Fgts::select('uf', 'cidade')
            ->distinct()
            ->orderBy('uf')
            ->groupBy('uf', 'cidade')
            ->get();

        $cidades = collect([]);

        foreach ($cidadesByUf as $cidadeByUf) {
            $uf = $cidadeByUf->uf;
            $cidade = $cidadeByUf->cidade;

            if (!$cidades->has($uf)) {
                $cidades->put($uf, collect());
            }

            $cidades->get($uf)->push($cidade);
        }

        return view('fgts', compact('fgts', 'ufs', 'cidades', 'uf', 'cidade'))
            ->with('uf', $uf)
            ->with('cidade', $cidade)
            ->with('appends', ['uf' => $uf, 'cidade' => $cidade]);
    }
}
