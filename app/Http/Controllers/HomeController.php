<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\ProProceso;
use App\Models\TipoDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function codigo($DOC_ID_TIPO, $DOC_ID_PROCESO)
    {
        //Obtener los prefijos de los tipos de documentos y tipos de procesos
        $prefijo_tipo = TipoDoc::where('TIP_ID', $DOC_ID_TIPO)->first();
        $prefijo_pro = ProProceso::where('PRO_ID', $DOC_ID_PROCESO)->first();

        // Obtén la lista de todos los códigos existentes en la serie numérica
        $codigosExistentes = Documento::where('DOC_ID_TIPO', $DOC_ID_TIPO)
                                    ->where('DOC_ID_PROCESO', $DOC_ID_PROCESO)
                                    ->pluck('DOC_CODIGO')
                                    ->toArray();

        // Encuentra los espacios vacíos en los registros de documentos
        $espaciosVacios = [];
        for ($i = 1; $i <= count($codigosExistentes); $i++)
        {
            $codigoActual = $prefijo_tipo->TIP_PREFIJO . '-' . $prefijo_pro->PRO_PREFIJO . '-' . $i;
            if (!in_array($codigoActual, $codigosExistentes))
                $espaciosVacios[] = $codigoActual;

        }

         //Si hay espacios vacios, se retorna el primero de la lista. Sino, se realiza un nuevo consecutivo.
        if ($espaciosVacios > 0)
        {
            return $espaciosVacios[0];
        }
        else
        {
            // Obtener el último número consecutivo para la combinación de DOC_ID_TIPO y DOC_ID_PROCESO
            $ultimoConsecutivo = Documento::select(DB::raw('count(*) as cont'))
                                        ->where('DOC_ID_TIPO', $DOC_ID_TIPO)
                                        ->where('DOC_ID_PROCESO', $DOC_ID_PROCESO)
                                        ->get();

            // Incrementar el número consecutivo en 1 para obtener el siguiente número único
            $siguienteConsecutivo = $ultimoConsecutivo[0]->cont ? $ultimoConsecutivo[0]->cont + 1 : 1;

            // Generar el código del documento en el formato deseado
            return $prefijo_tipo->TIP_PREFIJO . '-' . $prefijo_pro->PRO_PREFIJO . '-' . $siguienteConsecutivo;
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $docs = Documento::paginate(5);
        return view('home', compact('docs'));
    }


    public function create()
    {
        $tipos = TipoDoc::all();
        $pros = ProProceso::all();
        return view('create', compact('tipos', 'pros'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'DOC_NOMBRE' => 'required',
            'DOC_CONTENIDO' => 'required',
            'DOC_ID_TIPO' => 'required',
            'DOC_ID_PROCESO' => 'required',
        ]);

        Documento::create([
            'DOC_NOMBRE' => $request->DOC_NOMBRE,
            'DOC_CODIGO' => $this->codigo($request->DOC_ID_TIPO, $request->DOC_ID_PROCESO),
            'DOC_CONTENIDO' => $request->DOC_CONTENIDO,
            'DOC_ID_TIPO' => $request->DOC_ID_TIPO,
            'DOC_ID_PROCESO' => $request->DOC_ID_PROCESO,
        ]);

        return redirect()->route('home.index');
    }


    public function edit($DOC_ID)
    {
        $doc = Documento::find($DOC_ID);
        $tipos = TipoDoc::all();
        $pros = ProProceso::all();
        return view('edit', compact('doc', 'tipos', 'pros'));
    }


    public function update(Request $request, $DOC_ID)
    {
        $doc = Documento::find($DOC_ID);
        
        $this->validate($request, [
            'DOC_NOMBRE' => 'required',
            'DOC_CONTENIDO' => 'required',
            'DOC_ID_TIPO' => 'required',
            'DOC_ID_PROCESO' => 'required',
        ]);

        $doc->update([
            'DOC_NOMBRE' => $request->DOC_NOMBRE,
            'DOC_CODIGO' => $this->codigo($request->DOC_ID_TIPO, $request->DOC_ID_PROCESO),
            'DOC_CONTENIDO' => $request->DOC_CONTENIDO,
            'DOC_ID_TIPO' => $request->DOC_ID_TIPO,
            'DOC_ID_PROCESO' => $request->DOC_ID_PROCESO,
        ]);

        return redirect()->route('home.index');
    }


    public function destroy($DOC_ID)
    {
        $doc = Documento::find($DOC_ID);
        $doc->delete();
        return redirect()->route('home.index');
    }


}
