<?php

class Users
{
    private $connexion;

    // Public Properties of Users Class
    public $ID;
    public $uFullName;
    public $uAge;
    public $uEmail;
    public $uSalary;
    public $uUpdated;
    public $uDeleted;
    public $percent;

    // Constructor with DB
    public function __construct($db) { $this->connexion = $db; }

    // -----------------------------------------------------------------------------------------------------------------
    // Bütün istifadəçilərin sorğulanması:
    public function selection()
    {
      $query_selection = ' select ID, uFullName, uAge, uEmail, uSalary, uUpdated
                           from users 
                           where uDeleted=false
                           order by ID desc ';
      $result_selection = $this->connexion->prepare($query_selection);
      $result_selection->execute();
      return $result_selection;
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Yeni istifadəçinin daxil edilməsi:
    public function addition()
    {
        $query_addition = ' insert into users (uFullName, uAge, uEmail, uSalary, uUpdated) 
                            values ("'.htmlspecialchars(strip_tags($this->uFullName)).'", 
                                     '.htmlspecialchars(strip_tags($this->uAge)).', 
                                    "'.htmlspecialchars(strip_tags($this->uEmail)).'", 
                                     '.htmlspecialchars(strip_tags($this->uSalary)).', 
                                    "'.htmlspecialchars(strip_tags($this->uUpdated)).'")';
        $result_addition = $this->connexion->prepare($query_addition);
        if($result_addition->execute()) { return true; }
        else
        {
            echo 'Yeni istifadəçinin daxil edilməsində xəta baş verdi!';
            return false;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Cari seçilmiş istifadəçinin silinməsi:
    public function deletion()
    {
        $query_deletion = ' update users set uDeleted=true, uUpdated="'.htmlspecialchars(strip_tags($this->uUpdated)).
                          '" where ID = ' . htmlspecialchars(strip_tags($this->ID));
        $result_deletion = $this->connexion->prepare($query_deletion);
        if($result_deletion->execute()) { return true; }
        else
        {
            echo 'Cari istifadəçinin silinməsində xəta baş verdi!';
            return false;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Cari istifadəçinin məlumatlarının dəyişdirilməsi:
    public function modification()
    {
        $query_modification = ' update users
                                set uFullName = "'.htmlspecialchars(strip_tags($this->uFullName)).'", 
                                    uAge =       '.htmlspecialchars(strip_tags($this->uAge)).',
                                    uEmail =    "'.htmlspecialchars(strip_tags($this->uEmail)).'",
                                    uSalary =    '.htmlspecialchars(strip_tags($this->uSalary)).', 
                                    uUpdated =  "'.htmlspecialchars(strip_tags($this->uUpdated)).'"                              
                                where ID = ' . htmlspecialchars(strip_tags($this->ID));

        $result_modification = $this->connexion->prepare($query_modification);
        if($result_modification->execute()) { return true; }
        else
        {
            echo 'Cari istifadəçinin məlumatlarının dəyişdirilməsində xəta baş verdi!';
            return false;
        }
    }












    // -----------------------------------------------------------------------------------------------------------------
    // Bütün istifadəçilərin maaşlarının faizlə artırılması/azaldılması:
    public function salary_inc_dec()
    {

    }

    // -----------------------------------------------------------------------------------------------------------------
    // Təkcə bir istifadəçinin sorğulanması:
    public function select_one()
    {
        $query_select_one = ' select ID, uFullName, uAge, uEmail, uSalary, uUpdated
                        from Users where (uDeleted=false) and (ID = ' . htmlspecialchars(strip_tags($this->ID)) . ')';

        $result_select_one = $this->connexion->prepare($query_select_one);
        $result_select_one->execute();

        $row = $result_select_one->fetch(PDO::FETCH_ASSOC);

        // Məlumatların qlobal dəyişənlərə yazılması:
        $this->ID = $row['ID'];
        $this->uFullName = $row['uFullName'];
        $this->uAge = $row['uAge'];
        $this->uEmail = $row['uEmail'];
        $this->uSalary = $row['uSalary'];
        $this->uUpdated = $row['uUpdated'];
    }
    
}