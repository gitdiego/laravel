<?php
class AutorRecursoController extends BaseController{
	
	public function index($idAutor=null){
		
		$data = [
            'idautor' => $idAutor
        ];
        $rules = [
            'idautor' => 'required | numeric'
        ];
        $valid = Validator::make($data, $rules);

        if($valid->passes()){
        	$autores = DB::select(DB::raw('select aut_id, aut_nombre, aut_usuregi, aut_fhregi, aut_ipregi, aut_usumodi, aut_fhmodi, aut_ipmodi, aut_borrado FROM bib_autor where  aut_id = '.$idAutor));

			$recursos = DB::select(DB::raw('select
							    recur.rec_id,
							    recur.tre_id,
							    recur.edi_id,
							    recur.rec_titulo,
							    recur.rut_proguia,
							    recur.rut_prorevi,
							    recur.rec_catalogado,
							    recur.rec_numpag,
							    recur.rec_numedi,
							    recur.rec_anio,
							    recur.rec_marca,
							    recur.rec_modelo,
							    recur.rec_valor,
							    recur.rec_accesorios,
							    recur.rec_ruta,
							    recur.rec_codvisible,
							    recur.rec_usuregi,
							    recur.rec_tipo,
							    recur.rec_observacion,
							    recur.rec_borrado,
							    recur.rec_ipmodi,
							    recur.rec_ipregi,
							    recur.rec_fhregi,
							    recur.rec_usumodi,
							    recur.rec_fhmodi
							FROM
							    bd_biblioteca.bib_recautor autor
							INNER JOIN
							    bd_biblioteca.bib_recurso recur
							ON
							    (
							        autor.rec_id = recur.rec_id)
							WHERE
							    autor.aut_id = '.$idAutor.'
							  '));

			$response = array(
					'error'=>0,
					'autor'=>$autores,
					'recursos'=>$recursos
				);

			return Response::json($response);
        }else{
        	return Redirect::to('AutorRecursoController.getall')->withErrors($valid)->withInput();
        }
		
	}

	public function show($idAutor=null,$idRecurso=null){
		$sWhere = '';

		if($idRecurso!=null){
			$sWhere = ' and recur.rec_id = '.$idRecurso;	
		}

		$autores = DB::select(DB::raw('select aut_id, aut_nombre, aut_usuregi, aut_fhregi, aut_ipregi, aut_usumodi, aut_fhmodi, aut_ipmodi, aut_borrado FROM bib_autor where  aut_id = '.$idAutor));

		$recursos = DB::select(DB::raw('select
						    recur.rec_id,
						    recur.tre_id,
						    recur.edi_id,
						    recur.rec_titulo,
						    recur.rut_proguia,
						    recur.rut_prorevi,
						    recur.rec_catalogado,
						    recur.rec_numpag,
						    recur.rec_numedi,
						    recur.rec_anio,
						    recur.rec_marca,
						    recur.rec_modelo,
						    recur.rec_valor,
						    recur.rec_accesorios,
						    recur.rec_ruta,
						    recur.rec_codvisible,
						    recur.rec_usuregi,
						    recur.rec_tipo,
						    recur.rec_observacion,
						    recur.rec_borrado,
						    recur.rec_ipmodi,
						    recur.rec_ipregi,
						    recur.rec_fhregi,
						    recur.rec_usumodi,
						    recur.rec_fhmodi
						FROM
						    bd_biblioteca.bib_recautor autor
						INNER JOIN
						    bd_biblioteca.bib_recurso recur
						ON
						    (
						        autor.rec_id = recur.rec_id)
						WHERE
						    autor.aut_id = '.$idAutor.'
						  '.$sWhere));

		$response = array(
				'error'=>0,
				'autor'=>$autores,
				'recursos'=>$recursos
			);

		return Response::json($response);
	}


	public function store($iIdAutor){
		$response = array(
				'error'=>0,
				'autor'=>$iIdAutor,
				'recurso'=>Input::get('recurso')
			);

		return Response::json($response);
	}

	public function update($iIdAutor,$iIdRecurso){

		 
			$response = array(
					'error'=>0,
					'autor'=>$iIdAutor,
					'iIdRecurso'=>$iIdRecurso,
					'recurso'=>Input::get('recurso')
				);

			return Response::json($response);
		
	}

	public function destroy($iIdAutor,$iIdRecurso){
		$response = array(
				'error'=>0,
				'autor'=>$iIdAutor,
				'iIdRecurso'=>$iIdRecurso
			);

		return Response::json($response);
	}

}

?>