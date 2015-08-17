<?php

use Sams\Manager\AuthManager;
use Sams\Repository\UserRepository;
use Sams\Repository\InstanceRepository;
use Sams\Repository\CitationRepository;
use Sams\Repository\OutputRepository;

class AuthController extends BaseController {

	protected $userRepo;
	protected $instanceRepo;
	protected $citationRepo;
	protected $outputRepo;

	public function __construct(UserRepository $userRepo, InstanceRepository $instanceRepo,
	                            CitationRepository $citationRepo, OutputRepository $outputRepo)

	{
			$this->userRepo     = $userRepo;
			$this->instanceRepo = $instanceRepo;
			$this->citationRepo = $citationRepo;
			$this->outputRepo   = $outputRepo;
	}

	public function login()

	{
			$manager = new AuthManager(Input::all());
			
			$manager->confirmed();

			return Redirect::to('user/authenticate');
	}

	public function getUserAutenticate()

	{
			$user      = $this->userRepo->getUserLogin();
			$citation  = $this->citationRepo->getCitationsCurrent();
			$instances = $this->instanceRepo->getInstanceVisited();
			$outputs   = $this->outputRepo->getOutputsTimeLimit();

			return Response::json(['status' => 'success',
				                     'data'   => ['first_name'=> $user->first_name,
				                                  'last_name' => $user->last_name,
				                                  'email'     => $user->email,
				                                  'group'     => $user->getGroups()->first(),
				                                  'visited'   => $instances->count(),
				                                  'citation'  => $citation->count(),
				                                  'outputs'   => 0],
				                                  ]);
	}

	public function logout()

	{
			Sentry::logout();
	}

}