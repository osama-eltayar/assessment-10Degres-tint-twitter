<?php


namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
        public function countAll() ;

        public function getAll() ;

        public function findByEmail($email) ;

        public function save($data) ;

        public function followByUser($follower, $user);
}
