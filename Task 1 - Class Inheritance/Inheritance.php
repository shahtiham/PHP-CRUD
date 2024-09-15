<?php

// Geometry class is the base class for all geometric shapes.
// It contains common properties like printType, dimensions (r, x, y) and area.
class Geometry {
    // Protected properties that are shared among inherited classes
    protected $printType = "This is a";  // Common print message for all shapes
    protected $r;    // Radius of Circle
    protected $x;    // Width of Rectangle
    protected $y;    // Height of Rectangle
    protected $area; // Stores calculated area
}

// Circle class Represents a Circle which extends Geometry.
// It has properties and methods specific to circles such as calculating area, value of pi and type (i.e. Circle).
class Circle extends Geometry {
    private $type;
    private $pi = 3.1416;

    // Circle constructor
    // $r Radius of the circle
    // $v Type of the shape (Circle)
    public function __construct($r, $v) {
        $this->type = $v; // Assign type
        $this->r = $r;    // Assign radius of the circle
    }

    // Prints the type of geometric shape
    public function printGeoType() {
        echo "$this->printType $this->type.\n";
    }

    // Calculates the area of the circle
    // Stores the result in the protected $area property
    public function calculateArea() {
        $this->area = $this->pi * ($this->r) * ($this->r); // Area of circle = pi * r^2
    }

    // Prints the area of the circle.
    public function printArea() {
        echo "Area of the $this->type is $this->area unit.\n";
    }
}

// Rectangle class represents a Rectangle and extends Geometry.
// It has properties and methods specific to rectangles such as calculating area and type (i.e. Rectangle).
class Rectangle extends Geometry {
    private $type;

    // Rectangle constructor
    // $x Width, $y Height
    // $v Type of the shape (Rectangle)
    public function __construct($x, $y, $v) {
        $this->type = $v; // Assign type
        $this->x = $x;    // Assign width of the rectangle
        $this->y = $y;    // Assign height of the rectangle
    }

    // Prints the type of geometric shape
    public function printGeoType() {
        echo "$this->printType $this->type.\n";
    }

    // Calculates the area of the rectangle
    // Stores the result in the protected $area property
    public function calculateArea() {
        $this->area = ($this->x) * ($this->y); // Area of rectangle = width * height
    }

    // Prints the area of the rectangle
    public function printArea() {
        echo "Area of the $this->type is $this->area unit.\n";
    }
}

// Create a Circle object with radius 2
$circle = new Circle(2, "Circle");
$circle->printGeoType();    // Prints the type of shape: "This is a Circle."
$circle->calculateArea();   // Calculates the area of the circle
$circle->printArea();       // Prints the area: "Area of the Circle is X unit."

// Create a Rectangle object with width 2 and height 4
$rec = new Rectangle(2, 4, "Rectangle");
$rec->printGeoType();       // Prints the type of shape: "This is a Rectangle."
$rec->calculateArea();      // Calculates the area of the rectangle
$rec->printArea();          // Prints the area: "Area of the Rectangle is X unit."

?>