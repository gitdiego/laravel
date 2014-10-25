<?php
class RecursoController extends BaseController{
	public function getall($id=null){
		$sWhere = '';
		if($id!=null){
			$sWhere = ' where rec_id = '.$id;	
		}

		$recursos = DB::select(DB::raw('select rec_id, tre_id, edi_id, rec_titulo, rut_proguia, rut_prorevi, rec_catalogado, rec_numpag, rec_numedi, rec_anio, rec_marca, rec_modelo, rec_valor, rec_accesorios, rec_ruta, rec_codvisible, rec_usuregi, rec_fhregi, rec_ipregi, rec_usumodi, rec_fhmodi, rec_ipmodi, rec_borrado, rec_tipo, rec_observacion FROM bib_recurso '.$sWhere));


		$response = array(
				'error'=>0,
				'recursos'=>$recursos
			);

		return Response::json($response);
	}
}

?>