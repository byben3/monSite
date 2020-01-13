<?php

    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
     */
    class User implements UserInterface
    {
        /**
         * @ORM\Id()
         * @ORM\GeneratedValue()
         * @ORM\Column(type="integer")
         */
        private $id;


        /**
         * @ORM\Column(type="json")
         */
        private $role = [];


        /**
         * @ORM\Column(type="string", length=255)
         */
        private $password;

        /**
         * @ORM\Column(type="string", length=255, name="user_name")
         */
        private $userName;

        public function getId(): ?int
        {
            return $this->id;
        }


        /**
         * A visual identifier that represents this user.
         *
         * @see UserInterface
         */
        public function getUsername(): string
        {
            return (string) $this->userName;
        }

        /**
         * @see UserInterface
         */
        public function getRoles(): array
        {
            $role = $this->role;
            // guarantee every user at least has ROLE_USER
            $role[] = 'ROLE_ADMIN';

            return array_unique($role);
        }

        public function setRoles(array $role): self
        {
            $this->role = $role;

            return $this;
        }

        /**
         * @see UserInterface
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @see UserInterface
         */
        public function getSalt()
        {
            // not needed when using bcrypt or argon
        }

        /**
         * @see UserInterface
         */
        public function eraseCredentials()
        {
            // If you store any temporary, sensitive data on the user, clear it here
            // $this->plainPassword = null;
        }



        public function setPassword(string $password): self
        {
            $this->password = $password;

            return $this;
        }

        public function setUserName(string $userName): self
        {
            $this->userName = $userName;

            return $this;
        }
    }
