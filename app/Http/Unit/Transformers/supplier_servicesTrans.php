<?php
	/**
	 * Created by PhpStorm.
	 * UserModel: dark-
	 * Date: 9/16/2017
	 * Time: 3:17 PM
	 */
	//namespace Novent\Transfroers;
	namespace Unit\Transformers;
	class supplier_servicesTrans extends Transfomer
	{

		public function transform ($user)
		{
			$servicesTrans= new servicesTransform();

			if ( !$user['updated_at'] )
				$up = "";
			else
				$up = date ( 'Y-m-d' , strtotime ( $user['updated_at'] ) );
			if ( !$user['bio'] )
				$bio = "";
			else
				$bio = $user['bio'];


			if ( !$user['exp_year'] )
				$exp_year = "";
			else
				$exp_year = $user['exp_year'];


			if ( !$user['deleted_at'] )
				$del = "";
			else
				$del = date ( 'Y-m-d' , strtotime ( $user['deleted_at'] ) );
			return [
				'supplier_id' => $user['id'],
				'name' => $user['name'],
				'email' => $user['email'],
				'phone' => $user['phone'],
				'longitude' =>$user['longitude'],
				'latitude' =>$user['latitude'],
				'bio' =>$bio,
				'exp_year' => $exp_year,
				'status' => (boolean)$user['status'],
				'created_at' =>  date('Y-m-d', strtotime($user['created_at'])) ,
				'updated_at' => $up,
				'deleted_at' => $del,
				'services'=>$servicesTrans->transformCollection  ($user['services']->toArray())


			];

		}

	}