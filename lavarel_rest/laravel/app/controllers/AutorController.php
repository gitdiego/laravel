<?php
class AutorController extends BaseController{
	public function getall($id=null){
		$sWhere = '';
		if($id!=null){
			$sWhere = ' where aut_id = '.$id;	
		}

		$autores = DB::select(DB::raw('select aut_id, aut_nombre, aut_usuregi, aut_fhregi, aut_ipregi, aut_usumodi, aut_fhmodi, aut_ipmodi, aut_borrado FROM bib_autor '.$sWhere));


		$response = array(
				'error'=>0,
				'autores'=>$autores
			);

		return Response::json($response);
	}
}

?>