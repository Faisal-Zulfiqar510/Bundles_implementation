<?php

namespace AppBundle\Service;

use AppBundle\Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function changeEnableStatus($id)
    {
        $this->userRepository->updateStatus($id);

    }

}