<?php
class PortfolioController extends BaseController{
	public function getall(){
		$portfolio = Portfolio::all();

		$response = array(
				'error'=>0,
				'portfolio'=>$portfolio->toArray()
			);

		return Response::json($response);
	}
}

?>