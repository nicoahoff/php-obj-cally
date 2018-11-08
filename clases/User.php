<?php
class User {
    
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $phone;
    private $birthdate;
    private $identifier_photo;
    private $profile_photo;
    private $caller_id;
    private $company_id;
    private $updated_at;
    private $created_at;

    public function __construct()
    {

    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of birthdate
     */ 
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */ 
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of identifier_photo
     */ 
    public function getIdentifier_photo()
    {
        return $this->identifier_photo;
    }

    /**
     * Set the value of identifier_photo
     *
     * @return  self
     */ 
    public function setIdentifier_photo($identifier_photo)
    {
        $this->identifier_photo = $identifier_photo;

        return $this;
    }

    /**
     * Get the value of profile_photo
     */ 
    public function getProfile_photo()
    {
        return $this->profile_photo;
    }

    /**
     * Set the value of profile_photo
     *
     * @return  self
     */ 
    public function setProfile_photo($profile_photo)
    {
        $this->profile_photo = $profile_photo;

        return $this;
    }

    /**
     * Get the value of caller_id
     */ 
    public function getCaller_id()
    {
        return $this->caller_id;
    }

    /**
     * Set the value of caller_id
     *
     * @return  self
     */ 
    public function setCaller_id($caller_id)
    {
        $this->caller_id = $caller_id;

        return $this;
    }

    /**
     * Get the value of company_id
     */ 
    public function getCompany_id()
    {
        return $this->company_id;
    }

    /**
     * Set the value of company_id
     *
     * @return  self
     */ 
    public function setCompany_id($company_id)
    {
        $this->company_id = $company_id;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}

?>