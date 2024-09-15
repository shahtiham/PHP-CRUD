<?php

// Employee class provides encapsulatoin by securely handling employee's private information which is salary.
class Employee{
    public $name; // Name of an employee which is a public information
    public $id;   // Id of an employee which is a public information

    // Salary is a private information of an employee
    // 'private' keyword indicates that '$salary' is a private property, ensuring encapsulation
    private $salary;
    
    // Employee constructor
    // $name Name of the employee
    // $id Id of the employee
    public function __construct($name, $id){
        $this->name = $name; // Assign name
        $this->id = $id;     // Assign Id
    }

    // Gets the name of the employee
    // Returns string name of the employee
    public function getName(){
        return $this->name;
    }
    
    // Gets the Id of the employee
    // Returns string Id of the employee
    public function getId(){
        return $this->id;
    }

    // Securely sets the salary for the employee
    // $salary Salary value(float) of the employee
    public function setSalary($salary){
        $this->salary = $salary;
    }

    // Gets the salary of the employee
    // Returns float salary of the employee
    public function getSalary(){
        return $this->salary;
    }
}

// Create an Employee object with name and Id.
$e = new Employee("john", "2024");

// Securely set the salary.
$e->setSalary(20000.00);

// Get the salary of the employee.
echo "Salary of the employee: {$e->getSalary()}\n"

?>