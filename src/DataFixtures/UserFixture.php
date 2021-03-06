<?php
    namespace App\DataFixtures;
    use App\Entity\User;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class UserFixture extends BaseFixture
    {

        /**
         * @var UserPasswordEncoderInterface
         */
        private $passwordEncoder;

        public function __construct(UserPasswordEncoderInterface $passwordEncoder)
        {

            $this->passwordEncoder = $passwordEncoder;
        }

        protected function loadData(ObjectManager $manager)
        {
            $this->createMany(1, 'main_users', function($i) {
                $user = new User();
                $user->setUserName(sprintf('byben%d', $i));

                $user->setPassword($this->passwordEncoder->encodePassword(
                    $user,
                    'nobodyknows'
                ));
                return $user;
            });
            $manager->flush();
        }
    }